@extends('layouts.app')
@section("header")

<a href="" class="breadcrumb--active"> {{ __('Users') }}</a>

@endsection
@section('body')

<h2 class="intro-y text-lg font-medium mt-10">
    Users
</h2>
<div class="mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <a href="{{url('users/activated')}}" class="button text-white bg-theme-1 shadow-md mr-2">View Activated Users</a>
        @if(session('success'))
        <span class="text-green-500">{{session('success')}}</span>
        @endif
        <div class="hidden md:block mx-auto text-gray-600">Showing {{$users->count()}} results</div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-gray-700 dark:text-gray-300">

                <input data-list=".searchitems" id="search-highlight2" type="search" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
            </div>
        </div>
    </div>
    @if(count($users)==0)
    <div class="col-span-12 text-center pt-5" wire:loading.remove>
        No Results Found ...
    </div>
    @endif


    <div class="searchitems grid grid-cols-12 gap-6 mt-4">
        @foreach($users as $key=>$user)
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4">
            <div class="box">
                <div class="flex items-start px-5 pt-5">
                    <div class="w-full flex flex-col lg:flex-row items-center">
                        <div class="w-16 h-16 image-fit">
                            <img alt="{{$user->name}}" class="rounded-full" src="{{$user->profile_photo_url}}">
                        </div>
                        <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">
                            <a href="" class="font-medium">{{$user->name}}</a>
                            <div class="text-gray-600 text-xs">Created {{$user->created_at->diffForHumans()}}</div>
                        </div>
                    </div>

                </div>
                <div class="text-center lg:text-left p-5">

                    <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-5"> <i data-feather="mail" class="w-3 h-3 mr-2"></i>{{$user->email}}</div>
                    @if($user->phone!=null)<div class="flex items-center justify-center lg:justify-start text-gray-600 mt-5"> <i data-feather="phone" class="w-3 h-3 mr-2"></i>{{$user->phone}}</div>@endif
                    <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-5"> Status - {{$user->status}}</div>
                </div>


                @if($user->status=='Pending')
                <div class="text-center lg:text-right p-5 border-t border-gray-200 dark:border-dark-5">
                    <a class="button button--sm text-gray-700 border border-gray-300 dark:border-dark-5 dark:text-gray-300" data-toggle="modal" data-target="#button-modal{{$user->id}}">Activate</a>
                </div>
                @endif


            </div>
        </div>


        <div class="modal" id="button-modal{{$user->id}}" .self>
            <div class="modal__content relative">
                <a data-dismiss="modal" href="javascript:;" class="absolute right-0 top-0 mt-3 mr-3"> <i data-feather="x" class="w-8 h-8 text-gray-500"></i> </a>

                <div class="p-5 text-center">
                    <i data-feather="alert-circle" class="w-16 h-16 text-theme-10 mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Continue?</div>
                    <div class="text-gray-600 mt-2">Are you sure you want to activate this account ?
                    </div>

                </div>
                <form method="POST" action="{{url('/users/'.$user->id.'/activate')}}">
                    @csrf
                    <div class="px-5 pb-8 text-center">
                        <button type="submit" data-dismiss="modal" class="button w-24 bg-theme-1 text-white" wire:click="delete({{$user->id}})">Ok</button>
                    </div>
                </form>
                <div class="p-5 text-center border-t border-gray-200 dark:border-dark-5"> <a href="" class="text-theme-1 dark:text-theme-10">{{$user->email}} | {{$user->phone}} </a>

                </div>
            </div>
        </div>
        @endforeach

    </div>

    <!-- END: Users Layout -->
    <!-- BEGIN: Pagination -->

    <!-- END: Pagination -->
</div>

@endsection
