@extends('layouts.app')@section("header")

<a href="" class="breadcrumb--active"> {{ __('Messages') }}</a>

@endsection

@section('body')
<div>
    <h2 class="intro-y text-lg font-medium mt-10">
        Messages
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            @if(!auth()->user()->is_admin)
            <a class="button text-white bg-theme-1 shadow-md mr-2" data-toggle="modal" data-target="#send-message">Send Message</a>


            <div class="modal" id="send-message">

                <div class="modal__content">
                    <form action="{{url('messages/create')}}" method="post">
                        @csrf
                        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                            <h2 class="font-medium text-base mr-auto">Send message to Admin</h2>
                        </div>

                        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">

                            <div class="col-span-12 sm:col-span-12"> <label>Your Message</label>
                                <textarea class="input w-full border mt-2 flex-1" name="message" required></textarea>
                            </div>
                        </div>
                        <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"><button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button> <button type="save" data-dismiss="modal" class="button w-20 bg-theme-1 text-white">Send</button> </div>
                    </form>
                </div>
            </div>


            @endif





            <div class="hidden md:block mx-auto text-gray-600">Showing {{$messages->count()}} results ... </div>


            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input data-list=".searchitems" id="search-highlight2" type="search" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>

                        <th class="whitespace-no-wrap">USER</th>
                        <th class="text-center whitespace-no-wrap">DELIVERY DATE </th>
                        <th class=" whitespace-no-wrap">MESSAGE</th>
                    </tr>
                </thead>
                <tbody class="searchitems">
                    @foreach($messages as $key => $message)
                    <tr class="intro-x">

                        <td class="w-40">
                            <a href="" class="font-medium whitespace-no-wrap">
                                {{$message->user->name}}</a>
                            <div class="text-gray-600 text-xs whitespace-no-wrap">{{$message->user->email}} | {{$message->user->phone}}</div>
                        </td>
                        <td class="text-center">{{$message->created_at}}</td>
                        <td >
                            <div  class="font-medium whitespace-no-wrap"> {{$message->message}} </div>
                        </td>

                    </tr>


                    @endforeach
                </tbody>
            </table>





        </div>


    </div>
</div>
@endsection
