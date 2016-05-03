<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacilityType extends Model {

    /**
     * Generated
     */

    protected $table = 'facility_types';
    protected $fillable = ['id', 'name'];


    public function facilities() {
        return $this->hasMany(\App\Models\Facility::class, 'type', 'id');
    }


}
