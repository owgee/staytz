<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model {

    /**
     * Generated
     */

    protected $table = 'admins';
    protected $fillable = ['id', 'fname', 'lname', 'username', 'password', 'regdate'];



}
