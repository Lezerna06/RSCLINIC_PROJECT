<x-layouts.doctorLayout>					
    <div class="main-content" >
        <div class="wrap-content container" id="container">
                                <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Patient | Edit Patient</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li>
                            <span>Patient</span>
                        </li>
                        <li class="active">
                            <span>Edit Patient</span>
                        </li>
                    </ol>
                </div>
            </section>
            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-12">
                        @if(session()->has('success'))
                            <p class="text-success">{{ session('success') }}</p>
                        @endif
                        @if(session()->has('error'))
                            <p class="text-danger">{{ session('error') }}</p>
                        @endif		
                        <div class="row margin-top-30">
                            <div class="col-lg-8 col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">Edit Patient</h5>
                                    </div>
                                    <div class="panel-body">	
                                        <form role="form" action="{{ route('doctor.patient.edit',$patient->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="doctorname">
                                                Patient Name
                                                </label>
                                                <input type="text" name="name" class="form-control"  placeholder="Enter Patient Name" required="true" value="{{ old('name') ?? $patient->fullName }}">
                                                @error('name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="fess">
                                                Patient Contact no
                                                </label>
                                                <input type="text" name="contact" class="form-control"  placeholder="Enter Patient Contact no" required="true" maxlength="11" pattern="[0-9]+" value="{{ old('contact') ?? $patient->contactno}}">
                                                @error('contact')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="fess">
                                                Patient Email
                                                </label>
                                                <input type="email" id="email" name="email" class="form-control"  placeholder="Enter Patient Email id" required="true" readonly value="{{ $patient->user_email }}">
                                                @error('email')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">
                                                Gender:
                                                </label>
                                                    <input type="radio" id="rg-female" name="gender" value="female" {{ $patient->gender == 'female' ? 'checked' : ''}}>
                                                    <label for="rg-female">Female</label>
                                                    <input type="radio" id="rg-male" name="gender" value="male" {{ $patient->gender == 'male' ? 'checked' : ''}}>
                                                    <label for="rg-male">Male</label>
                                                @error('gender')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="address">
                                                Patient Address
                                                </label>
                                                <textarea name="address" class="form-control"  placeholder="Enter Patient Address" required="true" >{{ old('address') ?? $patient->address }}</textarea>
                                                @error('address')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="fess">
                                                Patient Age
                                                </label>
                                                <input type="text" name="age" class="form-control"  placeholder="Enter Patient Age" required="true" value="{{ old('age') ?? $patient->age }}">
                                                @error('age')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="fess">
                                                Medical History
                                                </label>
                                                <textarea type="text" name="medhis" class="form-control"  placeholder="Enter Patient Medical History(if any)" required="true" ">{{ old('medhis') ?? $patient->medhistory }}</textarea>
                                                @error('medhis')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>	
                                            <div class="form-group">
                                                <label for="fess">
                                                Creation Date
                                                </label>
                                                <input type="text" name="cdate" class="form-control" value = "{{ date('Y-m-d H:i', strtotime($patient->created_at)) }}" readonly/>
                                                @error('medhis')
                                                    <p class="text-danger">{{ $message }}</p>
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
</x-layouts.doctorLayout>