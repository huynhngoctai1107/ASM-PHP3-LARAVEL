
@extends('client.index')

@section('css')

@endsection
@section('main')

<section class="ftco-section mt-5">
    <div class="container" style="font-family: 'Be Vietnam Pro', sans-serif !important;">

        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                        <div class="text w-100">
                            <h2>Xin chào</h2>
                            <p>Nếu bạn chưa có tài khoản?</p>
                            <a href="/resignter" class="btn btn-white btn-outline-white">Đăng ký</a>
                        </div>
                    </div>
                    <div class="login-wrap p-4 p-lg-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Đăng nhập</h3>
                            </div>
                            <div class="w-100">
                                <p class="social-media d-flex justify-content-end">
                                    <a href="/facebook" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                    <a href="/github" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-github"></span></a>
                                </p>
                            </div>
                        </div>
                        @if (session()->has('resignter'))
                        <div class="alert alert-success" role="alert">{{session('resignter')}}</div>
                        @endif
                        @if (session()->has('login'))
                        <div class="alert alert-danger" role="alert">{{session('login')}}</div>
                        @endif



                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">{{ $error }}</div>

                        @endforeach
                        

                        <form action="\login" method="post" class="signin-form">
                            {{csrf_field()}}
                            <div class="form-group mb-3">
                                <label class="label" for="name">Email</label>
                                <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password">Mật khẩu</label>
                                <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Mật khẩu">
                            </div>
                            <div class="form-group">
                                {!! RecaptchaV3::field('') !!}
                                <input  type="submit"  class="form-control btn btn-primary submit px-3" value="Đăng nhập">
       
                            {{-- <x-acout.recaptchav3 nameRecaptcha="login" class="form-control btn btn-primary submit px-3" value="Đăng nhập"></x-acout.recaptchav3>     --}}
                            {{-- <button type="submit" >Sign In</button> --}}
                            </div>
                            
                            <a class="  btn-lg text-white btn-block align-items-center d-flex justify-content-center"style="background-color:#007bff !important ; border-radius: 50px; font-size:15px;padding: 10px 20px; height: 48px;" href="/google"
                                role="button">
                                
                                <i class="fab fa-google me-2"></i> Đăng nhập với Google
                            </a>
                            <div class="form-group d-md-flex mt-5">
                                <div class="w-50 text-left">
                                    <label class="checkbox-wrap checkbox-primary mb-0"> 
                                        <input type="checkbox" checked>
                                     
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="/forget-password">Quên mật khẩu</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection