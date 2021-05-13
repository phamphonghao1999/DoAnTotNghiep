<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('public/backend/login/css/style.css')}}">

	</head>
	<body class="img js-fullheight" style="background-image: url(public/backend/login/images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
						<?php
							$message = Session::get('message');
							if($message){
								echo '<span class="text-alert">',$message, '</span>';
								Session::put('message',null);
							}

							?>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	{{-- <h3 class="mb-4 text-center">Have an account?</h3> --}}
		      	<form action="{{URL::to('/admin-index')}}" method="post" class="signin-form">
		      		{{csrf_field()}}
		      		<div class="form-group">
		      			<input type="text" name="admin_email" class="form-control" placeholder="Username" placeholder="Điền email" required="">
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" placeholder="Password"  name="admin_passwork" >
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>
	            </div>
	          </form>
	          <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="{{url('/login-facebook')}}" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	{{-- <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script> --}}

  <script src="{{asset('public/backend/login/js/jquery.min.js')}}"></script>
<script src="{{asset('public/backend/login/js/popper.js')}}"></script>
<script src="{{asset('public/backend/login/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/backend/login/js/main.js')}}"></script>

	</body>
</html>

