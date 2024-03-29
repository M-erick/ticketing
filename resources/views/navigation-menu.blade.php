<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <div id="logo" class="me-auto" style="display: flex; align-items: center;">
                    <a href="{{ route('events.index') }}" class="scrollto">
                        <img src="{{ asset('assets/img/eveNT.png') }}" style="object-fit: cover; height: 50px;"
                            alt="" title="">
                    </a>
                </div>
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <x-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('events.index')">
                        {{ __('EventPulse') }}
                    </x-nav-link>
                </div>

                <!-- Navigation Links  update the navbar here -->
                @admin
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                 
    <x-nav-link href="{{ route('events.create') }}" :active="request()->routeIs('events.create')">
        {{ __('Create Event') }}
    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('reservations') }}">
                        {{ __('Reservations') }}
                    </x-nav-link>
                </div>
                @endadmin


                
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('events.index') }}">
                        {{ __('Events') }}
                    </x-nav-link>
                </div>
               
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Teams Dropdown -->
                @auth
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="60">
                            
                            <x-slot name="content">
                                <!-- Your dropdown content goes here -->
                                <div class="text-gray-700">{{ auth()->user()->name }}</div>
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <button @click.prevent="$root.submit();">Logout</button>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif
            
                <!-- Settings Dropdown -->
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button>Account</button>
                        </x-slot>
            
                        <x-slot name="content">
                            <!-- Your dropdown content goes here -->
                            <div class="text-gray-700 py-2 px-4">{{ auth()->user()->name }}</div>
                            <hr class="border-t border-gray-300">
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <button class="block w-full text-left py-2 px-4 text-gray-700 hover:bg-gray-100">Logout</button>
                            </form>
                        </x-slot>
                        
                    </x-dropdown>
                </div>
            @else
                <div class="ms-3">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button>Login</button>
                        </x-slot>
            
                        <x-slot name="content">
                            <!-- Your dropdown content goes here -->
                            <a href="{{ route('login') }}">Login</a>
                        </x-slot>
                    </x-dropdown>
                </div>
            @endauth
            
                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <!-- Links visible to unauthenticated users -->
            @guest
                <x-responsive-nav-link href="{{ route('events.index') }}" :active="request()->routeIs('events.index')">
                    {{ __('Events') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('events.show', 1) }}" :active="request()->routeIs('events.show')">
                    {{ __('Event Details') }}
                </x-responsive-nav-link>
            @endguest

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @auth
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div class="shrink-0 me-3">
                                <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </div>
                        @endif

                        <div>
                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                    @endauth
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    @auth
                        <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                {{ __('API Tokens') }}
                            </x-responsive-nav-link>
                        @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    @endauth

                    <!-- Team Management -->
                    @auth
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="border-t border-gray-200"></div>

                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Team') }}
                            </div>

                            <!-- Team Settings -->
                            <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                                {{ __('Team Settings') }}
                            </x-responsive-nav-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                    {{ __('Create New Team') }}
                                </x-responsive-nav-link>
                            @endcan

                            <!-- Team Switcher -->
                            @if (Auth::user()->allTeams()->count() > 1)
                                <div class="border-t border-gray-200"></div>

                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Switch Teams') }}
                                </div>

                                @foreach (Auth::user()->allTeams() as $team)
                                    <x-switchable-team :team="$team" component="responsive-nav-link" />
                                @endforeach
                            @endif
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
