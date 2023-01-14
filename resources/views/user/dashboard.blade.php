<x-layouts.userLayout>
    <div class="main-content" >
        <div class="wrap-content container" id="container">
            <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">User | Dashboard</h1>
                                                        </div>
                    <ol class="breadcrumb">
                        <li>
                            <span>User</span>
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
                                <h2 class="StepTitle">My Profile</h2>
                                
                                <p class="links cl-effect-1">
                                    <a href="{{ route('user.profile') }}">
                                        Update Profile
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-white no-radius text-center">
                            <div class="panel-body">
                                <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
                                <h2 class="StepTitle">My Appointments</h2>
                            
                                <p class="cl-effect-1">
                                    <a href="{{ route('user.appointment.history') }}">
                                        View Appointment History
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-white no-radius text-center">
                            <div class="panel-body">
                                <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
                                <h2 class="StepTitle"> Book My Appointment</h2>
                                
                                <p class="links cl-effect-1">
                                    <a href="{{ route('user.book.appointment') }}">
                                        Book Appointment
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        
        
            
            
        
            <!-- end: SELECT BOXES -->
            
        </div>
    </div>
</x-layouts.userLayout>