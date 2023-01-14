<x-layouts.doctorLayout>
    <div class="main-content" >
        <div class="wrap-content container" id="container">
            <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Doctor | Edit Profile</h1>
                                                        </div>
                    <ol class="breadcrumb">
                        <li>
                            <span>Doctor </span>
                        </li>
                        <li class="active">
                            <span>Edit Profile</span>
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
                                        <h4>{{ ucwords(Auth::user()->fullName) }}'s Profile</h4>
                                        <p><b>Profile Reg. Date: </b>{{ $profile->created_at }}</p>
                                        @if(! ($profile->created_at == $profile->updated_at))
                                            <p><b>Profile Last Updation Date: </b>{{ $profile->updated_at }}</p>
                                        @endif
                                        <hr />													
                                        <form role="form" action="{{ route('doctor.profile') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="DoctorSpecialization">
                                                    Doctor Specialization
                                                </label>
                                                <select value="{{ old('spec') ?? $profile->specialization }}" name="spec" id="spec" class="form-control" required="true">
                                                    <option value = "{{ $profile->specialization }}">{{ ucwords($profile->specialization) }}</option>
                                                    @foreach ($specs as $spec)
                                                        <option value="{{ $spec->specialization }}"> {{ ucwords($spec->specialization) }} </option>
                                                    @endforeach
                                                </select>
                                                @error('spec')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="fname">
                                                     Doctor Name
                                                </label>
                                                <input type="text" name="name" class="form-control" value="{{ old('name') ?? $profile->fullName }}" >
                                                @error('name')
                                                    <p class = "text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="address">
                                                    Doctor clinic address
                                                </label>
                                                <textarea name="address" class="form-control">{{ old('address') ?? $profile->address }}</textarea>
                                                @error('address')
                                                    <p class = "text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="fee">
                                                     Doctor Consultancy Fees
                                                </label>
                                                <input type="text" name="fee" class="form-control" required="required"  value="{{ old('fee') ?? ($profile->docFees) }}" >
                                                @error('fee')
                                                    <p class = "text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="contactno">
                                                     Doctor Contact no
                                                </label>
                                                <input type="text" name="contactno" class="form-control" required="required"  value="{{ old('contactno') ?? $profile->contactno }}" >
                                                @error('contactno')
                                                    <p class = "text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="fess">
                                                     Doctor Email
                                                </label>
                                                <input type="email" name="email" class="form-control"  readonly="readonly"  value="{{ Auth::user()->email }}">
                                            </div>

                                            <button type="submit" name="submit" class="btn btn-o btn-primary">
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
            
            <!-- end: BASIC EXAMPLE -->
            
        </div>
    </div>
</x-layouts.doctorLayout>