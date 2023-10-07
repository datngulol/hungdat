<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController ;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CategoryRoomController;
use App\Http\Controllers\DescriptionController ;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\LienheController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('home',[PageController::class, 'home'])->name('home');
Route::get('about',[PageController::class, 'about'])->name('about');
Route::get('event',[PageController::class,'event']);
Route::get('rooms',[PageController::class,'rooms']);	
Route::get('reservation/{idCate}',[PageController::class,'reservation']);
Route::post('postReservation',[PageController::class,'postReservation']);
Route::get('exportBill',[UserController::class,'exportBill']);
Route::get('/admin/report',[UserController::class,'report']);
Route::get('/admin/monthReport/{idMonth}',[UserController::class,'monthReport']);


//route cho login
Route::get('admin/dangki',[UserController::class,'signin'])->name('admin.dangki');
Route::post('admin/dangki',[UserController::class,'postSignin'])->name('admin.postdangki');

Route::get('admin/login',[UserController::class,'getDangNhapAdmin'])->name('admin.dangnhap');
Route::post('admin/login',[UserController::class,'postDangNhapAdmin'])->name('admin.postdangnhap');
Route::get('admin/logout',[UserController::class,'getDangXuatAdmin']);

Route::get('exportInvoice/{idReservation}',[UserController::class,'exportInvoice']);

//tạo route cho trang admin
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){

	Route::group(['prefix'=>'information'],function(){

		
		Route::get('list',[InformationController::class,'getInformation']);
		Route::get('edit',[InformationController::class,'edit']);
		Route::post('editPost',[InformationController::class,'EditPost']);
	
	}); //route for Information

	Route::group(['prefix'=>'about'],function(){

		Route::get('list',[AboutController::class,'getAbout']);

		Route::get('edit',[AboutController::class,'Edit']);
		Route::post('editPost',[AboutController::class,'EditPost']);
	});	//Route for About

	Route::group(['prefix'=>'description'],function(){

		Route::get('list',[DescriptionController::class,'getDescription']);

		Route::get('edit',[DescriptionController::class,'Edit']);
		Route::post('editPost',[DescriptionController::class,'EditPost']);
	});	//Route for About

	Route::group(['prefix'=>'event'],function(){

		Route::get('list',[EventController::class,'getEvent']);

		Route::get('edit/{id}',[EventController::class,'Edit']);
		Route::post('editPost/{id}',[EventController::class,'EditPost']);

		Route::get('add',[EventController::class,'Add']);
		Route::post('addpost',[EventController::class,'AddPost']);

		

		Route::get('delete/{id}',[EventController::class,'Delete']);
	});	//Route for Event

	Route::group(['prefix'=>'slide'],function(){

		Route::get('list',[SlideController::class,'getSlide']);

		Route::get('edit/{id}',[SlideController::class,'Edit']);
		Route::post('editPost/{id}',[SlideController::class,'EditPost']);

		Route::get('add',[SlideController::class,'Add']);
		Route::post('addpost',[SlideController::class,'AddPost']);

		

		Route::get('delete/{id}',[SlideController::class,'Delete']);
	});	//Route for slide

	Route::group(['prefix'=>'food'],function(){

		Route::get('list',[FoodController::class,'getFood']);

		Route::get('edit/{id}',[FoodController::class,'edit']);
		Route::post('editPost/{id}',[FoodController::class,'editPost']);

		Route::get('add',[FoodController::class,'add']);
		Route::post('addpost',[FoodController::class,'addPost']);

		

		Route::get('delete/{id}',[FoodController::class,'delete']);
	});	//Route for delete

	Route::group(['prefix'=>'category_room'],function(){

		Route::get('list',[CategoryRoomController::class,'getRoom']);

		Route::get('edit/{id}',[CategoryRoomController::class,'Edit']);
		Route::post('editPost/{id}',[CategoryRoomController::class,'EditPost']);

		Route::get('add',[CategoryRoomController::class,'Add']);
		Route::post('addpost',[CategoryRoomController::class,'AddPost']);

		

		Route::get('delete/{id}',[CategoryRoomController::class,'Delete']);
	});

	Route::group(['prefix'=>'room'],function(){

		Route::get('list',[RoomController::class,'getRoom']);

		Route::get('edit/{id}',[RoomController::class,'Edit']);
		Route::post('editPost/{id}',[RoomController::class,'EditPost']);

		Route::get('add',[RoomController::class,'Add']);
		Route::post('addpost',[RoomController::class,'AddPost']);

		

		Route::get('delete/{id}',[RoomController::class,'Delete']);
	});	//Route for delete

	Route::group(['prefix'=>'reservation'],function(){

		Route::get('list',[ReservationController::class,'getReservation']);

		Route::get('edit/{id}',[ReservationController::class,'Edit']);
		Route::post('editPost/{id}',[ReservationController::class,'EditPost']);

		Route::get('add',[ReservationController::class,'Add']);
		Route::post('addpost',[ReservationController::class,'AddPost']);

		

		Route::get('delete/{id}',[ReservationController::class,'Delete']);
	});	//Route for delete

	Route::group(['prefix'=>'bill'],function(){

		Route::get('list/{id}',[BillController::class,'getBill']);
		Route::get('add/{id}',[BillController::class,'add']);
		Route::post('addpost/{id}',[BillController::class,'addPost']);
		Route::get('export/{id}',[BillController::class,'Export']);

		

		Route::get('delete/{id}/{idReser}','BillController@Delete');
	});	//Route for delete

	Route::group(['prefix'=>'user'],function(){

		Route::get('list',[UserController::class,'getUser']);

		Route::get('edit/{id}',[UserController::class,'Edit']);
		Route::post('editPost/{id}',[UserController::class,'EditPost']);

		Route::get('add',[UserController::class,'Add']);
		Route::post('addpost',[UserController::class,'AddPost']);

		

		Route::get('delete/{id}',[UserController::class,'Delete']);
	});	//Route for delete

	Route::group(['prefix' => 'contact'], function(){
		Route::get('list', [LienheController::class, 'getAdminContact']);
		Route::get('edit/{id}',[LienheController::class,'Edit']);
		Route::post('editPost/{id}',[LienheController::class,'EditPost']);
		Route::get('delete/{id}',[LienheController::class,'Delete']);
	});

});

Route::group(['prefix'=>'api'],function(){
	Route::get('room-type',[ApiController::class,'getRoomType']);
	Route::get('news',[ApiController::class,'getNews']);
	Route::post('hipost',[ApiController::class,'testPost']);
	Route::get('history',[ApiController::class,'getHistory']); //history?email=
	Route::get('getRoomAvailable/{idRoom}',[ApiController::class,'getRoomAvailable']);
	Route::get('getMonthReportData/{idMonth}',[ApiController::class,'getMonthReportData']);
	Route::post('reservation',[ApiController::class,'postReservation']); 
	Route::post('postReservation',[ApiController::class,'Reservation']);//reservation?number=  
});	

Route::view('invoice','admin.bill.invoice');

Route::get('lienhe', [MailController::Class, 'getContactMail'])->name('getContactMail');
Route::post('lienhe', [MailController::Class, 'postContactMail'])->name('postContactMail');
