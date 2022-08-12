@extends('layouts.guest')
@section('meta')
<title>Verify Your Email</title>
@endsection
@section('body')
<div class="row osahan-login m-0">
    <div class="col-md-6 osahan-login-left px-0" style="background-image:url({{asset('images/banner-img2.jpg')}})">
    </div>
    <div class="col-md-6 d-flex justify-content-center flex-column px-0">
        <div class="col-lg-6 mx-auto">
            <h3 class="mb-1">Account Unverified</h3>

            <div class="mb-5">
                {{ __('Thank you for signing up. Your Account is yet to be verified.') }}
            </div>



            <div class="mt-4 flex items-center justify-between">
              
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div class="row">

                        <div class="col-lg-12">

                            <button class="btn btn-primary btn-block mb-3" type="submit">
                                {{ __('Logout') }}
                            </button>
                        </div>
                    </div>
                </form>


            </div>



        </div>
    </div>
</div>
@endsection
