<x-layouts.adminLayout>
    <!-- end: TOP NAVBAR -->
    <div class="main-content" >
        <div class="wrap-content container" id="container">
            <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Admin | Manage Users</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li>
                            <span>Admin</span>
                        </li>
                        <li class="active">
                            <span>Manage Users</span>
                        </li>
                    </ol>
                </div>
            </section>
            <!-- end: PAGE TITLE -->
            <!-- start: BASIC EXAMPLE -->
            <div class="container-fluid container-fullw bg-white">				
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Users</span></h5>
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
                                    <th>Full Name</th>
                                    <th class="hidden-xs">Address</th>
                                    <th>City</th>
                                    <th>Gender </th>
                                    <th>Email </th>
                                    <th>Creation Date </th>
                                    <th>Updation Date </th>
                                    <th>Action</th>												
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td class="center">{{ $count++ }}</td>
                                    <td class="hidden-xs">{{ $user->fullName }}</td>
                                    <td>{{ $user->userdata->address }}</td>
                                    <td>{{ $user->userdata->city }}</td>
                                    <td>{{ $user->userdata->gender }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ date('Y-m-d H:i', strtotime($user->userdata->created_at)) }}</td>
                                    <td>{{ $user->userdata->created_at == $user->userdata->updated_at ? '' : date('Y-m-d H:i',strtotime($user->userdata->updated_at)) }}</td>
                                    <td >
                                        <div class="visible-md visible-lg hidden-sm hidden-xs">						
                                            <a href="{{ route('admin.user.destroy', $user->id) }}" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove">Delete</i></a>
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