<x-layouts.adminLayout>					
    <!-- end: TOP NAVBAR -->
    <div class="main-content" >
        <div class="wrap-content container" id="container">
            <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Admin | Manage Unread Queries</h1>
                                                        </div>
                    <ol class="breadcrumb">
                        <li>
                            <span>Admin</span>
                        </li>
                        <li class="active">
                            <span>Unread Queries</span>
                        </li>
                    </ol>
                </div>
            </section>
            <!-- end: PAGE TITLE -->
            <!-- start: BASIC EXAMPLE -->
            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-12">
                        @if(session()->has('error'))
                            <p class="text-danger">{{ session('error') }}</p>
                        @endif
                        <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Unread Queries</span></h5>
                        <table class="table table-hover" id="sample-table-1">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Name</th>
                                    <th class="hidden-xs">Email</th>
                                    <th>Contact No. </th>
                                    <th>Message </th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($queries as $query)
                                <tr>
                                    <td class="center">{{ $count++ }}</td>
                                    <td class="hidden-xs">{{ ucwords($query->fullName) }}</td>
                                    <td>{{ $query->email }}</td>
                                    <td>{{ $query->contactNo }}</td>
                                    <td>{{ $query->message }}</td>
                                    <td>
                                        <div class="visible-md visible-lg hidden-sm hidden-xs">
                                            <a href="{{ route('admin.query.open',$query->id) }}" class="btn btn-transparent btn-lg" title="View Details">View</i></a>
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
