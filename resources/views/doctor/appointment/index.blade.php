<x-layouts.doctorLayout>
    <!-- end: TOP NAVBAR -->
    <div class="main-content" >
        <div class="wrap-content container" id="container">
            <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Doctor  | Appointment History</h1>
                                                        </div>
                    <ol class="breadcrumb">
                        <li>
                            <span>Doctor </span>
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
                                    <th class="hidden-xs">Patient  Name</th>
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
                                    <td class="hidden-xs">{{ ucwords($appointment->user->fullName) }}</td>
                                    <td>{{ $appointment->doctor->specialization }}</td>
                                    <td>{{ number_format($appointment->docFees,2) }}</td>
                                    <td>{{ $appointment->appointmentDate .' '. $appointment->appointmentTime }}</td>
                                    <td>{{ date('Y-m-d', strtotime($appointment->created_at)) }}</td>
                                    <td>@if($appointment->status == 0) Active @else {{ $appointment->status == 1 ? 'Canceled by Patient' : 'Canceled by you'  }}@endif</td>
                                    <td >
                                        @if($appointment->status == 0)
                                        <div class="visible-md visible-lg hidden-sm hidden-xs">                 
                                            <a href="{{ route('doctor.appointment.cancel', $appointment->id) }}" onClick="return confirm('Are you sure you want to cancel this appointment ?')"class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
                                        </div>
                                        @else
                                            Canceled
                                        @endif
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
</x-layouts.doctorLayout>					
		