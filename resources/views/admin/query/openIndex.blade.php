<x-layouts.adminLayout>
    <!-- end: TOP NAVBAR -->
    <div class="main-content" >
        <div class="wrap-content container" id="container">
            <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Admin | Query Details</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li>
                            <span>Admin</span>
                        </li>
                        <li class="active">
                            <span>Query Details</span>
                        </li>
                    </ol>
                </div>
            </section>
            <!-- end: PAGE TITLE -->
            <!-- start: BASIC EXAMPLE -->
            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Query Details</span></h5>
                        <table class="table table-hover" id="sample-table-1">		
                            <tbody>
                                <tr>
                                    <th>Full Name</th>
                                    <td>{{ ucwords($query->fullName) }}</td>
                                </tr>

                                <tr>
                                    <th>Email Id</th>
                                    <td>{{ $query->email }}</td>
                                </tr>
                                <tr>
                                    <th>Conatact Numner</th>
                                    <td>{{ $query->contactNo }}</td>
                                </tr>
                                <tr>
                                    <th>Message</th>
                                    <td>{{ $query->message }}</td>
                                </tr>
                                @if($query->isRead == 0)
                                <form action="{{ route('admin.query.open',$query->id) }}" method="POST">
                                    @csrf
                                <tr>
                                    <th>Admin Remark</th>
                                    <td><textarea name="adminremark" class="form-control" required="true"></textarea></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>	
                                        <button type="submit" class="btn btn-primary pull-left" name="update">
                                                Update <i class="fa fa-arrow-circle-right"></i>
                                        </button>
                                    </td>
                                </tr>
                                </form>	
                                @else 
                                <tr>
                                    <th>Admin Remark</th>
                                    <td>{{ $query->adminRemark }}</td>
                                </tr>

                                <tr>
                                    <th>Last Updatation Date</th>
                                    <td>{{ date('Y-m-d', strtotime($query->updated_at)) }}</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.adminLayout>	