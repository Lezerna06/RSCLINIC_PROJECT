<x-layouts.adminLayout>				
				<!-- end: TOP NAVBAR -->
    <div class="main-content" >
        <div class="wrap-content container" id="container">
            <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Admin | Add Doctor</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li>
                            <span>Admin</span>
                        </li>
                        <li class="active">
                            <span>Add Doctor</span>
                        </li>
                    </ol>
                </div>
            </section>
            <!-- end: PAGE TITLE -->
            <!-- start: BASIC EXAMPLE -->
            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-12">									
                        <div class="row margin-top-30">
                            <div class="col-lg-8 col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">Add Doctor</h5>
                                    </div>
                                    <div class="panel-body">	
                                        @if(session()->has('success'))
                                            <p class="text-success">{{ session('success') }}</p>
                                        @endif
                                        @if(session()->has('error'))
                                            <p class="text-danger">{{ session('error') }}</p>
                                        @endif								
                                        <form role="form" action="{{ route('admin.doctor.add') }}" method="POST"">
                                            @csrf
                                            <div class="form-group">
                                                <label for="DoctorSpecialization">
                                                    Doctor Specialization
                                                </label>
                                                <select value="{{ old('spec') }}" name="spec" id="spec" class="form-control" required="true">
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
                                                <label for="doctorname">
                                                        Doctor Name
                                                </label>
                                                <input type="text" value = "{{ old('name') }}" name="name" class="form-control"  placeholder="Enter Doctor Name" required="true">
                                                @error('name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="address">
                                                        Doctor Clinic Address
                                                </label>
                                                <textarea name="address" class="form-control"  placeholder="Enter Doctor Clinic Address" required="true">{{ old('address') }}</textarea>
                                                @error('address')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="fess">
                                                        Doctor Consultancy Fees
                                                </label>
                                                <input  type="text" name="fee" class="form-control" value = "{{ old('fee') }}" placeholder="Enter Doctor Consultancy Fees" required="true">
                                                @error('fee')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>	
                                            <div class="form-group">
                                                <label for="fess">
                                                        Doctor Contact no
                                                </label>
                                                <input type="text" name="contact" class="form-control"  value="{{ old('contact') }}" placeholder="Enter Doctor Contact no" required="true">
                                                @error('contact')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="fess">
                                                        Doctor Email
                                                </label>
                                                <input type="email" id="email" name="email"  value = "{{ old('email') }}"class="form-control"  placeholder="Enter Doctor Email id" required="true" onBlur="checkemailAvailability()">
                                                <span id="email-availability-status"></span>
                                                <x-alertmessage.alert class="text-danger">
                                                    @error('email')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </x-alertmessage.alert>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">
                                                        Password
                                                </label>
                                                <input type="password" name="password" class="form-control"  placeholder="New Password" required="required">
                                                @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>														
                                            <div class="form-group">
                                                <label for="exampleInputPassword2">
                                                    Confirm Password
                                                </label>
                                                <input type="password" name="password_confirmation" class="form-control"  placeholder="Confirm Password" required="required">
                                                @error('password_confirmation')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
                                                Submit
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
    <x-slot:script>
        <script>
            function checkemailAvailability() {                
                $("#loaderIcon").show();
                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.check.email') }}",
                        data:'email='+$("#email").val(),
                        success:function(data){
                            // alert(data.message);
                            $("#email-availability-status").html(data);
                            $("#loaderIcon").hide();
                        },
                        error:function (jqHXR){
                            alert(jqHXR.responseJSON.message)
                        }
                });				
            } 
        </script>
    </x-slot>
</x-layouts.adminLayout>		
		
