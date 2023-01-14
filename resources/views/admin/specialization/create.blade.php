<x-layouts.adminLayout>					
				<!-- end: TOP NAVBAR -->
    <div class="main-content" >
        <div class="wrap-content container" id="container">
            <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Admin | Add Doctor Specialization</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li>
                            <span>Admin</span>
                        </li>
                        <li class="active">
                            <span>Add Doctor Specialization</span>
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
                                        <h5 class="panel-title">Doctor Specialization</h5>
                                    </div>
                                    <div class="panel-body">
                                        @if(session()->has('success'))
                                            <p class="text-success">{{ session('success') }}</p>
                                        @endif
                                        @if(session()->has('error'))
                                            <p class="text-danger">{{ session('error') }}</p>
                                        @endif
                                        <form role="form" action="{{ route('admin.specialization.add') }}" method="POST" >
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">
                                                    Doctor Specialization
                                                </label>
                                                <input type="text" name="spec" class="form-control"  placeholder="Enter Doctor Specialization">
                                                @error('spec')
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
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-white">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Doctor's Specialization</span></h5>									
                        <table class="table table-hover" id="sample-table-1">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Specialization</th>
                                    <th class="hidden-xs">Creation Date</th>
                                    <th>Updation Date</th>
                                    <th>Action</th>												
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($specializations as $spec)
                                <tr>
                                    <td class="center">{{ $count++ }}</td>
                                    <td class="hidden-xs">{{ ucwords($spec->specialization) }}</td>
                                    <td>{{ date('Y-m-d H:i', strtotime($spec->created_at)) }}</td>
                                    <td>{{ $spec->created_at == $spec->updated_at ? '' : date('Y-m-d H:i',strtotime($spec->updated_at)) }}</td>
                                    <td >
                                        <div class="visible-md visible-lg hidden-sm hidden-xs">
                                            <a href="{{ route('admin.specialization.edit',[$spec->id,$spec->specialization]) }}" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit">Update</i></a>													
                                            <a href="{{ route('admin.specialization.delete',[$spec->id,$spec->specialization]) }}" onClick="return confirm('Are you sure you want to delete {{ $spec->specialization }}?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove">Delete</i></a>
                                        </div>
                                        <div class="visible-xs visible-sm hidden-md hidden-lg">
                                            <div class="btn-group" dropdown is-open="status.isopen">
                                                <button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
                                                    <i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu pull-right dropdown-light" role="menu">
                                                    <li>
                                                        <a href="#">
                                                            Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            Share
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            Remove
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
						<!-- end: BASIC EXAMPLE -->
						<!-- end: SELECT BOXES -->						
		</div>
	</div>
</x-layouts.adminLayout>	
			
