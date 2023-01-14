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
                            <span>Medical History</span>
                        </li>
                    </ol>
                </div>
            </section>

                <div class="container-fluid container-fullw bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="over-title margin-bottom-15">Users <span class="text-bold">Medical History</span></h5>

                            <table border="1" class="table table-bordered">
                                <tr align="center">
                                    <td colspan="4" style="font-size:20px;color:blue">Patient Details</td>
                                </tr>
                                <tr>
                                    <th scope>Patient Name</th>
                                    <td>{{ $patient->fullName }}</td>
                                    <th scope>Patient Email</th>
                                    <td>{{ $patient->user_email }}</td>
                                </tr>
                                <tr>
                                    <th scope>Patient Mobile Number</th>
                                    <td>{{ $patient->contactno }}</td>
                                    <th>Patient Address</th>
                                    <td>{{ $patient->address }}</td>
                                </tr>
                                <tr>
                                    <th>Patient Gender</th>
                                    <td>{{ $patient->gender }}</td>
                                    <th>Patient Age</th>
                                    <td>{{ $patient->age  }}</td>
                                </tr>
                                <tr>
                                    <th>Patient Medical History(if any)</th>
                                    <td>{{ $patient->medhistory }}</td>
                                    <th>Patient Reg Date</th>
                                    <td>{{ date('Y-m-d', strtotime($patient->created_at)) }}</td>
                                </tr>
                            </table>


                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <tr align="center">
                                    <th colspan="10" >Medical History</th>
                                </tr>
                                <tr>
                                    <th>#</th>
                                    <th>OD</th>
                                    <th>OS</th>
                                    <th>R</th>
                                    <th>L</th>
                                    <th>PD</th>
                                    <th>TINT</th>
                                    <th>LENS</th>
                                    <th>Medical Prescription</th>
                                    <th>Visit Date</th>
                                </tr>
                                @foreach($history as $med)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $med->od }}</td>
                                    <td>{{ $med->os }}</td>
                                    <td>{{ $med->r }}</td>
                                    <td>{{ $med->l }}</td>
                                    <td>{{ $med->pd }}</td>
                                    <td>{{ $med->tint }}</td>
                                    <td>{{ $med->lens }}</td>
                                    <td>{{ $med->medicalpres }}</td>
                                    <td>{{ date('Y-m-d H:i', strtotime($med->created_at)) }}</td>
                                </tr>
                                @endforeach
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.userLayout>
