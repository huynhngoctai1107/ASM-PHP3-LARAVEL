@extends('admin.index')

@section('title')
Chi tiết sản phẩm
@endsection
@section('link')
    <link rel="stylesheet" href="{{ asset('css/addproduct.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
@endsection

@section('main')
    <div class="content-wrapper mt-5">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">


                        <div class="card">
                            <div class="card-header bg">
                                <h3 class="card-title text-white">Chi tiết hóa đơn</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
               
                             
                                <table class="table table-bordered table-hover">
                                    <thead>
                                      <tr>
                                        <th class="text-center"></th>
                                        <th class="text-center">Id hóa đơn</th>
                                        <th class="text-center">Tên sản phẩm</th>
                                        <th class="text-center">Số lượng</th>
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
                                        <td class="text-center">Rau Tần Ô
                                        </td>
                                        <td class="text-center">2
                                        </td>                           
                                      </tr>
                                      <tr class="expandable-body">
                                        <td colspan="8" class="col-12" style="padding-left: 20px !important; padding-top: 20px !important">
                                            
                                           
                                          
                                            <h6 class="text-uppercase font-weight-bold">Giá tiền: <span class=" font-weight-normal  text-capitalize text-red">500.000 VND</span></h6>
                                             

                                          </p>
                                        </td>
                                      </tr>
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
                                        <td class="text-center">Rau Xà Lách
                                        </td>
                                        <td class="text-center">3
                                        </td>                           
                                      </tr>
                                      <tr class="expandable-body">
                                        <td colspan="8" class="col-12" style="padding-left: 20px !important; padding-top: 20px !important">
                                            
                                           
                                          
                                            <h6 class="text-uppercase font-weight-bold">Giá tiền: <span class=" font-weight-normal  text-capitalize text-red">200.000 VND</span></h6>
                                             

                                          </p>
                                        </td>
                                      </tr>
                                      
                                  
                                    </tbody>
                                  </table>
                              
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
