<form action="/forget-password" method="post">
    @csrf
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" name="email" id="email" class="form-control"value="{{old('email')}}"  placeholder="Email của bạn ?">
      </div>
      <div class="mb-3 d-grid">
        {!! RecaptchaV3::field('') !!}
    <input  type="submit"  class="btn btn-primary" value="Register">
        {{-- <x-acout.recaptchav3 nameRecaptcha="forgetpassword" class="btn btn-primary" value=" Đặt lại mật khẩu"></x-acout.recaptchav3>    --}}
      </div>
      <span>Tôi có một tài khoản ? <a href="/login"> Sign in</a></span>
    </form>
   