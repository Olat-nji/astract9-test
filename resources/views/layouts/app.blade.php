<!DOCTYPE html>
<html lang="en" x-data="data()" :class="{ 'dark bg-gray-900': dark }" class=" bg-white">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>


    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}" defer></script>
    <script src="{{asset('js/alpine.js')}}" defer></script>
    
</head>

{{-- @include('vendor.sweetalert.alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@if(env('APP_ENV')=='local')<script src="https://officebukka.pages.dev/vendor/sweetalert/sweetalert.all.js"></script>@endif --}}
<body :class="{ 'bg-gray-900': dark }" class="app bg-white">

    @include('includes.mobile-menu')
    
    <main>
        <div class="flex">
            @include('includes.normal-menu')
            <div class="content">
                @include('includes.top-bar')



                @yield('body')



            
            </div>
        </div>



        @yield('modals')
        
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/jquery.hideseek.min.js')}}" defer></script>
        <script>
            $(document).ready(function() {
                $('#search-highlight').hideseek({
                    highlight: true
                    , nodata: 'No results found'
                    , headers: '.search-result__content__title'
                });

                    $('#search-highlight2').hideseek({
                    highlight: true
                    , nodata: 'No results found'
                    , headers: '.search-result__content__title'
                });
            });

        </script>
      
</body>


</html>
