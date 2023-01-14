<x-layouts.adminLayout>
    <!-- end: TOP NAVBAR -->
    <div class="main-content" >
        <div class="wrap-content container" id="container">
            <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Admin | Edit Doctor Specialization</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li>
                            <span>Admin</span>
                        </li>
                        <li class="active">
                            <span>Edit Doctor Specialization</span>
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
                            <div class="col-lg-6 col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">Edit Doctor Specialization</h5>
                                    </div>
                                    <div class="panel-body">
                                        @if(session()->has('success'))
                                            <p class="text-success">{{ session('success') }}</p>
                                        @endif
                                        @if(session()->has('error'))
                                            <p class="text-danger">{{ session('error') }}</p>
                                        @endif
                                        <form role="form" action="{{ route('admin.specialization.edit',[$spec->id, $spec->specialization]) }}" method="POST" >
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">
                                                    Edit Doctor Specialization
                                                </label>									
                                                <input type="text" name="nspec" class="form-control" value="{{ old('nspec') ?? $spec->specialization }}"/ > 
                                                @error('nspec')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror                                                         
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
        </div>
    </div>
  
</x-layouts.adminLayout>	
