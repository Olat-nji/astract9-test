@extends('layouts.guest')
@section('meta')
<title>{{env('APP_NAME')}} - Login</title>
@endsection

@section('body')
<div class="row osahan-login m-0">
    <div class="col-md-6 osahan-login-left px-0" style="background-image:url({{asset('images/banner-img2.jpg')}})">
    </div>
    <div class="col-md-6 d-flex justify-content-center flex-column px-0">
        <div class="col-lg-6 mx-auto">
            <h3 class="mb-1">Welcome</h3>
            <p class="mb-4">Sign in to your account to continue</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                @if ($errors->any())
                <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif


                <div class="d-flex align-items-center mb-4">
                    <div class="mr-3 bg-light rounded p-2 osahan-icon"><i class="mdi mdi-email-outline"></i></div>
                    <div class="w-100">
                        <p class="mb-0 small font-weight-bold text-dark">Email Address</p>
                        <input class="form-control form-control-sm p-0 border-input border-0 rounded-0" placeholder="Enter your email" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
                </div>
                <div class="d-flex align-items-center mb-4">
                    <div class="mr-3 bg-light rounded p-2 osahan-icon"><i class="mdi mdi-form-textbox-password"></i></div>
                    <div class="w-100">
                        <p class="mb-0 small font-weight-bold text-dark">Password</p>
                        <input class="form-control form-control-sm p-0 border-input border-0 rounded-0" placeholder="Enter your password" type="password" name="password" required autocomplete="current-password" />

                    </div>
                </div>
                @if (Route::has('password.request'))
                <p class="text-right"><a href="{{ route('password.request') }}" class="text-dark">Forgot password?</a></p>
                @endif
                <div class="mb-3">
                    <div>
                        <button type="submit" class="btn btn-primary btn-block mb-3" wire:offline.attr="disabled">Sign in</button>
                    </div>


                </div>
                <p class="text-dark text-center"> Are you new here? <a class=" text-decoration-none" style="color:#392659" href="{{url('register')}}">Sign Up</a></p>



        </div>
        </form>
    </div>
</div>
</div>
@endsection
