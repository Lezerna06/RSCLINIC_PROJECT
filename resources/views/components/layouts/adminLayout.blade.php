<x-layouts.mainLayout>
    <x-slot:sidebar>
        <div class="sidebar app-aside" id="sidebar">
            <div class="sidebar-container perfect-scrollbar">
                <nav>
                    <!-- start: MAIN NAVIGATION MENU -->
                    <div class="navbar-title">
                        <span>Main Navigation</span>
                    </div>
                    <ul class="main-navigation-menu">
                        <li class = "{{ Request::is('admin/dashboard') ? 'actived' : '' }}">
                            <a href="{{ route('admin.dashboard') }}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-home text-primary"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Dashboard </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/doctor*') ? 'actived' : ''}}">
                            <a href="javascript:void(0)">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-user text-primary"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Doctors </span><i class="icon-arrow"></i>
                                    </div>
                                </div>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ route('admin.specialization.add') }}">
                                        <span class="title"> Doctor Specialization </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.doctor.add') }}">
                                        <span class="title"> Add Doctor</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.doctor.manage') }}">
                                        <span class="title"> Manage Doctors </span>
                                    </a>
                                </li>                                
                            </ul>
                        </li>
                        <li class="{{ Request::is('admin/manage/user*') ? 'actived' : ''}}">
                            <a href="javascript:void(0)">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-user text-primary"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Users </span><i class="icon-arrow"></i>
                                    </div>
                                </div>
                            </a>
                            <ul class="sub-menu">
                                
                                <li>
                                    <a href="{{ route('admin.user.manage') }}">
                                        <span class="title"> Manage Users </span>
                                    </a>
                                </li>
                                
                            </ul>
                            </li>
                            <li class = "{{ Request::is('admin/medical/history') ? 'actived' : '' }}">
                            <a href="javascript:void(0)">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-user text-primary"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Patients </span><i class="icon-arrow"></i>
                                    </div>
                                </div>
                            </a>
                            <ul class="sub-menu">
                                
                                <li>
                                    <a href="{{ route('admin.medical.history') }}">
                                        <span class="title"> Manage Patients </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>	
                        <li class="{{ Request::is('admin/view/appointment') ? 'actived' : ''}}">
                            <a href="{{ route('admin.view.appointment') }}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-file text-primary"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Appointment History </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/queries*') ? 'actived' : ''}}">
                            <a href="javascript:void(0)">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-files text-primary"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Contact Queries </span><i class="icon-arrow"></i>
                                    </div>
                                </div>
                            </a>
                            <ul class="sub-menu">
                                
                                <li>
                                    <a href="{{ route('admin.query.unread') }}">
                                        <span class="title"> Unread Query </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('admin.query.read') }}">
                                        <span class="title"> Read Query </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class = "{{ Request::is('admin/log/doctor') ? 'actived' : ''}}">
                            <a href="{{ route('admin.log.show',"doctor") }}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-list text-primary"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Doctor Session Logs </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class = "{{ Request::is('admin/log/user') ? 'actived' : ''}}">
                            <a href="{{ route('admin.log.show',"user") }}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-list text-primary"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> User Session Logs </span>
                                    </div>
                                </div>
                            </a>
                        </li>						
                        <li class = "{{ Request::is('admin/reports') ? 'actived' : ''}}">
                            <a href="javascript:void(0)">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-files text-primary"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Reports </span><i class="icon-arrow"></i>
                                    </div>
                                </div>
                            </a>
                            <ul class="sub-menu">                                
                                <li>
                                    <a href="{{ route('admin.report.show') }}">
                                        <span class="title">B/w dates reports </span>
                                    </a>
                                </li>                       
                            </ul>
                            <li class = "{{ Request::is('admin/search*') ? 'actived' : ''}}">
                                <a href="{{ route('admin.search') }}">
                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="ti-search text-primary"></i>
                                        </div>
                                        <div class="item-inner">
                                            <span class="title"> Patient Search </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </li>
                    </ul>
                    <!-- end: CORE FEATURES -->
                </nav>
            </div>
        </div>
    </x-slot>

    <x-slot:header>
        <header class="navbar navbar-default navbar-static-top">
            <!-- start: NAVBAR HEADER -->
            <div class="navbar-header">
                <a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
                    <i class="ti-align-justify text-primary"></i>
                </a>
                <a class="navbar-brand" href="#">
                    <h2 style="padding-top:20% ">R.S</h2>
                </a>
                <a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
                    <i class="ti-align-justify text-primary"></i>
                </a>
                <a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="ti-view-grid text-primary"></i>
                </a>
            </div>
            <!-- end: NAVBAR HEADER -->
            <!-- start: NAVBAR COLLAPSE -->
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-right">
                    <!-- start: MESSAGES DROPDOWN -->
                    <li  style="padding-top:2% ">
                        <h2>R.S Family Optical</h2>
                    </li>
                    <li class="dropdown current-user">
                        <a href class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('assets/images/images2.png') }}"> <span class="username">

                                {{ ucwords(Auth::user()->username) }}

                            <i class="ti-angle-down text-primary"></i></i></span>
                        </a>
				        <ul class="dropdown-menu dropdown-dark">                        
                            <li>
                                <a href="{{ route('admin.change.password') }}">
                                    Change Password
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}">
                                    Log Out
                                </a>
                            </li>
                        </ul>
					</li>
                    <!-- end: USER OPTIONS DROPDOWN -->
                </ul>
                <!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
                <div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
                    <div class="arrow-left"></div>
                    <div class="arrow-right"></div>
                </div>
                <!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
            </div>
				
					
            <!-- end: NAVBAR COLLAPSE -->
        </header>

    </x-slot>

    {{ $slot }}

    <x-slot:script>
        {{ $script ?? '' }}
    </x-slot>
</x-layouts.mainLayout>

