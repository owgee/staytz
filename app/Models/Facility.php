<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model {

    /**
     * Generated
     */

    protected $table = 'facilities';
    protected $fillable = ['id', 'name', 'description', 'type', 'price_range', 'district_id', 'physical_addressl', 'longtude', 'latitude', 'date_added','map_image_path'];
    public $timestamps = false;


    public function district() {
        return $this->belongsTo(\App\Models\District::class, 'district_id', 'id');
    }

    public function facilityType() {
        return $this->belongsTo(\App\Models\FacilityType::class, 'type', 'id');
    }

    public function contacts() {
        return $this->hasMany(\App\Models\Contact::class, 'facility_id', 'id');
    }

    public function images() {
        return $this->hasMany(\App\Models\Image::class, 'facility_id', 'id');
    }


}
