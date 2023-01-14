
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
    

    <div class="wrap">
        <div class="contact">
            <div class="section group">				
                <div class="col span_1_of_3">
            
                    <div class="company_address">
                        <h2>Clinic Address  :</h2>
                        <p>Montellano Bldg., J. Luna St. </p>
                        <p>San Vicente Cetral, Calapan</p>
                        <p>Philippines</p>
                        <p>Tel: (043) 441-3257</p>
                        <p>Phone:0946-596-2139</p>
                        <p>Email: <span>rsfamily.optical@gmail.com</span></p>
            
                    </div>
                </div>				
                <div class="col span_2_of_3">
                    <div class="contact-form">
                        <h2>Contact Us</h2>
                        <form method="POST" action="/contactus">
                            @csrf
                            <div>
                                <span><label>NAME</label></span>
                                <span><input type="text" name="fullname" required="true" value="{{ old('fullname') }}"></span>
                                @error('fullname')
                                    <p class = "errorMessage">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <span><label>E-MAIL</label></span>
                                <span><input type="email" name="email" required="true" value="{{ old('email') }}"></span>
                                @error('email')
                                    <p class = "errorMessage">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <span><label>MOBILE.NO</label></span>
                                <span><input type="text" name="mobileno" required="true" value="{{ old('mobileno') }}"></span>
                                @error('mobileno')
                                    <p class = "errorMessage">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>   
                                <span><label>Description</label></span>
                                <span><textarea name="description">{{ old('description') }} </textarea></span>
                                @error('description')
                                    <p class = "errorMessage">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <span><input type="submit" name="submit" value="Submit"></span>
                            </div>
                        </form>
                    </div>
                </div>				
            </div>
            <div class="clear"> </div>
        </div>
    </div>

</x-layouts.indexLayout>		
			

	      
       

		   
	

