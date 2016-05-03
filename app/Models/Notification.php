<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	protected $fillable = ['title', 'message', 'date_added'];
    protected $table = 'notifications';
    public $timestamps=false;

}
