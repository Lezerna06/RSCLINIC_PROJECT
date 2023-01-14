<x-layouts.indexLayout>
    @if(session()->has('success'))
        <x-alertmessage.alert class="__alertMessage">
            <p>{{ session('success') }}</p>  
        </x-alertmessage.alert>
    @endif
    @if(session()->has('error'))
        <x-alertmessage.alert class="__alertErrorMessage">
            <p>{{ session('error') }}</p>  
        </x-alertmessage.alert>
    @endif
    {{-- <x-clear_div/> --}}
    <x-guest.image_slider />

    <div class="content-grids">
        <div class="wrap">
            <div class="section group"> 

                <x-guest.listview>  
                    <h3>Patients</h3>
                    <p>Register & Book Appointment</p>
                    @slot("listimage")
                        <img src="images/grid-img3.png">
                    @endslot 
                    @slot("listbutton")
                        <div class="button"><span><a href="/login/user">Click Here</a></span></div>
                    @endslot     
                </x-guest.listview>
                
                <x-guest.listview>  
                    <h3>Doctors Login</h3>
                    @slot("listimage")
                        <img src="images/grid-img1.png">
                    @endslot 
                    @slot("listbutton")
                        <div class="button"><span><a href="/login/doctor">Click Here</a></span></div>
                    @endslot     
                </x-guest.listview>

                <x-guest.listview>  
                    <h3>Admin Login</h3>
                    @slot("listimage")
                        <img src="images/grid-img2.png">
                    @endslot 
                    @slot("listbutton")
                        <div class="button"><span><a href="/login/admin">Click Here</a></span></div>
                    @endslot     
                </x-guest.listview>
	
            </div>
        </div>
   </div>

</x-layouts.indexLayout>