<x-layouts.authLayout title="User Registration">
		@if(session()->has('error'))
			<x-alertmessage.alert class="__alertErrorMessage">
				<p>{{ session('error') }}</p>  
			</x-alertmessage.alert>
		@endif
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="/user/registration"><h2>R.S | Patient Registration</h2></a>
				</div>
				<!-- start: REGISTER BOX -->
				<div class="box-register">
					<form name="registration" id="registration"  method="POST" action="/user/registration">
						@csrf
						<fieldset>
							<legend>
								Sign Up
							</legend>
							<p>
								Enter your personal details below:
							</p>
							<div class="form-group">
								<input type="text" class="form-control" name="full_name" placeholder="Full Name" value="{{ old('full_name') }}" required>
								@error('full_name')
									<p class="text-danger">{{ $message }}</p>
								@enderror
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="address" placeholder="Address" value="{{ old('address') }}" required>
								@error('address')
									<p class="text-danger">{{ $message }}</p>
								@enderror
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="city" placeholder="City" value="{{ old('city') }}" required>
								@error('city')
									<p class="text-danger">{{ $message }}</p>
								@enderror
							</div>
							<div class="form-group">
								<label class="block">
									Gender
								</label>
								<div class="clip-radio radio-primary">
									<input type="radio" id="rg-female" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }} >
									<label for="rg-female">
										Female
									</label>
									<input type="radio" id="rg-male" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
									<label for="rg-male">
										Male
									</label>
									@error('gender')
										<p class="text-danger">{{ $message }}</p>
									@enderror
								</div>
							</div>
							<p>
								Enter your account details below:
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()"  placeholder="Email" value="{{ old('email') }}" required>
									<i class="fa fa-envelope"></i> </span>
									@error('email')
									<p class="text-danger">{{ $message }}</p>
									@enderror
									
									 <span id="user-availability-status1" style="font-size:12px;"></span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
									<i class="fa fa-lock"></i> </span>
									@error('password')
									<p class="text-danger">{{ $message }}</p>
									@enderror
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control"  id="password_again" name="password_confirmation" placeholder="Password Confirmation" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<div class="form-group">
								<div class="checkbox clip-check check-primary">
									<input type="checkbox" id="agree" value="agree" checked="true" readonly=" true">
									<label for="agree">
										I agree
									</label>
								</div>
							</div>
							<div class="form-actions">
								<p>
									Already have an account?
									<a href="/login/user">
										Log-in
									</a>
								</p>
								<button type="submit" class="btn btn-primary pull-right" name="submit">
									Submit <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</fieldset>
					</form>

				</div>

			</div>
		</div>
		
		<x-slot:script>
			<script>
				function userAvailability() {
					$("#loaderIcon").show();
						$.ajax({
							type: "POST",
							url: "/user/registration/checkemail",
							data:'email='+$("#email").val(),
							success:function(data){
								// alert(data.message);
								$("#user-availability-status1").html(data);
								$("#loaderIcon").hide();
							},
							error:function (jqHXR){
								alert(jqHXR.responseJSON.message)
							}
					});
				}
			</script>	
			
				
			
		</x-slot>
	</x-layouts.authLayout>
		

		
	