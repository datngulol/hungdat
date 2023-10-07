@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Liên hệ 
                            
                        </h1>
                    </div>
                     @if (session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Subject</th>
                                <th>Tình trạng </th>
                                <th>Edit</th>
                                <th>Delete</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contact as $us)
                            <tr class="odd gradeX" align="center">
                                <td>{{$us->id}}</td>
                                <td>{{$us->name}}</td>
                                
                              
                                <td>{{$us->email}}</td>
                                <td>{{$us->message}}</td>
                                <td>{{$us->subject}}</td>
                                <td>
                                    @if ($us->status==0) {{'Đã liên hệ '}}
                                    @else {{'Chưa liên hệ '}}
                                    @endif
                                </td>
                                
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/contact/edit/{{$us->id}}">Edit</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có chắc muốn xóa ?');" href="admin/contact/delete/{{$us->id}}"> Delete</a></td> 
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection