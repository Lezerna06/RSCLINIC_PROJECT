<x-layouts.adminLayout>
    <div class="main-content" >
        <div class="wrap-content container" id="container">
                                <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Admin | View Patients</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li>
                            <span>Admin</span>
                        </li>
                        <li class="active">
                            <span>View Patients</span>
                        </li>
                    </ol>
                </div>
            </section>
            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="tittle-w3-agileits mb-4">Between dates reports</h4>
                        <h5 align="center" style="color:blue">Report from {{ date('Y-m-d',strtotime($start)) }} to {{ date('Y-m-d',strtotime($end)) }}</h5>
	
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
                                    <td class="hidden-xs">{{ $patient->fullName }}</td>
                                    <td>{{ $patient->contactno }}</td>
                                    <td>{{ $patient->gender }}</td>
                                    <td>{{ date('Y-m-d H:i', strtotime($patient->created_at)) }}</td>
                                    <td>{{ $patient->created_at == $patient->updated_at ? '' : date('Y-m-d H:i',strtotime($patient->updated_at)) }}</td>
                                    <td>
                                        <a href="{{ route('admin.medical.history.view',$patient->id) }}"><i class="fa fa-eye"></i></a>
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