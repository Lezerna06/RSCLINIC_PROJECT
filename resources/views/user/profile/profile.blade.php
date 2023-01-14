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
                                        <form role="form" action="{{ route('user.profile') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="fname">
                                                     Full Name
                                                </label>
                                                <input type="text" name="name" class="form-control" value="{{ old('name') ?? Auth::user()->fullName }}" >
                                                @error('name')
                                                    <p class = "text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="address">
                                                     Address
                                                </label>
                                                <textarea name="address" class="form-control">{{ old('address') ?? $profile->address }}</textarea>
                                                @error('address')
                                                    <p class = "text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="city">
                                                     City
                                                </label>
                                                <input type="text" name="city" class="form-control" required="required"  value="{{ old('city') ?? $profile->city }}" >
                                                @error('city')
                                                    <p class = "text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">
                                                    Gender
                                                </label>
                                                <select name="gender" class="form-control" required="required" >
                                                    <option value="{{ old('gender') ?? $profile->gender }}" selected>{{ ucwords(old('gender') ?? $profile->gender) }}</option>	
                                                    <option value="{{ strtolower(old('gender') ?? $profile->gender) == "male" ? 'female' : 'male' }}" >{{ strtolower(old('gender') ?? $profile->gender) == "male" ? 'Female' : 'Male' }}</option>		
                                                </select>   
                                                @error('gender')
                                                    <p class = "text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="fess">
                                                     User Email
                                                </label>
                                                <input type="email" name="email" class="form-control"  readonly="readonly"  value="{{ Auth::user()->email }}">
                                                <a href="{{ route('user.change.email') }}">Update your email id</a>
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
</x-layouts.userLayout>