<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

    /**
     * Generated
     */

    protected $table = 'images';
    protected $fillable = ['facility_id', 'path', 'description'];
    public $timestamps=false;


    public function facility() {
        return $this->belongsTo(\App\Models\Facility::class, 'facility_id', 'id');
    }


}
