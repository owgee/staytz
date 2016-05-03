<?php 

namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function index(Request $request)
    {
        $bookings=Booking::with("facility")->take(1000)->orderBy("created_at","DESC")->get();
        return View('admin.bookings.view',compact("bookings"));
    }

    /**
     * @param  $id booking id
     */
    public function delete($id)
    {
        $n=Booking::find($id);
        if($n && $n->delete()){
            return redirect('admin/bookings/')->with('success', 'Successfully deleted');
        }else{
            return redirect('admin/bookings/')->with('error', 'Failed to delete! ');
        }
    }

}