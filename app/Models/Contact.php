<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

    /**
     * Generated
     */

    protected $table = 'contacts';
    protected $fillable = ['facility_id', 'contact', 'type'];
    public $timestamps=false;


    public function facility() {
        return $this->belongsTo(\App\Models\Facility::class, 'facility_id', 'id');
    }


}
