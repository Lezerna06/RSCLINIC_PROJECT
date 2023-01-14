<x-layouts.userLayout>
  
	<div class="main-content" >
		<div class="wrap-content container" id="container">
			<!-- start: PAGE TITLE -->
			<section id="page-title">
				<div class="row">
					<div class="col-sm-8">
						<h1 class="mainTitle">User | Edit Profile</h1>
														</div>
					<ol class="breadcrumb">
						<li>
							<span>User </span>
						</li>
						<li>
							<a href="{{ route('user.profile') }}">
								<span>Profile</span>
							</a>
						</li>

						<li class="active">
							<span>Edit Email</span>
						</li>
					</ol>
				</div>
			</section>
			<!-- end: PAGE TITLE -->
			<!-- start: BASIC EXAMPLE -->
			<div class="container-fluid container-fullw bg-white">
				<div class="row">
					<div class="col-md-12">
						@if(session()->has('success'))
							<h5 class="text-success" style="font-size:18px;">{{ session('success') }}</h5>
						@endif
						@if(session()->has('error'))
							<h5 class="text-danger" style="font-size:18px;">{{ session('error') }}</h5>
						@endif
						<div class="row margin-top-30">
							<div class="col-lg-8 col-md-12">
								<div class="panel panel-white">
									<div class="panel-heading">
										<h5 class="panel-title">Edit Profile</h5>
									</div>
									<div class="panel-body">
										<form action="{{ route('user.change.email') }}"  method="POST">
											@csrf
											<div class="form-group">
												<label for="fess">
														User Email
												</label>
												<input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()"  placeholder="Email" required>
					
												<span id="user-availability-status1" style="font-size:12px;"></span>
												@if(session()->has('errors') && session('errors') != '[]')
													<div x-data="{show: true}"
														x-init="setTimeout(() => show = false, 3000)"
														x-show="show"   
														class="text-danger"
														>
														<p>{{  session('errors') }}</p>  
													</div>
												@enderror
											</div>
											<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
												Update
											</button>
										</form>
							
									</div>
								</div>
							</div>
								
						</div>
					</div>
					<div class="col-lg-12 col-md-12">
						<div class="panel panel-white">
							
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</x-layouts.userLayout>