<x-layouts.authLayout title="Reset Password">
	<x-auth.resetpassword
		userType="Patient"
		loginlink="{{ route('userlogin') }}"
		action="{{ route('resetpassword', [$userid, $restriction]) }}"
		validator="{{ ($errors == '[]') ? '' : $errors }}"
	>
		
	</x-auth.resetpassword>
	
</x-layouts.authLayout>