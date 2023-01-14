<x-layouts.authLayout title="Doctor-Login">
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
    <x-auth.login  
        subtitle="R.S | Doctor Login"
        sublink="/login/doctor"
        placeholder="Email"
        action="/login/doctor">

        <x-slot:forgotpassword>
            <a href="/doctor/recover">
                Forgot Password?
            </a>
        </x-slot>
    </x-auth.login>
</x-layouts.authLayout>