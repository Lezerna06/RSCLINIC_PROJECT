<x-layouts.adminLayout>
    <!-- end: TOP NAVBAR -->
    <div class="main-content" >
        <div class="wrap-content container" id="container">
            <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Patients  | Appointment History</h1>
                                                        </div>
                    <ol class="breadcrumb">
                        <li>
                            <span>Patients</span>
                        </li>
                        <li class="active">
                            <span>Appointment History</span>
                        </li>
                    </ol>
                </div>
            </section>
            <!-- end: PAGE TITLE -->
            <!-- start: BASIC EXAMPLE -->
            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-12">
                        <p style="color:red;"></p>	
                        <table class="table table-hover" id="sample-table-1">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th class="hidden-xs">Doctor Name</th>
                                    <th>Patient Name</th>
                                    <th>Specialization</th>
                                    <th>Consultancy Fee</th>
                                    <th>Appointment Date / Time </th>
                                    <th>Appointment Creation Date  </th>
                                    <th>Current Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                <tr>
                                    <td class="center">{{ $count++ }}</td>
                                    <td class="hidden-xs">{{ ucwords($appointment->doctor->fullName) }}</td>
                                    <td class="hidden-xs">{{ ucwords($appointment->user->fullName) }}</td>
                                    <td>{{ ucwords($appointment->doctor->specialization) }}</td>
                                    <td>{{ number_format($appointment->docFees) }}</td>
                                    <td>{{ date('Y-m-d', strtotime($appointment->appointmentDate)) . ' ' .$appointment->appointmentTime }}</td>
                                    <td>{{ date('y-m-d', strtotime($appointment->created_at)) }}</td>
                                    <td>@if($appointment->status == 0) Active @else {{ $appointment->status == 1 ? 'Canceled by Patient' : 'Canceled by Doctor' }} @endif</td>
                                    <td >
                                        <div class="visible-md visible-lg hidden-sm hidden-xs"> 
                                            {{  $appointment->status == 0 ? 'No action yet' : 'Canceled' }}                 
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

