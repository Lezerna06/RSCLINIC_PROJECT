<x-layouts.authLayout title="User-Login">
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
        subtitle="R.S | Patient Login"
        sublink="/login/user"
        placeholder="Email"
        action="/login/user">

        <div class="new-account">
            Don't have an account yet?
            <a href="/user/registration">
                Create an account
            </a>
        </div>

        <x-slot:forgotpassword>
            <a href="/user/recover">
                Forgot Password?
            </a>
        </x-slot>
    </x-auth.login>
</x-layouts.authLayout>