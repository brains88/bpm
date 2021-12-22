@include('layouts.header')
	<div class="position-relative">
		<div class="login-banner">
			<div class="container">
				<div class="row min-vh-100 justify-content-center align-items-center">
					<div class="login-right col-12 col-md-4 mb-4">
						<section class="pt-5">
							<div class="w-100" style="max-width: 350px;">
								<a href="{{ route('home') }}" class="">
									<img src="/images/logos/logo.png" class="img-fluid w-100">
								</a>
								<h1 class="text-white font-weight-bolder">Services Limited</h1>
							</div>
							<div class="text-white mb-3">We're A Leading Real Estate Company In Nigeria That Has Been Building Prosperity For Our Clients By Executing Innovative Real Estate Solutions.</div>
						</section>
						<section class="">
							<h1 class="font-weight-bolder mb-3">
								<span class="text-white">Login</span> 
								<span class="text-main-green">Here</span>
							</h1>
							<form action="javascript:;" method="post" class="login-form mb-4" data-action="{{ route('login.signin') }}" autocomplete="off">
							    <div class="form-row">
							        <div class="form-group col-12">
							            <label class="text-white">Email or Phone</label>
							            <div class="input-group">
							            	<div class="input-group-prepend">
											    <span class="input-group-text text-white">
											    	<i class="icofont-ui-message"></i>
											    </span>
											  </div>
								            <input type="text" name="login" class="form-control login" placeholder="Enter email or phone">
							            </div>
							            <small class="error login-error text-danger"></small>
							        </div>
							        <div class="form-group col-12">
							            <label class="text-white">Password</label>
							            <div class="input-group">
							            	<div class="input-group-prepend">
											    <span class="input-group-text text-white">
											    	<i class="icofont-ui-unlock"></i>
											    </span>
											</div>
							            	<input type="password" name="password" class="form-control password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
							            </div>
							            <small class="error password-error text-danger"></small>
							        </div>
							    </div>
							    <div class="d-flex align-items-center justify-content-between mb-3">
							    	<div class="custom-control custom-switch">
									  	<input type="checkbox" class="custom-control-input rememberme" id="rememberme" name="rememberme" value="on">
									  	<label class="custom-control-label cursor-pointer text-white" for="rememberme">Remember Login</label>
									</div>
							    	<div class="">
								    	<a href="{{ route('forgot.password') }}" class="text-white">Forgot Password?</a>
								    </div>
							    </div>
							    <button type="submit" class="btn btn-lg bg-main-green btn-block text-white login-button mb-4">
							        <img src="/images/spinner.svg" class="mr-2 d-none login-spinner mb-1">
							        Login
							    </button>
							    <div class="alert px-3 login-message d-none mb-3"></div>
							    <p class="text-white mb-0">
									Don't have an account? <a class="text-main-green font-weight-bolder" href="{{ route('signup') }}">Signup</a>
								</p>
							</form>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
@include('layouts.footer')