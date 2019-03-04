<!DOCTYPE html>
<html lang="en">
<head>
        <!--<link rel="icon" href="/adp/public/images/backend_images/logo_3.png" type="image/ico">-->
	<title>Web Based ABMS Budget Management System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<!--<link rel="icon" type="image/png" href="{{ asset('public/images/backend_images/logo_3.png') }}"/>-->
        <link rel="icon" href="/adp/public/images/backend_images/logo_3.png" type="image/ico">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/login/V15/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('public/login/V15/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('public/login/V15/css/util.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/login/V15/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url( {{ asset('public/login/V15/images/bg-01.jpg') }} );">
					<span class="login100-form-title-1">
						Web Based ABMS Budget Management System 
					</span>
				</div>
				<form class="login100-form validate-form" method="post" action="{{ url('admin') }}" >
                                    @csrf
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="email" name="email" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
                                            <button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!--<script src="js/main.js"></script>-->
        <script src="{{asset('public/login/V15/js/main.js')}}"></script>


</body>
</html>


<script type="text/javascript">
     @if(session()->get('flash_message_error'))
    var message= "{{ session()->get('flash_message_error') }}";
    swal({
        //title: "Error",
        text: message,
        html: true,
        icon:'info'
    });
    @endif
</script>

