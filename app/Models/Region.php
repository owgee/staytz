<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Region extends Model{

    /**
     * Generated
     */

    protected $table = 'regions';
    protected $fillable = ['id', 'name', 'latitude', 'longtude'];
    public $timestamps = false;


    public function districts(){
        return $this->hasMany(\App\Models\District::class, 'region_id', 'id');
    }


}
