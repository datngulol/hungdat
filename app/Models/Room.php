<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\CategoryRoom;

class Room extends Model
{
    //
    protected $table="room";
   
    public $timestamps = false;

    public function categoryRoom()
    {
    	return $this->belongsTo(CategoryRoom::class,'idCategory');
    }
}
