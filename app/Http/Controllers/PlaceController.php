<?php namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Region;
use App\Models\District;
use Illuminate\Http\Request;
use Sentinel;
use Illuminate\Http\Exception;
use Illuminate\Contracts\Encryption\DecryptException;

class PlaceController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // Grab all the regions
        $regions = Region::all();// Show the page
        return View('admin.places.regions', compact('regions'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function storeRegion(Request $request)
    {
        $region=new Region();
        $file_temp = $request->file('image');
        if($file_temp){
            $destinationPath = base_path() .'/uploads/files/';
            $extension  = $file_temp->getClientOriginalExtension() ?: 'png';
            $safeName   = str_replace(' ','',$request->input('region_name')).'.'.$extension;
            $file_temp->move($destinationPath, $safeName);
            $region->name=$request->input('region_name');
            $region->image_path=$safeName;
            if ($region->save()){
                return redirect('admin/places')->with('success', "Added successfully");
            } else {
                return redirect('admin/places')->withInput()->with('error', 'Failed to add');
            }
        }else{
            return redirect('admin/places')->withInput()->with('error', 'No image selected');
        }
    }




    /**
     * Store a newly created resource in storage.
     * @return Response
     */
    public function getDistricts($id)
    {
        $region = Region::find($id);
        return View('admin.places.districts', compact('region'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function storeDistrict(Request $request)
    {
        $region=Region::find($request->input('region_id'));
        $district=new District(["name"=>$request->input('district_name')]);
        if ($region->districts()->save($district)){
            return redirect('admin/places/'.$region->id.'/districts')->with('success', "Added succesfully");
        } else {
            return redirect('admin/places/'.$region->id.'/districts')->withInput()->with('error', 'Failed to add');
        }

    }


    /**
     * Delete the given Driver.
     *
     * @param  $r_id Region id
     * @param  $r_id district id of the district to be deleted
     */
    public function deleteDistrict($r_id,$d_id)
    {
        $d=District::find($d_id);
        try{
        if($d && $d->delete()){
            return redirect('admin/places/'.$r_id.'/districts')->with('success', 'Successfully deleted');
        }else{
            return redirect('admin/places/'.$r_id.'/districts')->with('error', 'Failed! please delete first all entries in this district');
        }

    } catch(\Exception $e){
            return redirect('admin/places/')->with('error', 'Failed! please delete first all Listings in '.$d->name);
        }
    }

    public function editRegion($region_id){

        try{
            $region=Region::find(decrypt($region_id));
        }catch(DecryptException $e){
            return redirect('admin/places')->with('error', 'Nope! You can\'t do that ');
        }
        return view('admin.places.edit',['region'=>$region]);

    }

    public function updateRegion($region_id){


        try{
            $region_id = decrypt($region_id);

        }catch(DecryptException $e){
            return redirect('admin/places')->with('error', 'Nope! You can\'t do that ');
        }

        $region = Region::find($region_id);
        $file_temp = request()->file('image');
        $name = request()->input('region_name');
        if($file_temp){
            $destinationPath = base_path() .'/uploads/files/';
            $extension  = $file_temp->getClientOriginalExtension() ?: 'png';
            $safeName   = str_replace(' ','',request()->input('region_name')).'.'.$extension;
            if (\Illuminate\Support\Facades\File::exists($destinationPath.$region->image_path))
            unlink(base_path('uploads/files/'.$region->image_path));
            $file_temp->move($destinationPath, $safeName);
            $image_path=$safeName;
            if (Region::where('id',$region_id)->update(['name'=>$name,'image_path'=>$image_path])){
                return redirect('admin/places/'.encrypt($region_id).'/edit')->with('success', "Region successfully Updated");
            } else {
                return redirect('admin/places/'.encrypt($region_id).'/edit')->withInput()->with('error', 'Failed to update');
            }
        }elseif(Region::where('id',$region_id)->update(['name'=>$name])){
            return redirect('admin/places/'.encrypt($region_id).'/edit')->with('success', "Region successfully Updated");
        }
        return redirect('admin/places/'.encrypt($region_id).'/edit')->withInput()->with('error', 'Failed to update');
    }

    /**
     * Delete the given Driver.
     *
     * @param  $region_id Region id of the region to delete
     */
    public function deleteRegion($region_id)
    {
    $region=Region::find($region_id);
        try{
            $region->districts()->delete();
            unlink(base_path('uploads/files/'.$region->image_path));
            if($region && $region->delete()){
                return redirect('admin/places/')->with('success', 'Successfully deleted');
            }else{
                return redirect('admin/places/')->with('error', 'Failed! please delete first all entries in this region');
            }
        }catch(\Exception $e){
            return redirect('admin/places/')->with('error', 'Failed! please delete first all entries in '.$region->name);
        }
    }

}