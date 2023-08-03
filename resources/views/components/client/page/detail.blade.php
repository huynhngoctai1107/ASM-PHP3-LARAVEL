<div class="container mt-5 mb-5" >

    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="row">


                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4">

                                    @php
                                    $slider = "active";
                                    $imgProduct = explode(',', $detail['images']->img )
                                    @endphp
                                <div id="slide" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                            @for($i=0 ; $i < count($imgProduct); $i ++)
                                            <button type="button" data-bs-target="#slide" data-bs-slide-to="{{$i}}" class="{{$slider}}"></button>
                                            @php
                                            $slider = '';
                                            @endphp
                                            @endfor
                                    </div>

                                    <div class="carousel-inner">
                                        @php
                                        $slider = 'active';
                                        @endphp
                                            @foreach($imgProduct as $img)
                                                @php
                                                    $url =$detail['urlImg'].''.$img;
                                                @endphp

                                                <div class="carousel-item {{$slider}}">
                                                    <img width="500" height="500" src='{{asset("$url")}}' alt="{{$img}}" class="d-block" style="">
                                                </div>
                                                @php
                                                $slider = '';
                                                @endphp
                                            @endforeach


                                    </div>

                                    <!-- Left and right controls/icons -->
                                    <button class="carousel-control-prev" type="button" data-bs-target="#slide" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#slide" data-bs-slide="next">
                                      <span class="carousel-control-next-icon"></span>
                                    </button>
                                  </div>
                                </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <span
                                        @php
                                            $link = str_replace(url('/'), '', url()->previous());

                                        @endphp
                                        class="ml-1"><a href="{{$link}}"> Back</a></span> </div> <i class="fa fa-shopping-cart text-muted"></i>
                            </div>
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">
                                       @php
                                           $slugCategory = explode(',',$detail['product']->slugcategory)
                                       @endphp
                                    @foreach($slugCategory as $slug)
                                        <a class="text-uppercase" href="/danh-muc/{{$slug}}"> {{$slug}}</a>
                                    @endforeach
                                </span>
                                <h5 class="text-uppercase mt-3">{{$detail['product']->nameproduct}}</h5>
                                <div class="price d-flex flex-row align-items-center"> <span
                                        class="act-price">{{number_format($detail['product']->price)}} VND</span>
                                    @php
                                        $price  = $detail['product']->price + 32000;
                                        $seo= ($price/ $detail['product']->price) * 10;
                                    @endphp
                                    <div class="ml-2"> <small class="dis-price">{{number_format($price)}} VND</small> <span class="ms-1">{{ number_format($seo, 0)}}% OFF</span>
                                    </div>
                                </div>
                            </div>
                            <h5>Nội dung sản phẩm</h5>
                            <p class="about">    {!!$detail['product']->content!!}</p>
                          
                        
                            <div class="d-flex mb-4" style="max-width: 300px">
                                <button class="btn btn-primary px-3 me-2 h-2" style="height: 50px"
                                  onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                  <i class="fas fa-minus"></i>
                                </button>
              
                                <div class="form-outline">
                                  <input id="form1" min="0" name="quantity" value="1" type="number" class="form-control" />
                                  <label class="form-label" for="form1">Số lượng</label>
                                </div>
              
                                <button class="btn btn-primary px-3 ms-2" style="height: 50px"
                                  onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                  <i class="fas fa-plus"></i>
                                </button>
                              </div>
                         
                            <div class="cart mt-3 align-items-center"> <button
                                    class="btn btn-danger text-uppercase mr-2 px-4">Thêm giỏ hàng</button> <i
                                    class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12 mt-4">
                    <h3>Mô tả sản phẩm</h3>
                    {!!$detail['product']->	describe!!}


                </div>

            </div>
        </div>
    </div>
</div>



