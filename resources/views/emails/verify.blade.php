@component('mail::message', ['data' => $data])

<h2>Dear {{ ucwords($data['name']) }} Thank you for your registration.</h2> 
<p>Please use the code below to verify your Phone number.</p>
<h1>Phone Verify Code {{ $data['phone_token'] }}</h1>

<p>Please click on the button below to verify your Email address.</p>

<?php $url = route('verify.email').'/'.$data['email_token']; ?>
<div style="text-align: left;">
	@component('mail::button', ['url' => $url])
		Click Here
	@endcomponent
</div>


<h3>Or click on the link below.</h3>

<h1>{{ $url }}</h1>

<p>If you did not perform this action with your email, please ignore.</p>

@endcomponent
