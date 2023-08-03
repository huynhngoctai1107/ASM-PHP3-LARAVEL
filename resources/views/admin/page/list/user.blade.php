@extends('admin.index')

@section('title')
Danh sách người dùng
@endsection
@section('link')
    <link rel="stylesheet" href="{{ asset('css/addproduct.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
@endsection

@section('main')
    <div class="content-wrapper  bg-white mt-5">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <button class="button-64 mb-4" role="button"><a  class="text text-white" href="/admin/add-user">Thêm tài khoản</a></button>

                <div class="row">
                    <div class="col-12">


                        <div class="card">
                            <div class="card-header bg">
                                <h3 class="card-title text-white">Danh sách tài khoản</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                    @if (session()->has('delete-user'))
                                        <div class="alert alert-success" role="alert">{{session('delete-user')}}</div>
                                    @endif

                                    @if (session()->has('error-delete-user'))
                                        <div class="alert alert-danger" role="alert">{{session('error-delete-user')}}</div>
                                    @endif
                                    @if (session()->has('edit-user'))
                                        <div class="alert alert-success" role="alert">{{session('edit-user')}}</div>
                                    @endif




                                <table class="table table-bordered table-hover">
                                    <thead>
                                      <tr>
                                        
                                        <th class="text-center">Email</th>


                                        <th class="text-center">Nghiệp vụ</th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($data['getUsers'] as $item)



                                      <tr data-widget="expandable-table" aria-expanded="false">
                                       
                                       
                                        <td class="text-center"> {{$item->email}}
                                        </td>

                                        <td class="text-center"> <a href="/admin/edit-user/ {{$item->id}}"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="30px" height="30px"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg>|<a href="/admin/delete-user/ {{$item->id}}"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="30px" height="30px" fill="currentColor"
                                                        class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                    </svg></a>
                                            </a>
                                        </td>
                                      </tr>
                                      <tr class="expandable-body">
                                        <td colspan="8" class="col-12" style="padding-left: 20px !important; padding-top: 20px !important">

                                            <h6 class="text-uppercase font-weight-bold">Hình ảnh: <span class="text-black  font-weight-normal  text-capitalize">
                                                    @if($item->img)
                                                        @php
                                                            $url = $data['urlImg'].''.$item->img;
                                                        @endphp
                                                             @if($item->social==0)
                                                                <img width="100" src='{{"$url"}}' alt="hình ảnh user">
                                                            @else
                                                                             @if(@is_array(getimagesize($item->img)))

                                                                                <img width="100"
                                                                                     src="{{$item->img}}"
                                                                                     alt="hình ảnh user">
                                                                                 @else
                                                                                <img width="100" src='{{asset("$url")}}' alt="hình ảnh user">

                                                                                 @endif

                                                            @endif
                                                    @else
                                                        Không có hình ảnh
                                                    @endif
                                                   </span></h6>
                                                    </span></h6>
                                            <h6 class="text-uppercase font-weight-bold">Họ và tên: <span class=" font-weight-normal  text-capitalize text-black">{{$item->name}}</span></h6>
                                            <h6 class="text-uppercase font-weight-bold">Số điện thoại: <span class="text-black font-weight-normal  text-capitalize">{{$item->phone ?? 'Không có'}}</span></h6>
                                            <h6 class="text-uppercase font-weight-bold">Loại tài khoản: <span class="text-black font-weight-normal  text-capitalize">  @if($item->social==0)
                                                        Tài khoản hệ thống
                                                    @else
                                                        Tài khoản Google
                                                    @endif</span></h6>
                                            <h6 class="text-uppercase font-weight-bold">Tổng số đơn hàng đặt: <span class="text-black font-weight-normal  text-capitalize">

                                                    @foreach($data['numberOderUser'] as $number)
                                                        @if($number->id_user == $item->id)
                                                                {{$number->number_user }}
                                                        @else
                                                            Chưa đặt hàng
                                                        @endif
                                                    @endforeach

                                                </span></h6>
                                            <h6 class="text-uppercase font-weight-bold">Cấp bậc: <span class=" font-weight-normal  text-capitalize text-danger">
                                                    @if($item->level==2)
                                                    Quản trị tối cao
                                                    @elseif($item->level==1)
                                                    Biên tập viên
                                                        @else
                                                    Khách hàng
                                                    @endif</span></h6>
                                            <h6 class="text-uppercase font-weight-bold">Năm sinh: <span class=" font-weight-normal  text-capitalize text-black">{{$item->birthday}}</span></h6>
                                            <h6 class="text-uppercase font-weight-bold">Giới tính: <span class=" font-weight-normal  text-capitalize text-black">{{$item->gender}}</span></h6>
                                            <h6 class="text-uppercase font-weight-bold">Trạng thái:
                                                    @if($item->status==1)
                                                    <span class=" font-weight-normal  text-capitalize text-success"> Đang hoạt động</span>
                                                        @else
                                                    <span class=" font-weight-normal  text-capitalize text-success">  Không hoạt động</span>
                                                        @endif
                                                 </h6>
                                          </p>
                                        </td>
                                      </tr>

                                      @endforeach

                                    </tbody>
                                  </table>

                                <div class="col-12 text-right">
                                    <div class="pagination mt-4 ">
                                        <div class="row ">
                                            {{$data['getUsers']->render("pagination::semantic-ui") }}
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    {{-- <script src="{{ asset('dist/js/showhiden.js') }}"></script> --}}

@endsection
