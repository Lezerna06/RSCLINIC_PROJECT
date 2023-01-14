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
                        <span>Manage Patients</span>
                        </li>
                    </ol>
                </div>
            </section>
            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-12">
                        @if(session()->has('success'))
                            <p class="text-success">{{ session('success') }}</p>
                        @endif
                        @if(session()->has('error'))
                            <p class="text-danger">{{ session('error') }}</p>
                        @endif	
                        @if($errors->any())	
                            <p class="text-danger">Please Fill out all the inputs</p>
                        @endif
                        <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Patients</span></h5>
                        <table border="1" class="table table-bordered">
                            <tr align="center">
                            <td colspan="4" style="font-size:20px;color:blue">
                            Patient Details</td></tr>

                            <tr>
                                <th scope>Patient Name</th>
                                <td>{{ ucwords($patient->fullName) }}</td>
                                <th scope>Patient Email</th>
                                <td>{{ $patient->user_email }}</td>
                            </tr>
                            <tr>
                                <th scope>Patient Mobile Number</th>
                                <td>{{ $patient->contactno }}</td>
                                <th>Patient Address</th>
                                <td>{{ ucwords($patient->address) }}</td>
                            </tr>
                                <tr>
                                <th>Patient Gender</th>
                                <td>{{ ucwords($patient->gender) }}</td>
                                <th>Patient Age</th>
                                <td>{{ $patient->age }}</td>
                            </tr>
                            <tr>
                                
                                <th>Patient Medical History(if any)</th>
                                <td>{{ $patient->medhistory }}</td>
                                <th>Patient Reg Date</th>
                                <td>{{ date('Y-m-d H:i', strtotime($patient->created_at)) }}</td>
                            </tr>
                        
                        </table>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <tr align="center">
                                <th colspan="10" >Medical History</th> 
                                <h1 class="title">Rx</h1>
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

                        <p align="center">                            
                        <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Add Medical History</button></p>  

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Medical History</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>   
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-bordered table-hover data-tables">
                                            <form method="POST" action="{{ route('doctor.patient.view',$patient->id) }}">
                                                @csrf
                                            <tr>
                                                <th>OD :</th>
                                                <td>
                                                <input name="od" placeholder="OD" class="form-control wd-450" required="true"></td>
                                            </tr>                          
                                            <tr>
                                                <th>OS :</th>
                                                <td>
                                                <input name="os" placeholder="OS" class="form-control wd-450" required="true"></td>
                                            </tr> 
                                            <tr>
                                                <th>R :</th>
                                                <td>
                                                <input name="r" placeholder="R" class="form-control wd-450" required="true"></td>
                                            </tr>
                                            <tr>
                                                <th>L :</th>
                                                <td>
                                                <input name="l" placeholder="L" class="form-control wd-450" required="true"></td>
                                            </tr>
                                            <th>PD :</th>
                                                <td>
                                                <input name="pd" placeholder="PD" class="form-control wd-450" required="true"></td>
                                            </tr> 
                                            <tr>
                                                <th>TINT :</th>
                                                <td>
                                                <input name="tint" placeholder="TINT" class="form-control wd-450" required="true"></td>
                                            </tr>
                                            <tr>
                                                <th>LENS :</th>
                                                <td>
                                                <input name="lens" placeholder="LENS" class="form-control wd-450" required="true"></td>
                                            </tr>
                                                                    
                                                <tr>
                                                <th>Prescription :</th>
                                                <td>
                                                <textarea name="pres" placeholder="Medical Prescription" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
                                            </tr>  
   
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.doctorLayout>