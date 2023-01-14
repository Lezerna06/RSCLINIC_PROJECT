<x-layouts.adminLayout>				
        <!-- end: TOP NAVBAR -->
    <div class="main-content" >
        <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Admin | Edit Doctor Details</h1>
                    </div>  
                    <ol class="breadcrumb">
                        <li>
                            <span>Admin</span>
                        </li>
                        <li class="active">
                            <span>Edit Doctor Details</span>
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
                                        <h5 class="panel-title">Edit Doctor Info</h5>
                                    </div>
                                    <div class="panel-body">	
                                        @if(session()->has('success'))
                                            <p class="text-success">{{ session('success') }}</p>
                                        @endif
                                        @if(session()->has('error'))
                                            <p class="text-danger">{{ session('error') }}</p>
                                        @endif	
                                        <h4>{{ ucwords($doctor->fullName) }}'s Profile</h4>
                                        <p><b>Profile Reg. Date: {{ $doctor->created_at }}</b></p>
                                        @if(! ($doctor->created_at == $doctor->updated_at))
                                            <p><b>Profile Last Updation Date: {{ $doctor->updated_at }}</b></p>
                                        @endif                                        
                                        <hr />							
                                        <form role="form" action="{{ route('admin.doctor.edit',[$doctor->id,$doctor->fullName]) }}" method="POST"">
                                            @csrf
                                            <div class="form-group">
                                                <label for="DoctorSpecialization">
                                                    Doctor Specialization
                                                </label>
                                                <select value="{{ old('spec') ?? $doctor->specialization }}" name="spec" id="spec" class="form-control" required="true">
                                                    <option value = "{{ $doctor->specialization }}">{{ ucwords($doctor->specialization) }}</option>
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
                                                <input type="text" value = "{{ old('name') ?? $doctor->fullName }}" name="name" class="form-control"  placeholder="Enter Doctor Name" required="true">
                                                @error('name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="address">
                                                        Doctor Clinic Address
                                                </label>
                                                <textarea name="address" class="form-control"  placeholder="Enter Doctor Clinic Address" required="true">{{ old('address') ?? $doctor->address }}</textarea>
                                                @error('address')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="fess">
                                                        Doctor Consultancy Fees
                                                </label>
                                                <input  type="text" name="fee" class="form-control" value = "{{ old('fee') ?? $doctor->docFees }}" placeholder="Enter Doctor Consultancy Fees" required="true">
                                                @error('fee')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>	
                                            <div class="form-group">
                                                <label for="fess">
                                                        Doctor Contact no
                                                </label>
                                                <input type="text" name="contact" class="form-control"  value="{{ old('contact') ?? $doctor->contactno }}" placeholder="Enter Doctor Contact no" required="true">
                                                @error('contact')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="fess">
                                                        Doctor Email
                                                </label>
                                                <input type="email" id="email" name="email"  value = "{{ $doctor->user->email }}" class="form-control"  placeholder="Enter Doctor Email id" required="true" readonly>
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
</x-layouts.adminLayout>		

