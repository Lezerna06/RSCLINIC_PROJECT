<x-layouts.adminLayout>
    <div class="main-content" >
        <div class="wrap-content container" id="container">
            <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Admin | Dashboard</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li>
                            <span>Admin</span>
                        </li>
                        <li class="active">
                            <span>Dashboard</span>
                        </li>
                    </ol>
                </div>
            </section>
            <!-- end: PAGE TITLE -->
            <!-- start: BASIC EXAMPLE -->
            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="panel panel-white no-radius text-center">
                            <div class="panel-body">
                                <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
                                <h2 class="StepTitle">Manage Users</h2>
                                
                                <p class="links cl-effect-1">
                                    <a href="{{ route('admin.user.manage') }}">
                                        Total Users : {{ $user }}	 
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-white no-radius text-center">
                            <div class="panel-body">
                                <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
                                <h2 class="StepTitle">Manage Doctors</h2>                                
                                <p class="cl-effect-1">
                                    <a href="{{ route('admin.doctor.manage') }}">                                        
                                        Total Doctors : {{ $doctor }}		
                                    </a>                                    
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-white no-radius text-center">
                            <div class="panel-body">
                                <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> 
                                </span>
                                <h2 class="StepTitle"> Appointments</h2>
                                
                                <p class="links cl-effect-1">
                                    <a href="book-appointment.php">
                                        <a href="{{ route('admin.view.appointment') }}">                                
                                            Total Appointments : {{ $appointment }}	
                                        </a>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="panel panel-white no-radius text-center">
                            <div class="panel-body">
                                <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> 
                                </span>
                                <h2 class="StepTitle">Manage Patients</h2>
                                <p class="links cl-effect-1">
                                    <a href="{{ route('admin.medical.history') }}">
                                        Total Patients : {{ $patient }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-white no-radius text-center">
                            <div class="panel-body">
                                <span class="fa-stack fa-2x"> <i class="ti-files fa-1x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
                                <h2 class="StepTitle"> New Queries</h2>                                    
                                <p class="links cl-effect-1">
                                    <a href="book-appointment.php">
                                        <a href="{{ route('admin.query.unread') }}">
                                            Total New Queries :	{{ $query }}
                                        </a>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>

</x-layouts.adminLayout>