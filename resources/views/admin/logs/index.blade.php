<x-layouts.adminLayout>
    <!-- end: TOP NAVBAR -->
    <div class="main-content" >
        <div class="wrap-content container" id="container">
            <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Admin  | {{ $res===3?'User':'Doctor' }} Session Logs</h1>
                                                        </div>
                    <ol class="breadcrumb">
                        <li>
                            <span>Admin </span>
                        </li>
                        <li class="active">
                            <span>{{ $res===3?'User':'Doctor' }} Session Logs</span>
                        </li>
                    </ol>
                </div>
            </section>
            <!-- end: PAGE TITLE -->
            <!-- start: BASIC EXAMPLE -->
            <div class="container-fluid container-fullw bg-white">	
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover" id="sample-table-1">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th class="hidden-xs">User id</th>
                                    <th>Email</th>
                                    <th>User IP</th>
                                    <th>Login time</th>
                                    <th>Logout Time </th>
                                    <th> Status </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($logs as $log)
                                <tr>
                                    <td class="center">{{ $count++ }}</td>
                                    <td class="hidden-xs">{{ $log->user_id }}</td>
                                    <td class="hidden-xs">{{ $log->email }}</td>
                                    <td>{{ $log->ip }}</td>
                                    <td>{{ date('Y-m-d H:i', strtotime($log->created_at)) }}</td>
                                    <td>{{ date('Y-m-d H:i', strtotime($log->updated_at)) }}</td>
                                    <td>{{ $log->status ? 'Success': 'Failed' }}</td>
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
