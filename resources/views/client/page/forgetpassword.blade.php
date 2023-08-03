@extends('client.index')
 @section("main")



 

 <div class="container d-flex flex-column">

    <div class="row align-items-center justify-content-center
        min-vh-100">
        
      <div class="col-12 col-md-8 col-lg-4">
        <div class="card shadow-sm">
        @foreach ($errors->all() as $error)
          <div class="alert alert-danger" role="alert">{{ $error }}</div>
        @endforeach
        @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">{{session('error')}}</div>
        @endif
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">{{session('success')}}</div>
    @endif
       
          <div class="card-body">
            <div class="mb-4">
              <h5>Quên mật khẩu</h5>
              <p class="mb-2">Nhập ID email đã đăng ký của bạn để đặt lại mật khẩu
              </p>
            </div>
            <x-acout.forgetpassword>

            </x-acout.forgetpassword>
          
          </div>
        </div>
      </div>
    </div>
  </div>
 



@endsection
