<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model {


    protected $table = 'bookings';
    protected $fillable = ['id', 'name', 'phone_number', 'email', 'message', 'facility_id','status'];

    public function facility() {
        return $this->belongsTo(\App\Models\Facility::class, 'facility_id', 'id');
    }


}
