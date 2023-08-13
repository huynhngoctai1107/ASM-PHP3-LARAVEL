 
  <section class="h-100 gradient-custom col-12">
    
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-12 p-0">
          <div class="card">
            <div class="card-header px-4 py-5">
              <h5 class="text-muted mb-0">Cảm ơn bạn đã đặt hàng, <span style="color: #a8729a;">{{$oder[0]->fullname}}</span>!</h5>
            </div>
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="lead fw-normal mb-0" style="color: #a8729a;">Chi tiết hóa đơn</p>
                <p class="small text-muted mb-0">Mã đơn hàng : TH{{$oder[0]->id}}</p>
              </div>
              @foreach($oder as $item)
              <div class="card shadow-0 border mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-2 justify-content-center align-items-center d-flex">
                        @foreach($product['value'] as $img)
                        @if($item->id_product ==$img->id_product)
                        @php
                        $imgProduct = explode(',', $img->img)
                        @endphp
                        @for($i=0 ; $i <count( $imgProduct); $i++)
                        @php
                        $url = $product['urlImg'].''.$imgProduct[$i];
                        @endphp
                        <img   class="img-fluid"  src='{{asset("$url")}}' alt="{{$img}}" >
                        @break
                        @endfor
                        @endif
                    @endforeach
                      
                    </div>
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0">{{$item->name}}</p>
                    </div>
                    
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0 small">Số lượng: {{$item->quantity}}</p>
                    </div>
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0 small"> {{number_format($item->price)}} VND</p>
                    </div>
                    <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
                        <p class="text-muted mb-0 small"><a class=" text-success" href="/xem-chi-tiet-san-pham/{{$item->slug}}">Xem chi tiết sản phẩm</a></p>
                      </div>
                  </div>
                  
                </div>
              </div>
             @endforeach
              <div class="d-flex justify-content-between pt-2">
                <p class="fw-bold mb-0">Thông tin chi tiết</p>
                
              </div>
              <div class="d-flex justify-content-between pt-3">
                <p class="text-muted mb-0">Địa chỉ email: {{$oder[0]->email ?? 'Đang cập nhật'}}</p>
                <p class="text-muted mb-0"><span class="fw-bold me-2">Tổng đơn hàng: </span> {{number_format($item->total_money)}} VND</p>
              </div>
              <div class="d-flex justify-content-between pt-2">
                <p class="text-muted mb-0">Số điện thoại đặt hàng: <span class="text-yellow" style="color:rgb(184, 184, 78) !important"> {{$oder[0]->phone_order ?? 'Đang cập nhật'}}</span></p>
                <p class="text-muted mb-0"><span class="fw-bold me-2">Giảm giá</span> 0 VND</p>
              </div>
  
              <div class="d-flex justify-content-between pt-2">
                <p class="text-muted mb-0">Địa chỉ giao hàng: {{$oder[0]->address ?? 'Đang cập nhật'}}</p>          

                <p class="text-muted mb-0"><span class="fw-bold me-2">Thuế VAT</span> 0%</p> 
              </div>
              <div class="d-flex justify-content-between pt-2">
                <p class="text-muted mb-0">Ngày đặt hàng: {{date('d-m-Y',strtotime($oder[0]->date_oder))}}</p>

                <p class="text-muted mb-0"><span class="fw-bold me-2">Phí giao hàng</span><b  style="color: green">Miễn phí</b></p>

              </div>
              <div class="d-flex justify-content-between pt-2">
                <p class="text-muted mb-0">Dự kiến giao hàng: <span style="color: green">{{date("d-m-Y", strtotime('+ 4 day' , strtotime($oder[0]->date_oder)))}}</span></p>

                  <p class="text-muted mb-0"><span class="fw-bold me-2">Phương thức thanh toán</span><b  style="color: green">@if($item->pay==2 )Visa @elseif($item->pay==1)Paypal @elseif($item->pay==3)MoMo @else Thanh toán khi nhận hàng @endif</b></p>

              </div>
  
              <div class="d-flex justify-content-between mb-5 pt-2">
               <p></p>
                             <p class="text-muted mb-0"><span class="fw-bold me-2">Trạng thái thanh toán: </span> <span style="color: brown; font-weight: 600">@if($item->pay==4)Chưa thanh toán @else Đã thanh toán @endif</span></p>
                </div>
                
            
            </div>
            <div class="card-footer border-0 px-4 py-5 d-flex justify-content-center align-items-center"
              style="background-color: #007bff !important; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
              <h5 class="d-flex align-items-center justify-content-center text-white text-uppercase mb-0">Tổng tiền sản phẩm: <span class="h2 mb-0 ms-2 text-white"> {{number_format($item->total_money)}} VND</span></h5>
            </div>
          </div>
        </div>
      </div>
 
  </section>    

  <style>
 
  </style>