 
<section class="h-100 gradient-custom mt-5">
  <div class="container py-5">
    <div class="row d-flex justify-content-center my-4">
      <div class="col-md-7">
        <div class="card mb-4">
          <div class="card-header py-3">
            
            <h5 class="mb-0">Hóa đơn - <strong>{{$number}}</strong> sản phẩm</h5>
          </div>
          <div class="card-body">
            <!-- Single item -->
            @foreach($product as $item )
            <div class="row">
              <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                <!-- Image -->
                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                  <img width="150" height="150" src='{{asset("img/products/$item->images")}}'
                    class="w-100" alt="Blue Jeans Jacket" />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                  </a>
                </div>
           
              </div>

              <div class="col-lg-5 col-md-6 mb-4 mb-lg-0 d-flex align-items-center justify-content-center">
                <!-- Data -->
                <p><strong>{{$item->name}}</strong></p>
              
              </div>
              
              <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 d-flex align-items-center justify-content-center">
              
                <p class="text-start text-md-center">
                  <strong class="me-3">SL: {{$item->quantity}} </strong>
                
                    <strong>Giá: {{number_format($item->price)}} Đ</strong>
             
                </p>
              </div>
            </div>
 

            <hr class="my-4" />
            @endforeach
            
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-body">
            <p><strong>Giao hàng dự kiến</strong></p>
            <p class="mb-0">Ngày: {{date('d-m-Y', strtotime('+3 days'))}} </p>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body">
            <p><strong>Chúng tôi đồng ý</strong></p>
            <img class="me-2" width="45px"
              src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
              alt="Visa" />
            <img class="me-2" width="45px"
              src="https://wiki.soulcams.com/images/9/9a/Paypal-logo.png"
              alt="American Express" />
            
              <img class="me-2" width="30px"
              src="https://upload.wikimedia.org/wikipedia/vi/f/fe/MoMo_Logo.png"
              alt="American Express" />
              <img class="me-2" width="25px"
              src="https://cdn-icons-png.flaticon.com/128/814/814245.png"
              alt="American Express" />
          </div>
        </div>
      </div>
      <div class="col-md-5">
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">{{ $error }}</div>
        @endforeach
        <div class="card mb-4">
         
            <div class="card-header py-3">
                <h5 class="mb-0">Thông tin khách hàng</h5>
              </div>
              <div class="card-body">
                @php 
                    $user = Auth::user() ;
                @endphp
             
                @foreach($product as $item)
                
                <form action="/pay/{{$item->id_user}}/{{$item->token}}" method="post">  
                @endforeach  
                  @csrf
 
                    <div class="form-outline mb-4">
                      <input type="text" id="form6Example3" name="name"  value="{{old('name')}}"class="form-control" />
                      <label class="form-label" for="form6Example3">Tên khách hàng</label>
                    </div>
                    <div class="form-outline mb-4">
                      <fieldset disabled>
                        <input type="text"  id="form6Example3"  name="email" value="{{$user->email}}" class="form-control" />
                        <label class="form-label" for="form6Example3">Email</label>
                      </fieldset>
                      <input type="hidden"  id="form6Example3"  name="email" value="{{$user->email}}" class="form-control" />

                      </div>
                    <!-- Text input -->
                    <div class="form-outline mb-4">
                      <input type="text" id="form6Example4" name="address" value="{{old('address')}}"  class="form-control" />
                      <label class="form-label" for="form6Example4">Địa chỉ nhận hàng</label>
                    </div>
                  
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                      <input type="te" id="form6Example5" name="phone" value="{{old('phone')}}" class="form-control" />
                      <label class="form-label" for="form6Example5">Số điện thoại</label>
                    </div>
 
                    <div class="form-outline mb-4">
                      <textarea class="form-control rounded-0" id="form6Example7"  name="note" rows="4">{{old('note')}}</textarea>
                      <label class="form-label" for="form6Example7">Ghi chú khi nhận hàng</label>
                    </div>
 
              </div>

            </div>
            <div class="card mb-4">
              <div class="card-header py-3">
                <h5 class="mb-0">Tổng đơn hàng</h5>
              </div>
              <div class="card-body">
                <div class="d-flex pb-3 justify-content-center">
                  <div class="  ms-4 d-flex align-items-center ">
                    <input class="form-check-input " class="checked"  value="1" {{old('pay')==1 ? 'checked':''}} type="radio" name="pay" id="radioNoLabel1"
                      value="" aria-label="..."   />
                  </div>
                  <label class="form-check-label col-12" for="radioNoLabel1">
                    <div class="rounded border d-flex w-100 p-3 align-items-center">
                    <p class="mb-0">
              
                      <img class="me-2" width="35px"
                      src="https://cdn-icons-png.flaticon.com/128/888/888870.png"
                      alt="American Express" /></i> Thanh toán Paypal
                    
                    </p>
                   </div>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <div class=" ms-4 d-flex align-items-center ">
                    <input class="form-check-input" type="radio" value="2" {{old('pay')==2 ? 'checked':''}} name="pay" id="radioNoLabel2"
                      value="" aria-label="..." />
                   
                  </div>
                  <label class="form-check-label col-12" for="radioNoLabel2">
                    <div class="rounded border d-flex w-100 p-3 align-items-center">
                      <p class="mb-0">
                        <img class="me-2" width="35px"
                        src="https://cdn-icons-png.flaticon.com/128/10605/10605892.png"
                        alt="American Express" />
                        
                       Thanh toán  qua Visa
                      </p>
                     </div>
                  </label>
                 
                </div>
                <div class="d-flex my-3 justify-content-center">
                  <div class="  ms-4 d-flex align-items-center ">
                    <input class="form-check-input " class="checked" value="3" {{old('pay')==3 ? 'checked':''}} type="radio" name="pay" id="radioNoLabel3"
                      value="" aria-label="..."  />
                  </div>
                  <label class="form-check-label col-12" for="radioNoLabel3">
                    <div class="rounded border d-flex w-100 p-3 align-items-center">
                    <p class="mb-0">
                      <img class="me-2" width="35px"
                      src="https://upload.wikimedia.org/wikipedia/vi/f/fe/MoMo_Logo.png"
                      alt="American Express" />
                      Thanh toán qua MoMo
                    
                    </p>
                   </div>
                  </label>
                </div>
                <div class="d-flex my-3 justify-content-center">
                  <div class="  ms-4 d-flex align-items-center ">
                    <input class="form-check-input " class="checked" value="4" {{old('pay')==4 ? 'checked':''}} type="radio" name="pay" id="radioNoLabel4"
                      value="" aria-label="..."  />
                  </div>
                  <label class="form-check-label col-12" for="radioNoLabel4">
                    <div class="rounded border d-flex w-100 p-3 align-items-center">
                    <p class="mb-0">
                      <img class="me-2" width="35px"
                      src="https://cdn-icons-png.flaticon.com/128/814/814245.png"
                      alt="American Express" />
                      Thanh toán khi nhận hàng
                    
                    </p>
                   </div>
                  </label>
                </div>
                
                <ul class="list-group list-group-flush">
                  <li
                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                    Các sản phẩm
                    <span><strong>{{number_format($total)}} VND</strong></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                    Giao hàng
                    <span>Miễn phí</span>
                  </li>
                  <li
                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                    <div>
                      <strong>Tổng đơn hàng</strong>
                      <strong>
                        <p class="mb-0">(Đã bao gồm thuê VAT)</p>
                      </strong>
                    </div>
                    <span><strong class="text-danger">{{number_format($total)}} VND</strong></span>
                  </li>
                </ul>
                  <input type="hidden" name="total" value="{{$total}}">
              <button type="submit" class="btn btn-primary btn-lg btn-block">
                Thanh toán
              </button>
          </form>
        
          </div>
        </div>
        
      </div>
    </div>
  </div>
</section>