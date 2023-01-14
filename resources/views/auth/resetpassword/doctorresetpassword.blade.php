<x-layouts.authLayout title="Reset Password">
	<x-auth.resetpassword
		userType="Doctor"
		loginlink="{{ route('adminlogin') }}"
		action="{{ route('resetpassword', [$userid, $restriction]) }}"
		validator="{{ ($errors == '[]') ? '' : $errors }}"
	>

	

	</x-auth.resetpassword>
	
</x-layouts.authLayout>