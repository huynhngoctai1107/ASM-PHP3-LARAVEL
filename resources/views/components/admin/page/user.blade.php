<div class="content-wrapper">
    <section class="content mt-5">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header bg">
                        <h3 class="card-title ">
                            @if (!empty($check))
                                Chỉnh sửa tài khoản
                            @else
                                Thêm tài khoản
                            @endif

                        </h3>
                    </div>
                    @if (session()->has('add-user'))
                    <div class="alert alert-success" role="alert">{{session('add-user')}}</div>
                    @endif
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                    @endforeach
                    <div class="card-body">

                           @if (!empty($check))
                            <form class="col-12" method="post" action="/admin/edit-user/{{$check->id}}" enctype="multipart/form-data">

                            @else
                                <form action="/admin/add-user" method="post" class="col-12"
                                    enctype="multipart/form-data">
                           @endif




                        @csrf

                        <div class="form-group bg-title">
                            <label class="card-header bg-title col-12">Tên người dùng</label>
                            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                <input type="text"
                                    value="@if (!empty($check)) {{$check->name}}  @else{{ old('fullName') }} @endif"
                                    class="form-control" data-target="#reservationdatetime" name="fullName"
                                    placeholder="Tên người dùng" />
                            </div>
                        </div>
                        <div class="form-group bg-title">
                            <label class="card-header bg-title col-12">Email</label>
                            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                <input
                                    type="email"value="@if(!empty($check)) {{$check->email}}  @else{{ old('email') }} @endif"
                                    class="form-control " data-target="#reservationdatetime" name="email"
                                    placeholder="Email" />
                            </div>
                        </div>
                        <div class="form-group bg-title">
                            <label class="card-header bg-title col-12">Số điện thoại</label>
                            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                <input type="text"
                                    value="@if(!empty($check)){{$check->phone ??''}}@else{{ old('phone') }} @endif"
                                    name="phone" class="form-control " data-target="#reservationdatetime"
                                    placeholder="Số điện thoại" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="card-header bg-title col-12">Năm sinh</label>

                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="date"
                                    value="@if(!empty($check)){{date('Y-m-d',strtotime($check->birthday))}}@else{{date('Y-m-d',strtotime(old('birthday')))}} @endif"
                                    class="form-control " name="birthday" data-target="#reservationdate" />

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="card-header bg-title col-12">Giới tính</label>

                            <div class="form-check form-check-inline">
                                <input class="m-2" type=radio name="gender" value="Nam"  @if (!empty($check)) {{$check->gender =='Nam' ? 'checked':''}}  @else{{ old('gender') =='Nam' ? 'checked':'' }} @endif>Nam
                                <input class="m-2" type=radio name="gender" value="Nữ"  @if (!empty($check)) {{$check->gender =='Nữ' ? 'checked':''}}  @else{{ old('gender') =='Nữ' ? 'checked':'' }} @endif>Nữ
                                <input class="m-2" type=radio name="gender" value="0"  @if (!empty($check)) {{$check->gender =='0' ? 'checked':''}}  @else{{ old('gender')=='0' ? 'checked':'' }} @endif>Khác

                            </div>
                        </div>
                                    @if (!empty($check))

                                    @else
                        <div class="form-group">
                            <label class="card-header bg-title col-12">Mật khẩu</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input class="form-control col-12"
                                    value="{{ old('password') }}"
                                    type="password" name="password" id="myInput"class="form-control "
                                    data-target="#reservationdate" style="width: 100%" />
                                <input type="checkbox" onclick="myFunction()">Hiện mật khẩu
                            </div>
                        </div>
                                         @endif
                        <div class="form-group">

                            <label class="card-header bg-title col-12">Trạng thái hoạt động</label>
                            <input class="m-2" type=radio name="status" value="1"  @if (!empty($check)) {{$check->status =='1' ? 'checked':''}}  @else{{ old('status')=='1' ? 'checked':'' }} @endif>Đang hoạt động
                            <input class="m-2" type=radio name="status" value="0"  @if (!empty($check)) {{$check->status =='0' ? 'checked':''}}  @else{{ old('status')=='0' ? 'checked':'' }} @endif>Không hoạt động



                        </div>
                          <input type="hidden" name="social" value="@if (!empty($check)) {{$check->social}}  @else 0 @endif">
                        <div class="form-group">
                            <label class="card-header bg-title col-12">Loại tài khoản</label>

                            <input class="m-2" type=radio name="level" value="0"  @if(!empty($check)){{$check->level=='0'?'checked':''}}@else{{old('level')=='0'?'checked':'' }}@endif>Tài khoản khách hàng
                            <input class="m-2" type=radio name="level" value="1"  @if(!empty($check)){{$check->level=='1'?'checked':''}}@else{{old('level')=='1'?'checked':'' }}@endif>Tài khoản biên tập viên
                            <input class="m-2" type=radio name="level" value="2"  @if(!empty($check)){{$check->level=='2'?'checked':''}}@else{{old('level')=='2'?'checked':'' }}@endif>Tài Quản trị tối cao

                        </div>
                        <div class="form-group">
                            <label class="card-header bg-title col-12">Thêm hình ảnh</label>

                            <div class="input-group date" id="reservationdate" data-target-input="nearest">

                                <input type='file'   value="@if(!empty($check))@else{{old('uploadfile')}} @endif" name="APP_LINK_EAMIL" id="imgInp" />
                                <img width="100" id="blah" src="#" alt="your image" />
                            </div>
                        </div>
                        <button class="button-63" type="submit" name="addUser" role="button">Thêm</button>
                        </form>

                    </div>
                </div>

                    <!-- /.card-body -->
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
