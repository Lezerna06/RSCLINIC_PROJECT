<x-layouts.userLayout>		
	<div class="main-content" >
		<div class="wrap-content container" id="container">
			<!-- start: PAGE TITLE -->
			<section id="page-title">
				<div class="row">
					<div class="col-sm-8">
						<h1 class="mainTitle">User | Book Appointment</h1>
					</div>
					<ol class="breadcrumb">
						<li>
							<span>User</span>
						</li>
						<li class="active">
							<span>Book Appointment</span>
						</li>
					</ol>
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
									<h5 class="panel-title">Book Appointment</h5>
								</div>
								<div class="panel-body">
									<p style="color:red;">	
									</p>	
									<form role="form" name="book" method="POST" action="{{ route('user.book.appointment') }}">
										@csrf
										<div class="form-group">
											<label for="DoctorSpecialization">
												Doctor Specialization
											</label>
											<select name="spec" class="form-control" id="spec"  required="required">
												<option value="">Select Specialization</option>
												@foreach ($specs as $spec)
													<option value="{{ $spec->specialization }}"> {{ ucwords($spec->specialization) }} </option>
												@endforeach
											</select>
											@error('spec')
											<p class="text-danger">{{ $message }}</p>
											@enderror
										</div>
										<div class="form-group">
											<label for="doctor">
												Doctors
											</label>
											<select name="doctor" class="form-control" id="doctor" required="required">
												<option value="">Select Doctor</option>
											</select>
											@error('doctor')
											<p class="text-danger">{{ $message }}</p>
											@enderror
										</div>										
										<div class="form-group">
											<label for="consultancyfees">
												Consultancy Fees
											</label>
											<input name="fees" class="form-control" id="fees" value=""  disabled/>
										</div>
										
										<div class="form-group">
											<label for="AppointmentDate">
												Date
											</label>
											<input class="form-control datepicker" name="appdate"  required="required" data-date-format="yyyy-mm-dd">	
											@error('appdate')
											<p class="text-danger">{{ $message }}</p>
											@enderror
										</div>
										
										<div class="form-group">
											<label for="Appointmenttime">
												Time													
											</label>
											<input class="form-control" name="apptime" id="timepicker1" required="required">eg : 10:00 PM
											@error('apptime')
											<p class="text-danger">{{ $message }}</p>
											@enderror
										</div>														
										
										<button type="submit" name="submit" class="btn btn-o btn-primary">
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
	<script>
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
			startDate: '+2d'
		});
		$('#timepicker1').timepicker();

		$(document).ready(function(){
			$('#spec, #doctor').mouseup(function(){
				let spec = $("#spec").val();
				let button = this.name;
				let doctor = $("#doctor").val();
				let route = "{{ route('user.book.appointment.check') }}";
				$.ajax({
				type: "POST",
				url: route,
				data: {
					'button': button,
					'spec': spec,
					'doctor': doctor
				}, 
				success:function(data){
					if(data.status == 'doctor'){
						$('#doctor').html(data.response)
						$('#fees').val('')
					}
					if(data.status == "fee"){
						$('#fees').val(data.response)
					}
				},
				error:function (response){    
					console.log(response)                              
				}
				});
			})
		});
		</script>
</x-slot:script>
    
</x-layouts.userLayout>	