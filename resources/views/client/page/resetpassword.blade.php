@extends('client.index')
 @section("main")
 @section('js')
 <script src="{{asset('dist/js/showhiden.js')}}"></script>
 @endsection
<div class="container " style="margin-top: 120px">
  @if (session()->has('resetpassword'))
  <div class="alert alert-danger" role="alert">{{session('resetpassword')}}</div>
  @endif
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">{{ $error }}</div>
  @endforeach

  @if(isset($user))
    <div class="mb-4">
        <h4>Tạo lại mật khẩu</h4>
        <p class="mb-2">Nhập mật khẩu để cập nhật lại mật khẩu
        </p>
      </div>
    <x-acout.resetpassword :acout="$user"></x-acout.resetpassword>
   @else
  
      <x-client.page.404></x-client.page.404>
  

   @endif
</div>


 


@endsection
