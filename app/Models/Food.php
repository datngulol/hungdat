<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
class Food extends Model
{
    //
    protected $table="food";
    public $timestamps = false;

    public function GetById($id)
    {
    	$query="SELECT * FROM Food WHERE id=". $id;
    	$data=DB::select(DB::raw($query));
    	return $data;
    }
    public function categoryFood()
    {
    	return $this->belongsTo(CategoryFood::class,'idCategory','id');
    }
}
