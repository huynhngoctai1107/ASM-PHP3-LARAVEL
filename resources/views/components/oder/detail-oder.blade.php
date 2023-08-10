{{-- 
<section class="intro border-0 p-0 ">
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
                                        <thead style="    background-image: linear-gradient(144deg, #AF40FF, #5B42F3 50%, #00DDEB); border: none; border-radius: 0; z-index:100;">
                                            <tr>
                                                <th class="text-center align-items-center" scope="col">Tên sản phẩm</th>
                                                 <th class="text-center align-items-center" scope="col">Hình ảnh</th>
                                                 <th class="text-center align-items-center" scope="col">Số lượng</th>
                                                <th class="text-center align-items-center" scope="col">Giá</th>
                               
                                                <th class="text-center align-items-center" scope="col"></th>
                                                
                                            </tr>
                                        </thead>
                                 
                                        <tbody class="mx-1">
                                          
                                            @foreach($oder as $item)
                                            <tr class="p-0">
                                                <td class="text-center"> {{$item->name ??''}}</td>
                                                <td class="text-center">  
                                                    @foreach($product['value'] as $img)
                                                            @if($item->id_product ==$img->id_product)
                                                            @php
                                                            $imgProduct = explode(',', $img->img)
                                                            @endphp
                                                            @for($i=0 ; $i <count( $imgProduct); $i++)
                                                            @php
                                                            $url = $product['urlImg'].''.$imgProduct[$i];
                                                            @endphp
                                                            <img   class="img-fluid w-100 " src='{{asset("$url")}}' alt="{{$img}}" style="height: 100px !important">
                                                            @break
                                                            @endfor
                                                            @endif
                                                    @endforeach
                                                </td>
                                                    <td class="text-center "><strong> {{$item->quantity}} </strong></td>
                                                <td class="text-center text-danger"><strong> {{number_format($item->price)}} VND</strong></td>
                                              
                                                <td class="text-center text-success"><a class=" text-success" href="/xem-chi-tiet-san-pham/{{$item->slug}}">Xem chi tiết sản phẩm</a></td>
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
  --}}

 
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
                    <div class="col-md-2">
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
                <p class="text-muted mb-0"><span class="fw-bold me-4">Total</span> $898.00</p>
              </div>

              <div class="d-flex justify-content-between pt-2">
                <p class="text-muted mb-0">Số điện thoại đặt hàng : <span class="text-yellow" style="color:rgb(184, 184, 78) !important"> {{$oder[0]->phone ?? 'Đang cập nhật'}}</span></p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">Discount</span> $19.00</p>
              </div>
  
              <div class="d-flex justify-content-between">
                <p class="text-muted mb-0">Ngày đặt hàng: {{date('d-m-Y',strtotime($oder[0]->date_oder))}}</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">GST 18%</span> 123</p>
              </div>
  
              <div class="d-flex justify-content-between mb-5">
                <p class="text-muted mb-0">Địa chỉ giao hàng: {{$oder[0]->address ?? 'Đang cập nhật'}}</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery Charges</span> Free</p>
              </div>
            </div>
            <div class="card-footer border-0 px-4 py-5"
              style="background-color: #a8729a; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
              <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
                paid: <span class="h2 mb-0 ms-2">$1040</span></h5>
            </div>
          </div>
        </div>
      </div>
 
  </section>    

  <style>
   .gradient-custom {
/* fallback for old browsers */
background: #cd9cf2;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to top left, rgba(205, 156, 242, 1), rgba(246, 243, 255, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to top left, rgba(205, 156, 242, 1), rgba(246, 243, 255, 1))
}
  </style>