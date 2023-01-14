<x-layouts.authLayout title="Admin-Login">
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
        subtitle="Admin Login"
        sublink="/login/admin"
        placeholder="Username"
        action="/login/admin">

        

    </x-auth.login>
</x-layouts.authLayout>