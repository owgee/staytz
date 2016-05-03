<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Region;
use App\Models\FacilityType;
use App\Models\Image;
use App\Models\Contact;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use App\File;
use App\Helpers\Thumbnail;
use App\Http\Requests\FileUploadRequest;
use Illuminate\Support\Facades\URL;
use Response;
use stdClass;

use Illuminate\Http\Request;

class ListingsController extends JoshController
{
    /**
    *@var LISTINGS_PER_PAGE number of facilities per page
    */
    const LISTINGS_PER_PAGE=15;

    /**
     * Display a listing of the facilities
     * @return Response
     */
    public function index($id,$page=1)
    {   if($id){
        $facilities = Facility::where('district_id',$id)->with('district.region', "facilityType","images")->take(self::LISTINGS_PER_PAGE)->orderBy('name', 'ASC')->get();
        $pages_count=Facility::count()/self::LISTINGS_PER_PAGE;
    }else{
        $facilities = Facility::with('district.region', "facilityType","images")->take(self::LISTINGS_PER_PAGE)->orderBy('name', 'ASC')->get();
        $pages_count=Facility::count()/self::LISTINGS_PER_PAGE;
        //Show the page
        }
        return View('admin.listings.index', ['facilities'=>$facilities, "pages_count"=>$pages_count,"cur_page"=>$page, "type_url"=>"all"]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getListings($type,$page=1)
    {
        $pages_count=0;
        $type_int;
        $type_title="";
        switch ($type) {
            case 'hotels':
                $type_int=1;
                $type_title="Hotels and Lodges";
                break;
            case 'guesthouses':
                $type_int=2;
                $type_title="Guest Houses";
                break;
            case 'apartments':
                $type_int=3;
                $type_title="Apartments";
                break;
            case 'conferencehalls':
                $type_int=4;
                $type_title="Conference Halls";
                break;
            case 'all':
                $type_int=0;
                $type_title="All";
                break;
            default:
                $type_int=false;
                $type_title="Un";
                break;
        }
        if ($type_int==0) {
            $facilities = Facility::with('district.region', "facilityType","images")
                                    ->orderBy('name', 'ASC')
                                    ->skip(($page-1)*self::LISTINGS_PER_PAGE)
                                    ->take(self::LISTINGS_PER_PAGE)
                                    ->get();
            $pages_count=Facility::count()/self::LISTINGS_PER_PAGE;
        }elseif($type_int>0){
            $facilities = Facility::with('district.region', "facilityType","images")
                                    ->where("type",$type_int)
                                    ->orderBy('name', 'ASC')
                                    ->skip(($page-1)*self::LISTINGS_PER_PAGE)
                                    ->take(self::LISTINGS_PER_PAGE)
                                    ->get();
            $pages_count=Facility::where("type",$type_int)->count()/self::LISTINGS_PER_PAGE;
        }else{
            return redirect('admin/listings/all');
        }
        return View('admin.listings.index', ['facilities'=>$facilities,'type'=>$type_title, "pages_count"=>$pages_count,"cur_page"=>$page, "type_url"=>$type]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getItem($id)
    {
        $facility = Facility::with('district.region',"contacts","facilityType","images")->find($id);
        if ($facility) {
            return View('admin.listings.item', ['facility'=>$facility]);    
        }else{
            return redirect('admin/listings/all')->with('error', 'Does not exist');
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $facilityTypes=FacilityType::get();
        $facilityTypes_out=[];
        foreach ($facilityTypes as $type) {
            $facilityTypes_out[$type['id']]=$type['name'];
        }

        $regions=Region::with("districts")->get();
        $districts_out=[];
        $regions_out=[];
        foreach ($regions as $region){
            $temp_districts=array();
            foreach ($region->districts as $district) {
                $temp_districts[$district['id']]=$district['name'];
            }
            $districts_out[$region['id']]=$temp_districts;
            $regions_out[$region['id']]=$region['name'];
        }
        $districts_out=json_encode($districts_out);
        return view('admin.listings.create',["facilityTypes"=>$facilityTypes_out,"regions"=>$regions_out,"districts"=>$districts_out]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $destinationPath = public_path() . '/uploads/files/';
        $file_temp = $request->file('image');
        if($file_temp){
            $extension  = $file_temp->getClientOriginalExtension() ?: 'png';
            $safeName   = 'facilitymap_'.date("Ymdhis",time()).'.'.$extension;
            $file_temp->move($destinationPath, $safeName);
        }
        $facility=new Facility();
        $facility->name=$request->input('name');
        $facility->description=$request->input('description');
        $facility->latitude=0.0;
        $facility->longtude=0.0;
        $facility->map_image_path=$safeName;
        $facility->type=$request->input('facility_type');
        $facility->district_id=$request->input('district');
        $facility->physical_addressl=$request->input('physical_address');
        $facility->price_range=$request->input('price_range');
        $facility->amenities=$request->input('amenities')!=null || @count($request->input('amenities'))>0?$request->input('amenities'):"";
        $facility->date_added=date("Y-m-d",time());
        $email=$request->input('email');
        $website=$request->input('website');

        if ($facility->save()){
            if (@count($email)>0) {
                $c=new Contact(['type'=>2,'contact'=>$email]);
                $facility->contacts()->save($c);
            }
            if (@count($website)>0) {
                $c=new Contact(['type'=>3,'contact'=>$website]);
                $facility->contacts()->save($c);
            }
            $phone_nos=explode(",", $request->input('phone_nos'));
            foreach ($phone_nos as $number) {
                $c=new Contact(['type'=>1,'contact'=>$number]);
                $facility->contacts()->save($c);
            }
            return redirect('admin/listings/'.$facility->id.'/images')->with('success', "Added Successfully");
        } else {
            return redirect('admin/listings/create')->withInput()->with('error', 'Failed to add');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $facilityTypes=FacilityType::get();
        $facilityTypes_out=[];
        foreach ($facilityTypes as $type) {
            $facilityTypes_out[$type['id']]=$type['name'];
        }

        $regions=Region::with("districts")->get();
        $districts_out=[];
        $regions_out=[];
        foreach ($regions as $region){
            $temp_districts=array();
            foreach ($region->districts as $district) {
                $temp_districts[$district['id']]=$district['name'];
            }
            $districts_out[$region['id']]=$temp_districts;
            $regions_out[$region['id']]=$region['name'];
        }
        $districts_out=json_encode($districts_out);
        $facility=Facility::find($id);
        $numbers=[]; $email=null; $website=null;
        foreach($facility->contacts()->where('type',1)->get() as $c){
            $numbers[]=$c->contact;
        }
        foreach($facility->contacts()->where('type',2)->get() as $c){
            $email=$c->contact;
            break;
        }
        foreach($facility->contacts()->where('type',3)->get() as $c){
           $website=$c->contact;
            break; 
        }
        $contacts=['phone_nos'=>implode(',', $numbers),"email"=>$email,'website'=>$website];
        return view('admin.listings.edit',["facilityTypes"=>$facilityTypes_out,"regions"=>$regions_out,"districts"=>$districts_out,"facility"=>$facility,'contacts'=>$contacts]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request)
    {
        $facility=Facility::find($request->input("facility_id"));
        $file_temp = $request->file('image');
        if($file_temp){
            $destinationPath = public_path() . '/uploads/files/';
            $extension  = $file_temp->getClientOriginalExtension() ?: 'png';
            $safeName   = 'facilitymap_'.date("Ymdhis",time()).'.'.$extension;
            $file_temp->move($destinationPath, $safeName);
            $facility->map_image_path=$safeName;
        }
        $facility->name=$request->input('name');
        $facility->description=$request->input('description');
        $facility->type=$request->input('facility_type');
        $facility->district_id=$request->input('district');
        $facility->physical_addressl=$request->input('physical_address');
        $facility->price_range=$request->input('price_range');
        $facility->amenities=$request->input('amenities')!=null || @count($request->input('amenities'))>0?$request->input('amenities'):"";

        $email=$request->input('email');
        $website=$request->input('website');
        if ($facility->update()){
            $facility->contacts()->delete();
            if (@count($email)>0) {
                $c=new Contact(['type'=>2,'contact'=>$email]);
                $facility->contacts()->save($c);
            }
            if (@count($website)>0) {
                $c=new Contact(['type'=>3,'contact'=>$website]);
                $facility->contacts()->save($c);
            }
            $phone_nos=explode(",", $request->input('phone_nos'));
            foreach ($phone_nos as $number) {
                $c=new Contact(['type'=>1,'contact'=>$number]);
                $facility->contacts()->save($c);
            }
            return redirect('admin/listings/'.$facility->id.'/view')->with('success', 'Changes were Successfully saved, please cross check');
        }else {
            return redirect('admin/listings/'.$facility->id.'/edit')->withInput()->with('error', "Failed to edit");
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $facility=Facility::find($id);
        $facility->images()->delete();
        $facility->contacts()->delete();
        if ($facility->delete()){
            return redirect('admin/listings/all')->with('success', 'Deleted successfully');
        }else {
            return redirect('admin/listings/'.$facility->id.'/view')->withInput()->with('error', "Failed to edit");
        }
    }


    /**
     * @param BlogCategory $blogcategory
     * @return mixed
     */
    public function getModalDelete(BlogCategory $blogcategory)
    {
        $model = 'blogcategory';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('delete/blogcategory', ['id' => $blogcategory->id]);
            return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {
            $error = trans('blogcategory/message.error.delete', compact('id'));
            return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }


    public function getImages($id)
    {
        $facility=Facility::with("images")->find($id);
        return View('admin.listings.images', ["facility"=>$facility]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FileUploadRequest $request
     * @return Response
     */
    public function postImagesCreate(FileUploadRequest $request,$facility_id)
    {
        $destinationPath = base_path() . '/uploads/files/';

        $file_temp = $request->file('file');
        $description = $request->input('description');
        $extension  = $file_temp->getClientOriginalExtension() ?: 'png';
        $safeName   = 'facilityImage_'.date("Ymdhis",time()).'.'.$extension;

        $image = new Image();
        $image->path = $safeName;
        $image->description = $description;
        $image->facility_id = $facility_id;
        $image->save();

        $file_temp->move($destinationPath, $safeName);
        Thumbnail::generate_image_thumbnail($destinationPath . $safeName, $destinationPath . 'thumb_' . $safeName);

        $success = new stdClass();
        $success->name = $safeName;
        $success->size = $file_temp->getClientSize();
        $success->url = $safeName;
        $success->thumbnailUrl =  URL::to('/uploads/files/thumb_'.$safeName);
        $success->deleteUrl = URL::to('admin/listings/image/delete?_token='.csrf_token().'&id='.$image->id);
        $success->deleteType = 'DELETE';
        $success->fileID = $image->id;
        return Response::json(array( 'files'=> array($success)), 200);
    }


    public function imageDelete(Request $request)
    {
        if(isset($request->id)) {
            $upload = Image::find($request->id);
            $upload->delete();

            unlink(base_path('uploads/files/'.$upload->path));
            unlink(base_path('uploads/files/thumb_'.$upload->path));

            if(!isset(Image::find($request->id)->path)) {
                $success = new stdClass();
                $success->{$upload->path} = true;
                return Response::json(array('files' => array($success)), 200);
            }
        }
    }

    public function imageDeleteById(Request $request,$facility_id, $image_id)
    {
        $upload = Image::find($image_id);
        $upload->delete();

        unlink(base_path('uploads/files/'.$upload->path));
        unlink(base_path('uploads/files/thumb_'.$upload->path));

        if(!isset(Image::find($image_id)->path)) {
            $success = new stdClass();
            $success->{$upload->path} = true;
            return redirect('admin/listings/'.$facility_id.'/images')->with('success', 'Successfully deleted');
        }else{
            return redirect('admin/listings/'.$facility_id.'/images')->with('error', 'Does not exist');
        }
    }


}