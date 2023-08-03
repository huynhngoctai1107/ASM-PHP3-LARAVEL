<div class="content-wrapper  bg-white">
    <section class="content mt-5">
        <div class="container-fluid">
            <div class="col-md-12">
                @if (session()->has('add-category'))
                <div class="alert alert-success" role="alert">{{session('add-category')}}</div>
                @endif
                <div class="card card-primary">
                    <div class="card-header bg">
                        <h3 class="card-title">
                            @if (!empty($check))
                                Chỉnh sửa loại bài viết
                            @else
                                Thêm loại bài viết
                            @endif
                        </h3>
                    </div>
                    @if (session()->has('add-post'))
                        <div class="alert alert-success" role="alert">{{session('add-post')}}</div>
                    @endif

                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                    @endforeach
                    <div class="card-body">
                        @if (!empty($check))

                            <form class="col-12" method="post" action="/admin/edit-category-post/{{$check->slug}}">
                        @else
                            <form class="col-12" method="post" action="/admin/add-category-post">
                        @endif
                        @csrf

                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                <input type="text" name="name"
                                    value="@if (!empty($check)){{$check->name}} @else{{old('name')}}@endif"
                                    class="form-control " data-target="#reservationdatetime" />
                            </div>
                        </div>
                   
                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                           <textarea class="form-control" id="exampleFormControlTextarea1" name="contents" rows="6">@if(!empty($check)){{$check->note}} @else{{old('contents')}}@endif</textarea>

                                    </div>
                                </div>
                                @if (!empty($check))
                                <button class="button-63" type="submit" role="button">Sửa</button>
                            @else
                            <button class="button-63" type="submit" role="button">Thêm</button>
                            @endif
                         </form>
                    </div>
                </div>
            </div>
        </div>
</section>
</div>
