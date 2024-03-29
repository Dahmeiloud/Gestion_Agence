
<!DOCTYPE html>
<html lang="en">

@include('auth.includes.header')
<body>


	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{asset('loginpage/images/img_01.png')}}"   alt="IMG">
				</div>
                <form method="POST" action="{{ route('register')  }}" class="login100-form validate-form">
                    @csrf

					<span class="login100-form-title">
						 Register
					</span>

                    <div class="wrap-input100 validate-input">

                        <div class="wrap-input100 validate-input">
                            <input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name" placeholder="Name"  value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Email">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                        </div>
                    </div>


					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100 @error('email') is-invalid @enderror" type="text" name="email"  placeholder="Email" >

                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100 @error('password') is-invalid @enderror" type="password" name="password_confirmation" placeholder="Password">


                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
                    <div class="container-login100-form-btn">
                        <button  type="submit"    class="login100-form-btn">
                            Register
                        </button>
                    </div>

					<div class="text-center p-t-136">
						<a class="txt2" href="{{route('login')}}">
	 						Login page
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




@include('auth.includes.footer')


</body>
</html>
