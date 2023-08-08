@if (session()->has('cart'))
 <script>
 alert("{{session('cart')}}")
 </script>
@endif
    <div class="container mt-5" style="margin-top: 150px !important">
        @if($category=="product")
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Sản phẩm của chúng tôi</h1>
                 </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                    <li class="nav-item m-2">
                        @php
                            $link = str_replace(url('/'), '', url()->previous());

                           if($link == '/index'){
                               $url = 'index';
                           }else{
                               $url = 'product';
                           }
                        @endphp
                        <a class="btn btn-outline-primary border-2 active"  href="/{{$url}}">Tất cả sản phẩm</a>
                    </li>
                    @foreach($product['categoryProduct'] as $category)
                    <li class="nav-item m-2">
                        <a class="btn btn-outline-primary border-2 active"  href="/product/danh-muc/{{$category->slug}}">{{$category->name}}</a>
                    </li>
                        @endforeach

                </ul>
            </div>
        </div>
        @else
            <div class="container-fluid bg-light bg-icon ">
                <div class="container">
                    <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Sản phẩm cùng loại</h1>
                    </div>

                </div>
            </div>

        @endif




        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">


                    @foreach($product['product'] as $item)
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                @foreach($product['img'] as $img)
                                @if($item->id_product ==$img->id_product)
                                @php
                                $imgProduct = explode(',', $img->img)
                                @endphp
                                  @for($i=0 ; $i <count( $imgProduct); $i++)
                                @php
                                $url = $product['urlImg'].''.$imgProduct[$i];
                                @endphp
                                <img   class="img-fluid w-100 "src='{{asset("$url")}}' alt="{{$img}}" style="height: 280px !important">
                                @break
                                @endfor
                                @endif
                                @endforeach

                                <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                            </div>
                            <div class="text-center p-4">
                                <a class="d-block h5 mb-2" href="/xem-chi-tiet-san-pham/{!!$item->id_product!!}" style="
                                display:inline-block;
                                white-space: nowrap;
                                overflow: hidden;
                                text-overflow: ellipsis;
                                max-width: 30ch;">{{$item->nameproduct}}</a>
                                <span class="text-primary me-1">{{number_format($item->price)}} VND</span>
                                @php
                                $price  = $item->price + 32000
                                @endphp
                                <span class="text-body text-decoration-line-through">{{number_format( $price)}}</span>
                            </div>
                            <div class="d-flex border-top">
                                <small class="w-50 text-center border-end py-2">
                                    <a class="text-body" href="/xem-chi-tiet-san-pham/{{$item->id_product}}"><i class="fa fa-eye text-primary me-2"></i>Xem chi tiết</a>
                                </small>
                                <small class="w-50 text-center py-2">
                                    <a class="text-body" href="/add-cart/{{$item->id_product}}"><i class="fa fa-shopping-bag text-primary me-2"></i>Thêm vào giỏ hàng</a>
                                </small>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="/product">Xem chi tiết </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
