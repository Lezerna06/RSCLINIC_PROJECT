<x-layouts.doctorLayout>

    <div class="main-content" >
        <div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Doctor | Manage Patients</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li>
                            <span>Doctor</span>
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
                        <form role="form" method="POST" action="{{ route('doctor.patient.search') }}">
                            @csrf
                            <div class="form-group">
                                <label for="doctorname">
                                    Search by Name/Mobile No.
                                </label>
                                <input type="text" name="search" id="searchdata" class="form-control" value="" required='true'>
                            </div>
                            <button type="submit" name="searchb" id="submit" class="btn btn-o btn-primary">
                                 Search
                            </button>
                        </form>
                        @if(isset($status))
                        <h4 align="center">Result against " {{ $input }} " keyword </h4>
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
                                    <td>{{ date('Y-m-d H:i',strtotime($patient->created_at)) }}</td>
                                    <td>{{ $patient->created_at == $patient->updated_at ? '' : date('Y-m-d H:i',strtotime($patient->updated_at)) }}</td>
                                    <td>
                                        <a href="{{ route('doctor.patient.edit', $patient->id) }}"><i>UDPATE</i></a> || <a href="{{ route('doctor.patient.view', $patient->id) }}"><i>VIEW</i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @if(!$status)
                                <tr>
                                    <td colspan="8"> No record found against this search</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.doctorLayout>
