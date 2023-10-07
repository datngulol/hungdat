<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{
    //
    protected $table="reservation";
    public $timestamps = false;
    public function getRoom()
    {
    	return $this->belongsTo(Room::class,'idRoom','id');
    }
}
