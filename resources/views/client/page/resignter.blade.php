@extends('client.index')
 
@section('js')
<script src="{{asset('dist/js/showhiden.js')}}"></script>
@endsection
@section('main')
<style>
    .gradient-custom {
        margin-top: 100px;
        margin-bottom: 100px;
    }
</style>
<section class="  gradient-custom ">
    <div class="container py-5  ">
        <div class="row justify-content-center align-items-center  ">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">

                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Đăng ký tài khoản </h3>
                        @if (session()->has('resigter'))
                        <div class="alert alert-danger" role="alert">{{session('resigter')}}</div>
                        @endif
                        <form action="\resignter" method="post">
                            @csrf
                            <div class="col-md-12 px-0 mb-4">

                                <div class="form-outline">
                                    @error('name')
                                    <div  class="alert alert-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                   
                                    <input value="{{ old('name') }}" type="text" value=" " name="name" id="firstName" class="form-control form-control-lg" />
                                    <label class="form-label" for="firstName">Họ và Tên</label>
                                </div>

                            </div>



                            <div class="row">
                                <div class="col-md-6 mb-4 d-flex align-items-center">

                                    <div class="form-outline datepicker w-100">
                                    @error('birthday')
                                    <div  class="alert alert-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                        <input  type="date" name="birthday" value="{{date('Y-m-d',strtotime(old('birthday') ?? ''))}}" class="form-control form-control-lg" id="birthdayDate" />
                                        <label for="birthdayDate" class="form-label">Năm sinh</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">
                                @error('gender')
                                    <div  class="alert alert-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                    <h6 class="mb-2 pb-1">Giới tính: </h6>

                                    <div class="form-check form-check-inline">
                                        <input  class="form-check-input" type="radio" name="gender" {{old('gender')=='nam' ? 'checked':''}} id="femaleGender" value="nam" checked />
                                        <label class="form-check-label" for="femaleGender">Nam</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input  class="form-check-input" type="radio" name="gender" {{old('gender')=='nữ' ? 'checked':''}} id="maleGender" value="nữ" />
                                        <label class="form-check-label" for="maleGender">Nữ</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input  class="form-check-input" type="radio" name="gender" {{old('gender')=='khác' ? 'checked':''}} id="otherGender" value="khác" />
                                        <label class="form-check-label" for="otherGender">Khác</label>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                    @error('email')
                                    <div  class="alert alert-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                        <input value="{{ old('email') }}" type="email"  id="emailAddress" name="email" class="form-control form-control-lg" />
                                        <label class="form-label" for="emailAddress">Email</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">

                                    @error('phone')
                                    <div  class="alert alert-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                        <input type="tel" value="{{ old('phone') }}" id="phoneNumber" name="phone" class="form-control form-control-lg" />
                                        <label class="form-label" for="phoneNumber">Số điện thoại</label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 mb-4 pb-2 mx-0 px-0">

                              
                                <div class="mb-3">
                                    @error('password')
                                    <div  class="alert alert-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                    <label for="myInput" class="form-label">Tạo mật khẩu</label>
                                    <input type="password" value="{{old('password')}}"  name="password" class="form-control" id="myInput">
                                    <div class="ps-3">
                                      <input type="checkbox" class="me-2" onclick="myFunction()">Hiện mật khẩu
                                    </div>
                                  </div>
 
                                <div class="mb-3">
                                    @error('password_confirmation')
                                    <div  class="alert alert-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                    <label for="exampleInputPassword2" class="form-label">Nhập lại mật khẩu</label>
                                    <input type="password"  name="password_confirmation"  value="{{ old('password_confirmation') }}" class="form-control" id="againpassword">
                                    <div class="ps-3">
                                    <input type="checkbox" class="me-2" onclick="myFunctionone()">Hiện mật khẩu
                                </div>
                                </div>
                            </div>



                            <div class="mt-4 pt-2   ">
                                {!! RecaptchaV3::field('') !!}
                                <input  type="submit"  class="btn btn-primary btn-lg" value="Đăng ký tài khoản">
                                {{-- <x-acout.recaptchav3 nameRecaptcha="" class="btn btn-primary btn-lg" value="Đăng ký tài khoản"></x-acout.recaptchav3>    --}}
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection