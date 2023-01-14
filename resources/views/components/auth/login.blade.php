<div class="row">
	<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<div class="logo margin-top-30">
		<a href="{{ $sublink }}"><h2>{{ $subtitle }}</h2></a>
		</div>

		<div class="box-login">
			<form class="form-login" method="POST" action="{{ $action }}">
				@csrf
				<fieldset>
					<legend>
						Sign in to your account
					</legend>
					<p>
						Please enter your name and password to log in.<br />
						{{-- <span style="color:red;"> echo $_SESSION['errmsg'];  echo $_SESSION['errmsg']=""</span> --}}
					</p>
					<div class="form-group">
						<span class="input-icon">
							<input type="text" class="form-control" name="username" placeholder="{{ $placeholder }}">
							<i class="fa fa-user"></i> </span>
					</div>
					<div class="form-group form-actions">
						<span class="input-icon">
							<input type="password" class="form-control password" name="password" placeholder="Password">
							<i class="fa fa-lock"></i>
								</span>
							{{ $forgotpassword ?? '' }}
					</div>
					<div class="form-actions" style = "display:flex; justify-content: space-between;">
						
						<a href="/" class="btn btn-primary pull-right" name="submit">
							<i class="fa fa-arrow-circle-left"></i> Home
						</a>
						<button type="submit" class="btn btn-primary pull-right" name="submit">
							Login <i class="fa fa-arrow-circle-right"></i>
						</button>
						
					</div>
					{{ $slot }}
				</fieldset>
			</form>

		</div>

	</div>
</div>
		
		
