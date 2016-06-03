<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Admin;
use App\Models\Facility;
use App\Models\Region;
use App\Models\District;
use App\Models\Contact;
use App\Models\Booking;


class Application extends Controller
{
	/**
	* @var int listings per page
	*/
	const LISTINGS_PER_PAGE=15;

    /**
    * @var String Subject of the booking email
    */
    const EMAIL_SUBJECT="Booking - Staytz";

    /**
     * @param int $type
     * @param int $page
     * @return mixed
     */
    public function getListings($type=1, $page=0)
    {
    	$facilities=Facility::with("images")
                    ->where("type",$type)
                    ->offset(self::LISTINGS_PER_PAGE*($page-1))
                    ->take(self::LISTINGS_PER_PAGE)
                    ->get();
        $regions=Region::select("id","name","image_path",\DB::raw("'1' AS type"));
        $places=District::select("id","name",\DB::raw("'' AS image_path"), \DB::raw("'2' AS type"))
                    ->union($regions)
                    ->orderBy("name","ASC")
                    ->get();
    	return response()->json(array("response"=>"ok","content"=>["facilities"=>$facilities, "places"=>$places]));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getListingItem($id)
    {
    	$facility=Facility::with("contacts", 'district.region', "facilityType","images")->find($id);
    	return response()->json(array("response"=>"ok","content"=>$facility));
    }

    /**
     * @param Request $request
     * @param int $type
     * @param int $page
     * @return mixed
     */
    public function getPlaceListings(Request $request,$type=1,$page=1)
    {
        $place_type=$request->input("place_type");
        $place_id=$request->input("place_id");
    	if ($place_type==2){
    		$facilities=Facility::with("images")
                            ->where("type",$type)
                            ->where("district_id",$place_id)
                            ->offset(self::LISTINGS_PER_PAGE*($page-1))
                            ->take(self::LISTINGS_PER_PAGE)
                            ->get();
    	}elseif($place_type==1){
            $facilities=Facility::with("images")
                                ->join('districts', 'districts.id', '=', 'facilities.district_id')
                                ->join('regions', 'regions.id', '=', 'districts.region_id')
                                ->where("region_id",$place_id)
                                ->where("type",$type)
                                ->select("facilities.*","regions.name AS region")
                                ->offset(self::LISTINGS_PER_PAGE*($page-1))
                                ->take(self::LISTINGS_PER_PAGE)
                                ->get();
        }else{
            $facilities=Facility::with("images")
                            ->where("type",$type)
                            ->offset(self::LISTINGS_PER_PAGE*($page-1))
                            ->take(self::LISTINGS_PER_PAGE)
                            ->get();
        }
        $regions=Region::select("id","name","image_path",\DB::raw("'1' AS type"));
        $places=District::select("id","name",\DB::raw("'' AS image_path"), \DB::raw("'2' AS type"))
            ->union($regions)
            ->orderBy("name","ASC")
            ->get();
        return response()->json(array("response"=>"ok","content"=>["facilities"=>$facilities,"places"=>$places]));
    }

    /**
     * @param Request $request
     * @param int $type
     * @param int $page
     * @return mixed
     */
    public function searchListings(Request $request , $type=1, $page=1)
    {
        $place_type=$request->input("place_type");
        $place_id=$request->input("place_id");
        $keywords=$request->input("keywords");

        $keywords_array=explode(" ", $keywords);
        global $where;
        for ($i=0;$i<count($keywords_array);++$i) {
            $where.="%".strtolower($keywords_array[$i])."%";
            if (($i+1)!=count($keywords_array)) {
                $where.=" OR ";
            }
        }
        if ($place_type==2){
            $facilities=Facility::with("images")
                            ->where("type",$type)
                            ->where("district_id",$place_id)
                            ->where(function ($query){
                                $query->where(\DB::raw("LOWER(name)"),"like",$GLOBALS['where'])
                                      ->orWhere(\DB::raw("LOWER(physical_addressl)"),"like",$GLOBALS['where']);
                            })
                            ->offset(self::LISTINGS_PER_PAGE*($page-1))
                            ->take(self::LISTINGS_PER_PAGE)
                            ->get();
        }elseif($place_type==1){
            $facilities=Facility::with("images")
                                ->join('districts', 'districts.id', '=', 'facilities.district_id')
                                ->join('regions', 'regions.id', '=', 'districts.region_id')
                                ->where("region_id",$place_id)
                                ->where(function ($query){
                                    $query->where(\DB::raw("LOWER(facilities.name)"),"like",$GLOBALS['where'])
                                          ->orWhere(\DB::raw("LOWER(physical_addressl)"),"like",$GLOBALS['where']);
                                })
                                ->select("facilities.*")
                                ->offset(self::LISTINGS_PER_PAGE*($page-1))
                                ->take(self::LISTINGS_PER_PAGE)
                                ->get();
        }else{
            $facilities=Facility::with("images")
                            ->where("type",$type)
                            ->where(function ($query){
                                $query->where(\DB::raw("LOWER(name)"),"like",$GLOBALS['where'])
                                      ->orWhere(\DB::raw("LOWER(physical_addressl)"),"like",$GLOBALS['where']);
                            })
                            ->offset(self::LISTINGS_PER_PAGE*($page-1))
                            ->take(self::LISTINGS_PER_PAGE)
                            ->get();
        }
        $regions=Region::select("id","name","image_path",\DB::raw("'1' AS type"));
        $places=District::select("id","name",\DB::raw("'' AS image_path"), \DB::raw("'2' AS type"))
            ->union($regions)
            ->orderBy("name","ASC")
            ->get();
        return response()->json(array("response"=>"ok","content"=>["facilities"=>$facilities,"places"=>$places]));
    }

    public function getRegions(){
        $regions=Region::select("id","name","image_path",\DB::raw("'1' AS type"))->orderBy("name","ASC")->take(100)->get();
        foreach ($regions as $region) {
            $region->c_hotels=Facility::with("images")
                                ->join('districts', 'districts.id', '=', 'facilities.district_id')
                                ->join('regions', 'regions.id', '=', 'districts.region_id')
                                ->where("region_id",$region->id)
                                ->where("type",1)
                                ->count();
            $region->c_gh=Facility::with("images")
                                ->join('districts', 'districts.id', '=', 'facilities.district_id')
                                ->join('regions', 'regions.id', '=', 'districts.region_id')
                                ->where("region_id",$region->id)
                                ->where("type",2)
                                ->count();
            $region->c_apartments=Facility::join('districts', 'districts.id', '=', 'facilities.district_id')
                                ->join('regions', 'regions.id', '=', 'districts.region_id')
                                ->where("region_id",$region->id)
                                ->where("type",3)
                                ->count();
            $region->c_ch=Facility::join('districts', 'districts.id', '=', 'facilities.district_id')
                                ->join('regions', 'regions.id', '=', 'districts.region_id')
                                ->where("region_id",$region->id)
                                ->where("type",4)
                                ->count();
        }
        return response()->json(array("response"=>"ok","content"=>$regions));
    }


    public function book(Request $request)
    {

        $karibu_sms = new \karibusms();
        $user_email = $request->input("email"); 
        $user_phone_no = $request->input("phoneNo");
        $name = $request->input("name");
        $user_message = $request->input("message");
        $facility_id = $request->input("facility_id");

        $booking=new Booking(['name'=>$name,'phone_number'=>$user_phone_no, 'email'=>$user_email,'message'=>$user_message, 'facility_id'=>$facility_id,'status'=>20]);

        $toz=Contact::where("type",2) //type=2, email
                    ->where("facility_id",$facility_id)
                    ->value('contact');
        if($toz){
            $to=$toz;
            $txt="Booking sent by Staytz app user\nName: $name\nPhone number: $user_phone_no\nE-mail : $user_email \n\nMessage :\n$user_message";

            $subject = self::EMAIL_SUBJECT;
            $headers = "From: ". $user_email . "\r\n";
            $result = mail($to,$subject,$txt,$headers);
            if ($result) {
                $booking->status=1;
                $booking->save();
                $karibu_sms->send_sms($user_phone_no,$txt);
                return ["response"=>"ok","content"=>"success"];
            }else{
                $booking->save();
                return ["response"=>"failed","content"=>"failed"];
            }
        }
        $booking->status=10;
        $booking->save();
        return ["response"=>"failed","content"=>"failed! Service not supported (no email address)"];
    }



}
