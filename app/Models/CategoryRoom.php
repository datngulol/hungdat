<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryRoom extends Model
{
    //
    protected $table="category_room";
    public $timestamps = false;
    public function getRoom()
    {
    	return $this->hasMany(Room::class,'idCategory','id');
    }
}
