@include('layouts.header')
	<div class="min-vh-100">
		<div class="container">
			<div class="row justify-content-md-center justify-content-sm-start py-5">
				<div class="col-12 col-md-6 col-lg-4">
					<div class="d-flex mb-4">
						<div class="mb-5 w-100" style="height: 40px;">
							<a href="{{ route('home') }}">
								<img src="/images/logos/logo.png" class="img-fluid w-100">
							</a>
						</div>
					</div>
					<section class="">
						<div class="alert alert-warning mb-4">Enter the code sent to your phone for verification.</div>
						<form action="javascript:;" method="post" class="verify-phone-form card-raduis mb-4 p-4 border" data-action="{{ route('signup.activate') }}" autocomplete="off">
						    <div class="form-row">
						        <div class="form-group col-12 mb-4">
						            <label class="text-main-dark">Verify Code</label>
							        <input type="text" name="code" class="form-control code" placeholder="e.g., 908894">
						            <small class="error code-error text-danger"></small>
						        </div>
						    </div>
						    <div class="alert px-3 verify-phone-message d-none mb-3"></div>
						    <button type="submit" class="btn btn-lg bg-theme-color btn-block icon-raduis text-white verify-phone-button mb-2">
						        <img src="/images/spinner.svg" class="mr-2 d-none verify-phone-spinner mb-1">
						        Verify
						    </button>
						</form>
						<div class="dropdown card-raduis">
							<div class="text-main-dark border icon-raduis p-3 cursor-pointer" data-toggle="dropdown">Didn't receive a code or expired? <a class="" href="javascript:;">Resend Code</a></div> 
							
					    	<div class="dropdown-menu w-100 rounded border-0 shadow p-0">
					    		<p class="dropdown-header text-main-dark p-4">Resend Code</p>
					    		<div class="dropdown-item p-4">
					    			<form action="javascript:;" class="resend-code-form">
					    				<div class="form-group">
									    	<label class="text-main-dark">Email</label>
									    	<input type="email" class="form-control" name="email" placeholder="e.g., email@example.com">
									    	<small class="invalid-feedback email-error"></small>
									  	</div>
									  	<div class="form-group mb-4">
									    	<label class="text-main-dark">Phone</label>
									    	<input type="number" class="form-control phone" name="phone" placeholder="e.g., 09062972785">
									    	<small class="invalid-feedback phone-error"></small>
									  	</div>
									  	<div class="alert mb-4 resend-code-message d-none"></div>
									  	<button type="submit" class="btn bg-theme-color btn-lg btn-block text-white resend-code-button px-4">
				                            <img src="/images/spinner.svg" class="mr-2 d-none resend-code-spinner mb-1">
				                            Resend
				                        </button>
					    			</form>	
								</div>
					    	</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
@include('layouts.footer')