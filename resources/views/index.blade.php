@extends('layouts.app')

@section("header")

<a href="" class="breadcrumb--active"> {{ __('Dashboard') }} </a>

@endsection
@section('body')
<div>
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        General Report
                    </h2>

                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">


                    @if(auth()->user()->is_admin)
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <a href="{{url('users')}}">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                        {{-- <div class="ml-auto">
                                        <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="33% Higher than last month"> 33% <i data-feather="chevron-up" class="w-4 h-4"></i> </div>
                                    </div> --}}
                                    </div>
                                    <div class=" mt-6"><span class="text-3xl font-bold leading-8"> {{$users}}</span></div>

                                    <div class="text-base text-gray-600 mt-1">Total Users</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif



                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <a href="{{url('messages')}}">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="gift" class="report-box__icon text-theme-12"></i>
                                        {{-- <div class="ml-auto">
                                        <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="12% Higher than last month"> 12% <i data-feather="chevron-up" class="w-4 h-4"></i> </div>
                                    </div> --}}
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{$messages}}</div>
                                    <div class="text-base text-gray-600 mt-1">Messages</div>
                                </div>
                            </div>
                        </a>
                    </div>





                </div>
            </div>


            <!-- END: General Report -->
            <!-- BEGIN: Weekly Top Products -->

            <!-- END: Weekly Top Products -->
        </div>
    </div>
    @endsection
</div>
