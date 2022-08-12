<div class="top-bar">
    <!-- BEGIN: Breadcrumb -->

    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="{{url('dashboard')}}" class="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> {!! $header ?? $__env->yieldContent('header') !!}</div>

    <div class="intro-x relative mr-3 sm:mr-6">
        {{-- @include('includes.search') --}}
    </div>






    <div class="intro-x relative mr-3 sm:mr-6">

        <button class="rounded-md focus:outline-none focus:shadow-outline-purple" @click="toggleTheme" aria-label="Toggle color mode">
            <template x-if="!dark">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
            </template>
            <template x-if="dark">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                </svg>
            </template>


        </button>

    </div>
    @if(Auth::check())
   
    <div class="intro-x dropdown w-8 h-8">

        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
        </div>
        <div class="dropdown-box w-56">
            <div class="dropdown-box__content box  bg-gray-900 dark:bg-dark-6 text-white">
                <div class="p-4 border-b  border-gray-600 border-opacity-25  dark:border-dark-3">
                    <div class="font-medium">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-theme-41 dark:text-gray-600">@if(auth()->user()->is_admin) Admin @else User @endif</div>
                </div>
                








                <div class="p-2 border-t  border-gray-600 border-opacity-25 dark:border-dark-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="{{ route('logout') }}" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-gray-700 dark:hover:bg-dark-3 rounded-md" onclick="event.preventDefault();
                                                this.closest('form').submit();"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="intro-x dropdown mr-auto sm:mr-6">
        <div class="notification cursor-pointer"><a href="{{url('/')}}"> <i data-feather="home" class="notification__icon dark:text-gray-300"></i> </a></div>

    </div>
    @endif


    <!-- END: Account Menu -->
</div>
