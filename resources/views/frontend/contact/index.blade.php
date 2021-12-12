@include('layouts.header')
    @include('frontend.layouts.navbar')
    <div class="position-relative">
    	<section class="contact-banner">
			<div class="container">
				<h1 class="text-main-green font-weight-bolder mb-4">Send a <span class="text-white">Message</span></h1>
				<div class="row">
					<div class="col-12 col-lg-8 mb-4">
						<form class="contact-form p-4 rounded border" action="javascript:;" method="post">
							<div class="form-row">
						        <div class="form-group col-md-6">
						            <label class="text-white">Fullname</label>
							        <input type="text" name="fullname" class="form-control fullname" placeholder="Enter email or phone">
						            <small class="error fullname-error text-danger"></small>
						        </div>
						        <div class="form-group col-md-6">
						            <label class="text-white">Designation</label>
						            <select class="custom-select form-control type">
						            	<option value="">Select Designation</option>
						            	<option value="Company">Company</option>
						            	<option value="Individual">Individual</option>
						            </select>
						            <small class="error password-error text-danger"></small>
						        </div>
						    </div>
						    <div class="form-row">
						     	<div class="form-group col-md-6">
						            <label class="text-white">Email</label>
							        <input type="email" name="email" class="form-control email" placeholder="e.g., email@you.com">
						            <small class="error email-error text-danger"></small>
						        </div>
						        <div class="form-group col-md-6">
						            <label class="text-white">Phone</label>
						            <input type="number" name="phone" class="form-control phone" placeholder="e.g., 09062972785">
						            <small class="error phone-error text-danger"></small>
						        </div>
						    </div>
						    <div class="mb-4">
						    	<label class="text-white">Message</label>
						    	<textarea class="form-control message" name="message" rows="4" placeholder="Enter message here"></textarea>
						    	<small class="error message-error text-danger"></small>
						    </div>
						    <button type="submit" class="btn btn-lg bg-main-green btn-block text-white contact-form-button mb-4">
						        <img src="/images/spinner.svg" class="mr-2 d-none contact-form-spinner mb-1">
						        Send
						    </button>
						    <div class="alert px-3 contact-form-message d-none mb-3"></div>
						</form>
					</div>
					<div class="col-12 col-md-4">
						<h3 class="text-white">Office Addresses</h3>
						<div class="mb-4">
							<p class="text-main-green">Head Office</p>
							<div class="text-white">26 Moorehouse Street, Ogui Enugu, Enugu state.</div>
						</div>
						<div class="mb-4">
							<p class="text-main-green">Branch Office</p>
							<div class="text-white">Afri Hotel, Plot 281 Herbert Macaulay Way, Opposite National Defense College, Central Business District, Abuja.</div>
						</div>
					</div>
				</div>
			</div>
		</section>
    </div>
	@include('frontend.layouts.bottom')
@include('layouts.footer')