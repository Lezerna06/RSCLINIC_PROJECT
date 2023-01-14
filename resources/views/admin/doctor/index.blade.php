<x-layouts.adminLayout>			
    <!-- end: TOP NAVBAR -->
    <div class="main-content" >
        <div class="wrap-content container" id="container">
            <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Admin | Manage Doctors</h1>
                                                        </div>
                    <ol class="breadcrumb">
                        <li>
                            <span>Admin</span>
                        </li>
                        <li class="active">
                            <span>Manage Doctors</span>
                        </li>
                    </ol>
                </div>
            </section>
            <!-- end: PAGE TITLE -->
            <!-- start: BASIC EXAMPLE -->
            <div class="container-fluid container-fullw bg-white">	
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Doctors</span></h5>
                        @if(session()->has('success'))
                            <p class="text-success">{{ session('success') }}</p>
                        @endif
                        @if(session()->has('error'))
                            <p class="text-danger">{{ session('error') }}</p>
                        @endif								
                        <table class="table table-hover" id="sample-table-1">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Specialization</th>
                                    <th class="hidden-xs">Doctor Name</th>
                                    <th>Creation Date </th>
                                    <th>Action</th>
                                </tr>
							</thead>
							<tbody>
                                @foreach($doctors as $doctor)
                                <tr>
                                    <td class="center">{{ $count++ }}</td>
                                    <td class="hidden-xs">{{ $doctor->specialization }}</td>
                                    <td>{{ $doctor->fullName }}</td>
                                    <td>{{ date('Y-m-d', strtotime($doctor->created_at)) }}</td>
                                    <td >
                                        <div class="visible-md visible-lg hidden-sm hidden-xs">
                                            <a href="{{ route('admin.doctor.edit',[$doctor->id, $doctor->fullName]) }}" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit">Update</i></a>                                        
	                                        <a href="{{ route('admin.doctor.delete',[$doctor->id, $doctor->fullName]) }}" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove">Delete</i></a>
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
					
</x-layouts.adminLayout>