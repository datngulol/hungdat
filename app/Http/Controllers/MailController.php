<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\ContactMail;
use App\Models\User;
use App\Models\Contact;

class MailController extends Controller
{
    public function getContactMail(){
        return view('pages.lienhe');
    }

    public function  postContactMail(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $content = $request->input('message');
        $subject = $request->input('subject');

        // Tạo một đối tượng UserMail với dữ liệu trên
        $userMail = new ContactMail($name, $email, $content, $subject);

        // Gửi email đến người quản lý web với địa chỉ là admin@web.com
        Mail::to('wuungnguyen99@gmail.com')->send($userMail);
        $emails = new Contact();
        $emails->name = $name;
        $emails->subject = $subject;
        $emails->message = $content;
        $emails->email = $email;
        $emails->status = 1;
        
        $emails->save();
        Session::flash('message', 'Gửi email thành công !');
        // Trả về một thông báo thành công
        return redirect()->route('getContactMail');
    }
   
}
