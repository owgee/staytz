<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model {

    /**
     * Generated
     */

    protected $table = 'districts';
    protected $fillable = ['id', 'name', 'region_id', 'latitude', 'longtude'];
    public $timestamps=false;


    public function region() {
        return $this->belongsTo(\App\Models\Region::class, 'region_id', 'id');
    }

    public function facilities() {
        return $this->hasMany(\App\Models\Facility::class, 'district_id', 'id');
    }


}
