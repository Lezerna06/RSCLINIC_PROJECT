<x-layouts.adminLayout>
	<div class="main-content" >
		<div class="wrap-content container" id="container">
			<!-- start: PAGE TITLE -->
			<section id="page-title">
				<div class="row">
					<div class="col-sm-8">
						<h1 class="mainTitle">Admin | Change Password</h1>
														</div>
					<ol class="breadcrumb">
						<li>
							<span>Admin</span>
						</li>
						<li class="active">
							<span>Change Password</span>
						</li>
					</ol>
				</div>
			</section>
			<!-- end: PAGE TITLE -->
			<!-- start: BASIC EXAMPLE -->
			<div class="container-fluid container-fullw bg-white">
				<div class="row">
					<div class="col-md-12">
						{{-- Output Message --}}
						<div id="mainMessage"></div>
						<div class="row margin-top-30">
							<div class="col-lg-8 col-md-12">
								<div class="panel panel-white">
									<div class="panel-heading">
										<h5 class="panel-title">Change Password</h5>
									</div>
									<div class="panel-body">                                
										<form role="form" id="passwordForm">
											<div class="form-group">
												<label for="exampleInputEmail1">
													Current Password
												</label>
												<input type="password" id="cpass" class="form-control"  placeholder="Enter Current Password">
												<p class="text-danger" id="cpMessage"></p>
											</div>
											<div class="form-group">
												<label for="exampleInputPassword1">
													New Password
												</label>
												<input type="password" id="npass" class="form-control"  placeholder="New Password">
												<p class="text-danger" id="nMessage"></p>
											</div>
											
											<div class="form-group">
												<label for="exampleInputPassword1">
													Confirm Password
												</label>
												<input type="password" id="cfpass" class="form-control"  placeholder="Confirm Password">
											</div>
											
											<button id="psubmit" type="submit" name="submit" class="btn btn-o btn-primary" disabled>
												Submit
											</button>
										</form>
									</div>
								</div>
							</div>		
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<x-slot:script>
		<script type="text/javascript">
		$(document).ready(function () {
			$('#psubmit').prop("disabled", false);
			$('#passwordForm').submit(function(e){
				$('#psubmit').prop("disabled", true)
				e.preventDefault();
					let cpass = $("#cpass").val();
					let npass = $("#npass").val();
					let cfpass = $("#cfpass").val();
					let route = "{{ route('admin.change.password') }}";
					$.ajax({
					type: "POST",
					url: route,
					data: {
						'currentpassword': cpass,
						'password': npass,
						'password_confirmation': cfpass,
					}, 
					success:function(data){
						$('#mainMessage').html(data.message)  
						$('#cpass,#npass,#cfpass').val('');                               
						$('#psubmit').prop("disabled", false)
					},
					error:function (response){
						let message = response.responseJSON.errors;
						$('#cpass,#npass,#cfpass').val('');
						$('#cpMessage').text(message.currentpassword)
						$('#nMessage').text(message.password)     
						setTimeout(function(){
							$('#cpMessage, #nMessage').text('')  
						}, 3000);                
						$('#psubmit').prop("disabled", false)                                    
					}
					});
			});
			
		});
		</script>
	</x-slot>
</x-layouts.adminLayout>