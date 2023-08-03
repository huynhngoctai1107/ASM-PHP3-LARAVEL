@extends('admin.index')

@section('title')
Danh sách đơn hàng
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
                <div class="row">
                    <div class="col-12">


                        <div class="card">
                            <div class="card-header bg">
                                <h3 class="card-title text-white">Danh sách đơn hàng</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">


                                <table class="table table-bordered table-hover">
                                    <thead>
                                      <tr>
                                        <th class="text-center"></th>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Email khách hàng</th>


                                        <th class="text-center">Nhiệp vụ</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr data-widget="expandable-table" aria-expanded="false">
                                        <td class="">
                                            <svg onclick="showhiden()" xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                style="margin-left: 20px" fill="currentColor"
                                                class="bi bi-plus-circle-fill" viewBox="0 0 16 16 ">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                            </svg>
                                        </td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">htai67934@gmail.com
                                        </td>

                                        <td class="text-center"> <a href=""><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="30px" height="30px"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg>|<a href=""><svg xmlns="http://www.w3.org/2000/svg"
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

                                            <h6 class="text-uppercase font-weight-bold">Thanh toán: <span class="text-black font-weight-normal  text-capitalize">Thanh toán khi nhận hàng</span></h6>
                                            <h6 class="text-uppercase font-weight-bold">Địa chỉ: <span class=" font-weight-normal  text-capitalize">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora culpa quas beatae commodi eos nulla, soluta officia qui architecto praesentium! Provident est nostrum corporis tempore nam. Voluptatibus porro earum nisi?</span></h6>
                                            <h6 class="text-uppercase font-weight-bold">Số điện thoại: <span class="text-black font-weight-normal  text-capitalize">0949615859</span></h6>
                                            <h6 class="text-uppercase font-weight-bold">Tổng tiền: <span class=" font-weight-normal  text-capitalize text-red">500.000 VND</span></h6>
                                            <h6 class="text-uppercase font-weight-bold">Ngày đặt hàng: <span class=" font-weight-normal  text-capitalize text-black">11/07/2003</span></h6>
                                            <h6 class="text-uppercase font-weight-bold">Trạng thái: <span class=" font-weight-normal  text-capitalize text-success">Đang xử lí</span></h6>
                                            <h6 class="text-uppercase font-weight-bold">Thông tin chi tiết: <a href="/admin/bill/1" class=" font-weight-normal  text-capitalize text-red">Xem tại đây !</a></h6>

                                          </p>
                                        </td>
                                      </tr>



                                    </tbody>
                                  </table>

                                <div class="col-12 text-right">
                                    <div class="pagination mt-4 ">
                                        <a href="#">&laquo;</a>
                                        <a href="#">1</a>
                                        <a class="active" href="#">2</a>
                                        <a href="#">3</a>
                                        <a href="#">4</a>
                                        <a href="#">5</a>
                                        <a href="#">6</a>
                                        <a href="#">&raquo;</a>
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
