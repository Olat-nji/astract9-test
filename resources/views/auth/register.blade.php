@extends('layouts.guest')
@section('meta')
<title>{{env('APP_NAME')}} - Register</title>
@endsection

@section('body')
<div class="row osahan-login m-0">
    <div class="col-md-6 osahan-login-left px-0" style="background-image:url({{asset('images/banner-img2.jpg')}})">
    </div>
    <div class="col-md-6 d-flex justify-content-center flex-column px-0">
        <div class="col-lg-6 mx-auto">
            <h3 class="mb-1">Create an account</h3>
            <p class="mb-3">Please create an account to continue using our service</p>
            <form method="POST" action="{{ url('register') }}">
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
                    <div class="mr-3 bg-light rounded p-2 osahan-icon"><i class="mdi mdi-account-outline"></i></div>
                    <div class="w-100">
                        <p class="mb-0 small font-weight-bold text-dark">Full Name</p>
                        <input type="text" class="form-control form-control-sm p-0 border-input border-0 rounded-0" placeholder="Enter Your Name" name="name" :value="old('name')" required autofocus autocomplete="name">
                    </div>
                </div>
                <div class="d-flex align-items-center mb-4">
                    <div class="mr-3 bg-light rounded p-2 osahan-icon"><i class="mdi mdi-email-outline"></i></div>
                    <div class="w-100">
                        <p class="mb-0 small font-weight-bold text-dark">Phone Number</p>
                        <input type="phone" class="form-control form-control-sm p-0 border-input border-0 rounded-0" placeholder="Enter Your Phone" name="phone" :value="old('phone')">
                    </div>
                </div>

                <div class="d-flex align-items-center mb-4">
                    <div class="mr-3 bg-light rounded p-2 osahan-icon"><i class="mdi mdi-email-outline"></i></div>
                    <div class="w-100">
                        <p class="mb-0 small font-weight-bold text-dark">Email Address</p>
                        <input type="email" class="form-control form-control-sm p-0 border-input border-0 rounded-0" placeholder="Enter Your Email" name="email" :value="old('email')" required>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-4">
                    <div class="mr-3 bg-light rounded p-2 osahan-icon"><i class="mdi mdi-form-textbox-password"></i></div>
                    <div class="w-100">
                        <p class="mb-0 small font-weight-bold text-dark">Password</p>
                        <input type="password" class="form-control form-control-sm p-0 border-input border-0 rounded-0" placeholder="Enter Your Password" name="password" required autocomplete="new-password">
                    </div>
                </div>

                <div class="d-flex align-items-center mb-4">
                    <div class="mr-3 bg-light rounded p-2 osahan-icon"><i class="mdi mdi-form-textbox-password"></i></div>
                    <div class="w-100">
                        <p class="mb-0 small font-weight-bold text-dark">Confirm Password</p>
                        <input type="password" class="form-control form-control-sm p-0 border-input border-0 rounded-0" placeholder="Enter Your Password" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="mb-3">


                    <button type="submit" class="btn btn-primary btn-block ">Create an account</button>

                </div>




                <p class="text-center">Already have an account? <a href="{{url('login')}}" style="color:#392659" class="text-decoration-none">Sign in</a></p>
                

            </form>
        </div>
    </div>
</div>
@endsection
