<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;

class LienheController extends Controller
{
    
    public function getAdminContact(){
        $contacts = Contact::all();
        return view('admin.lienhe.list', ['contact' => $contacts]);
    }

    public function Edit($id)
    {
        
        $contacts=Contact::find($id);
        return view('admin.lienhe.edit',['contact'=>$contacts]);
    }
    public function EditPost(Request $request,$id)
    {
        $this->validate($request,
    [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
        'subject' => 'required',
        'status' => 'required'
    ],
    [
        'name.required' => "Bạn chưa nhập tên user",
        'email.required' => "Bạn chưa nhập mail",
        'email.email' => "Địa chỉ email không hợp lệ",
        'message.required' => "Bạn chưa nhập message",
        'subject.required' => "Bạn chưa nhập subject",
        'status.required' => "Bạn chưa nhập status"
    ]);
        
        $contacts=Contact::find($id);
       
        $contacts->name = $request->name;
            $contacts->email = $request->email;
            $contacts->message = $request->message;
            $contacts->subject = $request->subject;
            $contacts->status = $request->status;

            // In ra các giá trị để kiểm tra xem chúng có chính xác không
            // dd($contacts);

            $contacts->save();
        return redirect('admin/contact/list')->with('thongbao','Sửa thông tin liên hệ  thành công');
      
    }
    public function Delete($id)
    {
        $contacts=Contact::find($id);
        $contacts->delete();
        return redirect('admin/contact/list')->with('thongbao','Xóa  liên hệ thành công');
     }
}
