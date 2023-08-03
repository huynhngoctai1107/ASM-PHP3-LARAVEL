@if(isset($acout))
<form action="/reset-password/{{$acout->id}}" method="post">
  @csrf
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Địa chỉ email</label>
    <fieldset disabled>
    <input type="email" name="email" class="form-control" value="{{$acout->email}}" id="disabledTextInput" aria-describedby="emailHelp">
  </fieldset>
   
  </div>
  <div class="mb-3">
    <label for="myInput" class="form-label">Tạo mật khẩu</label>
    <input type="password" value="{{old('password')}}"  name="password" class="form-control" id="myInput">
    <div class="ps-3">
      <input type="checkbox" onclick="myFunction()">Hiện mật khẩu
    </div>
  </div>

  
  <div class="mb-3">
    
    <label for="exampleInputPassword2" class="form-label">Nhập lại mật khẩu vừa tạo</label>
    <input type="password"  name="password_confirmation"  value="{{old('password_confirmation')}}" class="form-control" id="againpassword">
    <div class="ps-3">
    <input type="checkbox" onclick="myFunctionone()">Hiện mật khẩu
  </div>
  </div>
  {!! RecaptchaV3::field('') !!}
  <input  type="submit"  class="btn btn-primary btn-lg" value="Register">
  {{-- <x-acout.recaptchav3 nameRecaptcha="resetpassword" class="btn btn-primary btn-lg" value="Tạo lại mật khẩu"></x-acout.recaptchav3>    --}}

</form>
 @else
  Phiên đã hết hạn
 @endif