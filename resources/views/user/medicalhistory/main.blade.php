<x-layouts.userLayout>
    <div class="main-content" >
        <div class="wrap-content container" id="container">
                            <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Users | Medical History</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li>
                            <span>Users</span>
                        </li>
                        <li class="active">
                            <span>View Medical History</span>
                        </li>
                    </ol>
                </div>
            </section>
            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="over-title margin-bottom-15">View <span class="text-bold">Medical History</span></h5>
                        <table class="table table-hover" id="sample-table-1">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Patient Name</th>
                                    <th>Patient Contact Number</th>
                                    <th>Patient Gender </th>
                                    <th>Creation Date </th>
                                    <th>Updation Date </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($patients as $patient)
                                <tr>                                    
                                    <td class="center">{{ $count++ }}</td>
                                    <td class="hidden-xs">{{ ucwords($patient->fullName) }}</td>
                                    <td>{{ $patient->contactno }}</td>
                                    <td>{{ $patient->gender }}</td>
                                    <td>{{ date('Y-m-d H:i', strtotime($patient->created_at)) }}</td>
                                    <td>{{ $patient->created_at == $patient->updated_at ? '' : date('Y-m-d H:i',strtotime($patient->updated_at)) }}</td>
                                    <td><a href="{{ route('user.medical.history.view', $patient->id) }}">View</i></a></td>                                    
                                </tr>   
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.userLayout>