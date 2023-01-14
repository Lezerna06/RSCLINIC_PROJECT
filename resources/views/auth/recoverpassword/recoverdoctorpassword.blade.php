<x-layouts.authLayout title="Password Recovery">
	<x-auth.recoverpassword
		hometitle="HMS"
		title="Doctor"
		fields="Contact number and Email"
		firstfield="Contact Number"
		secondfield="Email"
		loginlink="/login/doctor"
		thislink="/doctor/recover"
		restriction="2"
	>
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
		<x-slot:errormessage1>
			@error('contactno')
			<p class="text-danger">{{ $message }}</p>
			@enderror
		</x-slot>
		<x-slot:errormessage2>
			@error('email')
			<p class="text-danger">{{ $message }}</p>
			@enderror
		</x-slot>
	</x-auth.recoverpassword>
</x-layouts.authLayout>
		