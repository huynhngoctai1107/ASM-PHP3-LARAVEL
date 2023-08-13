<section class="intro p-0 ">
    <div class="bg-image " style="background-color: #f5f7fa;">
        <div class="mask d-flex align-items-center ">
            <div class="container p-0 m-0">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
                                    style="position: relative; height: auto">
                                    <table class="table table-striped mb-0">
                                        <thead style="background-image: linear-gradient(144deg, #AF40FF, #5B42F3 50%, #00DDEB); border: none; border-radius: 0; z-index:100;">
                                            <tr>
                                                <th class="text-center align-items-center" scope="col">Số điện thoại</th>
                                                 <th class="text-center align-items-center" scope="col">Tổng giá tiền</th>
                                              
                                                <th class="text-center align-items-center" scope="col">Thanh toán</th>
                                                <th class="text-center align-items-center" scope="col">Trạng thái đơn hàng</th>
                                                <th class="text-center align-items-center" scope="col">Nhiệp vụ</th>
                                                <th class="text-center align-items-center" scope="col">Xuất hóa đơn điện tử</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="mx-1">
                                      
                                       
                                            @foreach($oder as $item)
                                            <tr>
                                                <td class="text-center">{{$item->phone_order}}</td>
                                                <td class="text-center text-danger"><strong>{{number_format($item->total_money)}} VND</strong></td>
                                              
                                                <td class="text-center">@if($item->pay==4)Thanh toán khi nhận hàng @else Đã thanh toán @endif</td>
                                                <td class="text-center text-danger">@if($item->status == 0 ) Chờ xác nhận đơn hàng @elseif($item->status == 1) Đang vận chuyển @elseif($item->status == 2) Đang giao hàng @elseif($item->status == 3) Giao hàng thành công @else Đơn hàng này đã bị hủy @endif</td>
                                                
                                                 <td class="text-center"> @if($item->pay==4 && $item->status == 0 ) <a class="button-3" href="/delete-order/{{$item->id_user}}/{{$item->id}}">Xóa đơn hàng</a> @endif</td>
                                              
                                                 <td class="text-center"> <a class="button-3" href="/download-order-pdf/{{$item->id_user}}/{{$item->id}}"> <i class="bi bi-file-earmark-arrow-down-fill"></i></a></td>
                                                <td class="text-center"><a href="/detail-order/{{$item->id_user}}/{{$item->id}}"> <span class="text-success">Xem chi tiết đơn
                                                        hàng</span></td></a>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 