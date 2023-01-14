

{{ $slot }}
<div class="row">
	<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<div class="logo margin-top-30">
		<a href="/"><h2> {{ $hometitle }} </a> | <a href="{{ $thislink }}">{{ $title }} Password Recovery</h2></a>
		</div>

		<div class="box-login">
			<form class="form-login" method="POST" action="/account/recover">
				@csrf
				<fieldset>
					<legend>
						{{ $title }} Password Recovery
					</legend>
					<p>
						Please enter your {{ $fields }} to recover your password.<br />
			
					</p>
					<input type="hidden" name="restriction" value="{{ $restriction }}"/>
					<div class="form-group form-actions">
						<span class="input-icon">
							<input type="text" class="form-control" name="contactno" placeholder="Registered {{ $firstfield }}">
							<i class="fa fa-lock"></i>
								</span>
							{{ $errormessage1 ?? '' }}
					</div>

					<div class="form-group">
						<span class="input-icon">
							<input type="email" class="form-control" name="email" placeholder="Registred {{ $secondfield }}">
							<i class="fa fa-user"></i> </span>
							{{ $errormessage2 ?? '' }}
					</div>

					<div class="form-actions">
						
						<button type="submit" class="btn btn-primary pull-right">
							Reset <i class="fa fa-arrow-circle-right"></i>
						</button>
					</div>
					<div class="new-account">
						Already have an account? 
						<a href="{{ $loginlink }}">
							Log-in
						</a>
					</div>
				</fieldset>
			</form>

			<div class="copyright">
				&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> HMS</span>. <span>All rights reserved</span>
			</div>
	
		</div>

	</div>
</div>


