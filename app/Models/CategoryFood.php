<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryFood extends Model
{
    //
    protected $table="category_food";
    public function getFood()
    {
    	return $this->hasMany(Food::class,'idCategory','id');
    }
}
