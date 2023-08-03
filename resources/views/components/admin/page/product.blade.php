<div class="content-wrapper">
    <section class="content ">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card card-primary">


                    <div class="card-header bg">

                        <h3 class="card-title ">
                            @if (!empty($check['page']))
                                Chỉnh sửa sản phẩm
                            @else
                                Thêm sản phẩm
                            @endif
                        </h3>
                    </div>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                    @endforeach
                    @if (session()->has('add-product'))
                        <div class="alert alert-success" role="alert">{{ session('add-product') }}</div>
                    @endif
                    <div class="card-body">

                        @if (!empty($check['page']))
                            <form class="col-12" method="post" action="/admin/edit-product/{{ $check['product']->id_product }}" enctype="multipart/form-data">
                            @else
                                <form action="/admin/add-product" method="post" class="col-12" enctype="multipart/form-data">
                        @endif
                        @csrf


                        <div class="row">
                            <div class="col-md-7 col-12 pt-2">

                                <div class="form-group bg-title">
                                    <label class="card-header bg-title col-12">Tên sản phẩm</label>
                                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                        <input
                                            value="@if (!empty($check['page'])) {{ $check['product']->nameproduct }} @else{{ old('nameProduct') }} @endif"
                                            type="text" class="form-control" data-target="#reservationdatetime"
                                            name="nameProduct" placeholder="Tên sản phẩm" />
                                    </div>
                                </div>


                                <div class="form-group bg-title">
                                    <div class="col-md-12 p-0">
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">Nội dung sản phẩm</h3>
                                            </div>
                                            <div class="card-body">
                                                <textarea id="compose-textarea"  name="content" class="form-control col-12" >@if (!empty($check['page'])){{ $check['product']->content }} @else{{ old('content') }}@endif</textarea>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                                <div class="form-group bg-title">
                                    <div class="col-md-12 p-0">
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">Mô tả sản phẩm</h3>
                                            </div>
                                            <div class="card-body">
                                                <textarea id="compose-textarea1" name="describe" class="form-control col-12" >@if (!empty($check['page'])){{ $check['product']->describe }} @else{{ old('describe') }}@endif</textarea>
                                            </div>
                                        </div>

                                    </div>


                                </div>

                                <div class="form-group bg-title">
                                    <label for="exampleFormControlTextarea1 "
                                        class="form-label card-header  col-12">Thêm hình ảnh</label>

                                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">

                                            @if (!empty($check['page']))

                                            @php
                                                $imgProduct = explode(',', $img = $check['images']->img)
                                            @endphp
                                            @foreach($imgProduct as $img)
                                                @php
                                                   $images[]= asset("img/products/$img");
                                                @endphp
                                             @endforeach

                                           @endif


                                        <input type='file' multiple
                                            value="@if(!empty($check['page'])){{$images[0]}}@else{{ old('uploadfile') }} @endif"
                                            name="uploadfile[]" id="imgInp" />
                                        <img width="100" id="blah" src="#" alt="your image" />

                                    </div>

                                </div>


                            </div>
                            <div class="col-md-5 pt-2 col-12 ">
                                <div class="form-group">
                                    <label class="card-header bg-title col-12">Chuyên mục sản phẩm</label>
                               @if (!empty($check['page']))
                                    <ul class="list-group">
                                        @foreach ($check['categoryProduct'] as $item)
                                        <li style="list-style-type: none !important" class="product-group-item px-3 border-0  " aria-current="true">
                                            @php
                                            $categories = explode(',', $check['product']->idcategory)
                                            @endphp
                                            <input type="checkbox" value="{{$item->id}}"@foreach($categories as $category)
                                            @if($category ==$item->id)
                                            checked

                                            @endif
                                        @endforeach   name="category[]">{{ $item->name }}


                                        </li>
                                     @endforeach



                                    </ul>
                                @else
                                <ul class="list-group">

                                        @foreach ($check['categoryProduct'] as $item)
                                            <li style="list-style-type: none !important" class="product-group-item px-3 border-0  " aria-current="true">

                                                <input type="checkbox" value="{{$item->id}}"@if(!empty(old('category'))) @foreach(old('category') as $checked)
                                                @if($checked ==$item->id)
                                                checked
                                                @endif
                                                @endforeach
                                            @endif
                                                    name="category[]">{{ $item->name }}
                                            </li>
                                        @endforeach



                                    </ul>

                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="card-header bg-title col-12">Giá sản phẩm</label>
                                    <div class="col-12">
                                        <input
                                            value="@if(!empty($check['page'])){{$check['product']->price}}@else{{old('price')}}@endif"
                                            class="input_date col-12 p-2" type="number" name="price"
                                            id="cost_of_sale" value="0">
                                    </div>

                                </div>
                                @if(!empty($check['page']))
                                <div class="form-group">
                                    <label class="card-header bg-title col-12">Ngày nhập</label>
                                    <div class="col-12">
                                        <input
                                            value="{{date('Y-m-d',strtotime($check['product']->date_input))}}"
                                            class="input_date col-12 p-2" type="date" name="date_input"
                                            id="cost_of_sale" value="0">
                                    </div>

                                </div>
                                @endif

                            </div>
                        </div>



                        <button class="button-63" type="submit" role="button">    @if(!empty($check['page'])) Sửa  @else Thêm @endif</button>
                        </form>
                    </div>

                    <!-- /.card-body -->
                </div>

            </div>

        </div>



    </section>

</div>
<script>
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>
