<?php namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Region;
use App\Models\District;
use Illuminate\Http\Request;
use Sentinel;
use Illuminate\Http\Exception;

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
            $destinationPath = public_path() . '/uploads/files/';
            $extension  = $file_temp->getClientOriginalExtension() ?: 'png';
            $safeName   = $request->input('region_name').'.'.$extension;
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