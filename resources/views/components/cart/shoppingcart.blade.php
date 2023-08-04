@if (session()->has('cart'))
 <script>
 
  
 alert("{{session('cart')}}")
 </script>
@endif
<section class="h-100 gradient-custom mt-5">
  <div class="container py-5">
    <div class="row d-flex justify-content-center my-4">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header py-3">
            
            <h5 class="mb-0">Giỏ hàng - <strong>{{$number}}</strong> sản phẩm</h5>
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
                <!-- Image -->
              </div>

              <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                <!-- Data -->
                <p><strong>{{$item->name}}</strong></p>
              
                <a href="/delete-cart/{{$item->id}}" type="button" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
                  title="Remove item">
                  <i class="fas fa-trash text-white"></i>
                </a>
                <a type="button" class="btn btn-danger btn-sm mb-2" data-mdb-toggle="tooltip"
                  title="Move to the wish list">
                  <i class="fas fa-heart text-white"></i>
                </a>
                <!-- Data -->
              </div>
              

              <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <!-- Quantity -->
                <form action="/add-cart/{{$item->id_product}}" method="post">
                  @csrf
                <div class="d-flex mb-4" style="max-width: 300px">
                  <button class="btn btn-primary px-3 me-2" style="height: 50px"
                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                    <i class="fas fa-minus"></i>
                  </button>

                  <div class="form-outline">
                    <input id="form1" min="0" name="quantityUpdate" value="{{$item->quantity}}" type="number" class="form-control" />
                    <label class="form-label" for="form1">Số lượng</label>
                  </div>

                  <button class="btn btn-primary px-3 ms-2" style="height: 50px"
                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
                </form>
                <!-- Quantity -->

                <!-- Price -->
                <p class="text-start text-md-center">
                  <strong>{{number_format($item->price)}} Đ</strong>
                </p>
                <!-- Price -->
              </div>
            </div>
            
            <!-- Single item -->

            <hr class="my-4" />
            @endforeach
            <!-- Single item -->
           
            <!-- Single item -->
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
            <p><strong>We accept</strong></p>
            <img class="me-2" width="45px"
              src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
              alt="Visa" />
            <img class="me-2" width="45px"
              src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
              alt="American Express" />
            <img class="me-2" width="45px"
              src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
              alt="Mastercard" />
            
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Tổng đơn hàng</h5>
          </div>
          <div class="card-body">
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

            <button type="button" class="btn btn-primary btn-lg btn-block">
              Thanh toán ngay 
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>