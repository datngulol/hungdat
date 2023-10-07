@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                  
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                         @if(count($errors)>0)
                        <div class="alert alert-danger"> 
                             @foreach ($errors->all() as $err) 
                                {{$err}} <br>
                            @endforeach
                        </div>
                        @endif
                        @if (session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
                        <form action="admin/contact/editPost/{{$contact->id}}" method="POST" enctype="multipart/form-data">
                            @csrf   
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h1 class="mt-5">Liên Hệ</h1>
                            <p>Hãy điền vào biểu mẫu bên dưới để liên hệ với chúng tôi:</p>
                            <div class="form-group">
                                <label >Tên của bạn:</label>
                                <input  class="form-control" value="{{$contact->name}}" name="name">
                            </div>
                            <div class="form-group">
                                <label >Email:</label>
                                <input  class="form-control" value="{{$contact->email}}" name="email">
                            </div>
                            <div class="form-group">
                                <label >Message:</label>
                                <input type="text" class="form-control" value="{{$contact->message}}" name="message">
                            </div>
                            
                            
                            
                            <div class="form-group">
                                <label >Subject</label>
                                <input class="form-control" value="{{$contact->subject}}" name="subject">
                                <!-- <textarea class="form-control" id="tinhnang" name="tinhnang" rows="4" ></textarea> -->
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" name="status" type="radio"  id="inlineRadio1" value="0" {{$contact->status=='0'?"checked":""}}>
                            <label class="form-check-label" for="inlineRadio1"> <span class="badge badge-info">đã liên hệ </span></label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="status" type="radio"  id="inlineRadio2" value="1" {{$contact->status=='1'?"checked":""}}>
                            <label class="form-check-label" for="inlineRadio2">
                              <span class="badge badge-warning">chưa liên hệ</span>


                            </label>
                          </div>
                           
                            
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->

                
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection