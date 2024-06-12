<nav x-data="{ open: false }" class=" border-b border-gray-100"style="background-color: #268EE6;">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="logo space-x-8 text-light fw-bold fs-6 sm:ms-10">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{-- {{ __('Dashboard') }} --}}
                        <img src="/assets/image/Logoblanc.png" alt="" style="height: 55px">
                    </x-nav-link>
                    {{-- <x-nav-link style="font-size: 20px; font-weight: bold;">
                        <img src="/assets/image/Logoblanc.png" alt="" style="height: 55px">
                    </x-nav-link> --}}
                </div>
            </div>
            <div class="flex items-center">
                <div class="flex items-center mr-2 ">
                    <a href="" aria-label="Assistance">
                        <i class="fas fa-headset"></i>
                    </a>
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">

                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content" >
                            <x-dropdown-link :href="route('profile.edit')" >
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                {{-- Assistance --}}
                
                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <i class="fas fa-user h-8 w-8"></i> <!-- Utilisation de l'icône FontAwesome -->
                    </button>
                </div>

            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden ">
            {{-- <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Acceuil') }}
            </x-responsive-nav-link>
        </div> --}}

            <!-- Responsive Settings Options -->
            <div class="">
                <div class="px-3">
                    <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                    {{-- <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div> --}}
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')" class="text-white">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')" class="text-white"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
</nav>
