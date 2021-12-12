@include('layouts.header')
    @include('frontend.layouts.navbar')
	<section class="bg-violet py-5">
		<div class="container my-5 pt-2">
			<div class="row align-items-center my-5 pt-5">
				<div class="col-12 col-md-5">
					<h1 class="text-white mb-3">Enter Email</h1>
					<p class="text-white mb-3">Enter your account email and we will send a password reset link to your email.</p>
					<form method="post" action="javascript:;" class="forgot-password-form p-3 bg-white" data-action="{{ route('password.email') }}" autocomplete="off">
	                    <div class="form-group">
	                        <label class="text-smoky font-weight-bold">Email</label>
	                        <input type="email" class="form-control email rounded-0" name="email" placeholder="e.g., email@youremail.com">
	                        <small class="invalid-feedback email-error"></small>
	                    </div>
	                    <div class="alert mb-3 forgot-password-message d-none"></div>
	                    <div class="mb-3 mt-4">
	                        <button type="submit" class="btn rounded-0 bg-violet text-white forgot-password-button px-4 font-weight-bold">
	                            <img src="/images/svgs/spinner.svg" class="mr-2 d-none forgot-password-spinner mb-1">
	                            Submit
	                        </button>
	                    </div>
		            </form>
				</div>
			</div>
		</div>
	</section>
	@include('frontend.layouts.bottom')
@include('layouts.footer')