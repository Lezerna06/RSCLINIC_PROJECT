

	{{ $slot }}
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
					<h2> HMS | {{ $userType }} Reset Password</h2>
				</div>

				<div class="box-login">
					<form class="form-login" action="{{ $action }}" method="POST">
						@csrf
						<fieldset>
							<legend>
								{{ $userType }} Reset Password
							</legend>
							<p>	
								Please set your new password.<br />
							</p>

							<div class="form-group">
							<span class="input-icon">
							<input type="password" class="form-control" name="password" placeholder="Password" required>
							<i class="fa fa-lock"></i> </span>
							</div>

							<div class="form-group">
							<span class="input-icon">
							<input type="password" class="form-control" name="password_confirmation" placeholder="Password Again" required>
							<i class="fa fa-lock"></i> </span>
							<p class="text-danger">{{ $validator }}</p>
							</div>
							

							<div class="form-actions">
								<button type="submit" class="btn btn-primary pull-right" name="change">
									Change <i class="fa fa-arrow-circle-right"></i>
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