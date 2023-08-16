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
                                @if (session()->has('order'))
                                <div class="alert alert-success" role="alert">{{session('order')}}</div>
                            @endif
                            @if (session()->has('order-error'))
                            <div class="alert alert-danger" role="alert">{{session('order-error')}}</div>
                             @endif
                             @if (session()->has('error-delete-user'))
                             <div class="alert alert-danger" role="alert">{{session('error-delete-user')}}</div>
                            @endif
                            
                                <table class="table table-bordered table-hover">
                                    <thead>
                                      <tr>
                                        <th class="text-center">Tên khách hàng</th>
                                        <th class="text-center">Số điện thoại khách hàng</th>
                                        <th class="text-center">Giá tiền sản phẩm</th>
                                        <th class="text-center">Nhiệp vụ</th>
                                      </tr>
                                    </thead>
    
                                    <tbody>
                                        @foreach($order as $item)
                                      <tr data-widget="expandable-table" aria-expanded="false"  style=" @if($item->status == 4 ) background-color: #FCAEAE ; color:white !important @endif"> <a href="/admin/edit-order/{{$item->id}}">
                                       
                                        <td class="text-center"> {{$item->fullname}}
                                        </td>
                                        <td class="text-center"> {{$item->phone_order}}
                                        </td>

                                        <td class="text-center"><strong class="text-danger"  style=" @if($item->status == 4 )  color:white !important @endif">{{number_format($item->total_money)}} VND</strong>
                                        </td>
                                        @if($item->status ==4)
                                        <td></td>
                                        @else
                                      
                                        <td class="text-center" ><a href="/admin/edit-order/{{$item->id}}"><svg 
                                                    xmlns="http://www.w3.org/2000/svg" width="30px" height="30px"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></a>|<a href="/admin/delete-order/{{$item->id}}"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="30px" height="30px" fill="currentColor"
                                                        class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                    </svg></a>
                                            </a>
                                        </td>
                                        @endif
                                      </tr>
                                      <tr class="expandable-body">
                                        <td colspan="8" class="col-12" style="padding-left: 20px !important; padding-top: 20px !important;">

                                            <h6 class="text-uppercase font-weight-bold">Thanh toán: <span class="text-green font-weight-normal  text-capitalize">@if($item->pay==4)Thanh toán khi nhận hàng @else Đã thanh toán @endif</span></h6>
                                            <h6 class="text-uppercase font-weight-bold">Địa chỉ: <span class=" font-weight-normal  text-capitalize">{{$item->address}}</span></h6>
                                            <h6 class="text-uppercase font-weight-bold">Số điện thoại: <span class="text-black font-weight-normal  text-capitalize">{{$item->phone_order}}</span></h6>
                                             <h6 class="text-uppercase font-weight-bold">Ngày đặt hàng: <span class=" font-weight-normal  text-capitalize text-black">{{date('d-m-Y',strtotime($item->date_oder))}}</span></h6>
                                            <h6 class="text-uppercase font-weight-bold">Trạng thái: <span class=" font-weight-normal  text-capitalize text-success">@if($item->status == 0 ) Chờ xác nhận đơn hàng @elseif($item->status == 1) Đang vận chuyển @elseif($item->status == 2) Đang giao hàng @elseif($item->status == 3) Giao hàng thành công @else Đơn hàng này đã bị hủy @endif</span></h6>
                                            <h6 class="text-uppercase font-weight-bold">Thông tin chi tiết: <a href="/admin/chi-tiet-hoa-don/{{$item->id}}" class=" font-weight-normal  text-capitalize text-red">Xem tại đây !</a></h6>

                                          </p>
                                        </td>
                                      </tr>

                                      @endforeach

                                    </tbody>
                                  </table>

                                <div class="col-12 text-right">
                                    <div class="pagination mt-4 ">
                                        <div class="row ">
                                            {{ $order->render("pagination::semantic-ui") }}
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
