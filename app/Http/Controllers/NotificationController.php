<?php 

namespace App\Http\Controllers;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{

    public function index(Request $request)
    {
        $notifications=Notification::orderBy("date_added","DESC")->take(1000)->get();
        return View('admin.notifications.notifications',compact("notifications"));
    }



    /**
     * Show view for creatng a new software
     */
    public function create()
    {
        return View('admin.notifications.create');
    }


    /**
     * Store a newly created push notification ready to be pulled
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $data=[
            "title"=>trim($request->input("title"),' '),
            "message"=>trim($request->input("message"),' ')
            ];
        Validator::make($data, [
            'title' => 'required|max:255',
            'message' => 'required|max:255',
        ]);
        $collapse_key="update";
        $topics="/topics/global";
        $ids=null;//my device ["cblt7zRMVz0:APA91bGlz5UiN6U25eCYxZr-cjprBw-jlneuBKPxKwNJIidaEY2gIW_J-bUJxupi32GJ8AAPSXdAzOq4Nth6T4goJGrRD2Re0Jqao3vgit66VlblEmzbYyPTgrKAdYMWzEb-yQ_hFQX2"];
        $result=$this->gcm_send_notification($data,$collapse_key ,$topics ,$ids);
        if ($result==false) {
           return redirect('admin/notifications/create')->with('error', 'Failed to push!');
        }
        $n=new Notification([
            "title"=>$request->input("title"),
            "message"=>$request->input("message"),
            "date_added"=>date("Y-m-d",time())
            ]);
        if ($n->save()) {
            return redirect('admin/notifications/')->with('success', 'pushed Successfully!');
        }else{
            return redirect('admin/notifications/create')->with('error', 'Message was pushed but failed to store!');
        }
    }

    /**
     * Delete the given Driver.
     *
     * @param  $id notification id
     */
    public function delete($id)
    {
        $n=Notification::find($id);
        if($n && $n->delete()){
            return redirect('admin/notifications/')->with('success', 'Successfully deleted');
        }else{
            return redirect('admin/notifications/')->with('error', 'Failed to delete! ');
        }
    }


    public function gcm_send_notification($data,$collapse_key ,$topics ,$ids)
    {     
        $apiKey = 'AIzaSyBwNRflkGMJfJXrGDDCykyoKryDarCPt4w';
        $url = 'https://gcm-http.googleapis.com/gcm/send';

        // Set GCM post variables (device IDs and push payload)
        if($topics!=null){
            $post = array(
                        'to'   => $topics,
                        'data' => $data,
                        'collapse_key' => $collapse_key
                        );
        }else{
            $post = array(
                        'registration_ids'  => $ids,
                        'data'              => $data,
                        'collapse_key' => $collapse_key
                        );
        }   
        // Set CURL request headers (authentication and type)       
        $headers = array( 
                            'Authorization: key=' . $apiKey,
                            'Content-Type: application/json'
                        );
        // Initialize curl handle       
        $curl = curl_init();      
        curl_setopt( $curl, CURLOPT_URL, $url ); //set url    
        curl_setopt( $curl, CURLOPT_POST, true ); // Set request method to POST       
        curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers ); // Set headers         
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true ); // Get the response back as string, do not print it 
        curl_setopt( $curl, CURLOPT_POSTFIELDS, json_encode($post)); // Set JSON post data 
        $result = curl_exec( $curl );
        // Check for error
        if ( curl_errno( $curl ) )
        {
            return false;
        }
        curl_close($curl);   
        return $result;
    }

}