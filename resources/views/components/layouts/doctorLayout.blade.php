
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
                        <li class = "{{ Request::is('doctor/dashboard') ? 'actived' : '' }}">
                            <a href="{{ route('doctor.dashboard') }}">
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
                        <li class = "{{ Request::is('doctor/appointment/history') ? 'actived' : '' }}">
                            <a href="{{ route('doctor.appointment.history') }}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-list text-primary"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> Appointment History </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="{{ Request::is('doctor/patient*') ? 'actived' : '' }}">
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
                                    <a href="{{ route('doctor.patient.add') }}">
                                        <span class="title"> Add Patient</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('doctor.patient.manage') }}">
                                        <span class="title"> Manage Patient </span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    <li>
                        <a href="{{ route('doctor.patient.search') }}">
                            <div class="item-content">
                                <div class="item-media">
                                    <i class="ti-search text-primary"></i>
                                </div>
                                <div class="item-inner">
                                    <span class="title"> Search </span>
                                </div>
                            </div>
                        </a>
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
                            <img src="{{ asset('assets/images/images.jpg') }}"> <span class="username">

                                {{ ucwords(Auth::user()->fullName) }}

                            <i class="ti-angle-down text-primary"></i></i></span>
                        </a>
				        <ul class="dropdown-menu dropdown-dark">
                            <li {{ Request::is('doctor/profile') ? 'active' : '' }}>
                                <a href="{{ route('doctor.profile') }}">
                                    My Profile
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('doctor.change.password') }}">
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

