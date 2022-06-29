<style>
	.auth-btn{
		font-weight: 600; background-color: #1d2840; color: white; padding: 7px 12px; border: 1px solid transparent; border-radius: 5px; text-decoration:none;
	}
	.auth-btn:hover{
		background-color: transparent; border: 1px solid #1d2840; color: #1d2840;
	}
	.text-skezzole{
		color: #628c23;
	}
</style>
<div class="row">
	<div  class="col-12 text-left">
		<img src="{{ asset('assets/img/logo/logo.png') }}"  style="width: 180px; margin-top: 20px;">
	</div>
</div>
<h3>Hi </h3>

<p>You requested for a passord reset!</p>


	<p>What happens next?.</p>
	<p>Please click on the "Verify Email" button below</p>

	<p><a href="{{ url('creator/reset-password/'.$passwordReset->email.'/'.$passwordReset->token) }}" class="auth-btn">Reset Password</a></p>

	<p>OR</p>
	<p>Copy the link below and paste it in your favourite browser and hit the enter button. That should do it. Winks. </p>

	<a href="{{ url('creator/reset-password/'.$passwordReset->email.'/'.$passwordReset->token) }}">{{ url('creator/reset-password/'.$passwordReset->email.'/'.$passwordReset->token) }}</a>
<hr>
	<p>This message was sent to you by Word Bank</p>

	<p>For support, contact us via <a href="mail-to:support@wordbank.app"></a>support@wordbank.app</p>
	<img src="{{ asset('assets/img/logo/logo.png') }}"  style="width: 60px;">
	<p style="font-size:12px;">Copyright &copy; Skezzole - 2022 </p>
	{{-- src="assets/img/logo/logo.png" --}}