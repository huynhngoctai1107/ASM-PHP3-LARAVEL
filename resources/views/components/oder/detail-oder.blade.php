
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
                                              
                                                <td class="text-center text-success"><a class=" text-success" href="/xem-chi-tiet-san-pham/{{$item->id_product}}">Xem chi tiết sản phẩm</a></td>
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
 