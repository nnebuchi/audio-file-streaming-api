<style>

	.auth-btn{
		font-weight: 600; background-color: #2B96FF; color: white; padding: 7px 12px; border: 1px solid transparent; border-radius: 5px; text-decoration:none;
	}
	.auth-btn:hover{
		background-color: transparent; border: 1px solid #2B96FF; color: #2B96FF;
	}
	.text-skezzole{
		color: #628c23;
	}
	
</style>
<div class="row">
	<div  class="col-12 text-left">
		<img src="{{ asset('assets/img/logo/logo.png')}}"  style="width: 180px;">
	</div>
</div>
<h3>Hi</h3>
{{-- <p>To get started, please click the button below to verify your email address.</p> --}}
<p>You requested a password reset!</p>


	{{-- <a style="background-color: #5c449b; color:white; padding: 7px; text-decoration: none; border-radius: 5px; "  href="{{ url('verify-email/'.$email.'/'.$verification_code) }}">Verify Email</a> --}}

	<p>What happens next?.</p>
	<p>Use the OTP token below to verify your request</p>

	<p><strong>{{ $user->otp }}</strong></p>

	{{-- <a href="{{ url('verify-email/'.$email.'/'.$verification_code) }}">{{ url('verify-email/'.$email.'/'.$verification_code) }}</a> --}}
	<hr>
	<p>This message was sent to you by {{ env('APP_NAME') }}</p>

	<p>For support, contact us via <a href="mail-to:support@wordbank.word"></a>support@wordbank.word</p>
	<img src="{{ asset('assets/img/logo/logo.png')}}"  style="width: 60px;">
	<p style="font-size:12px;">Copyright &copy; APP_NAME - 2022 </p>
	{{-- src="assets/img/logo/logo.png" --}}