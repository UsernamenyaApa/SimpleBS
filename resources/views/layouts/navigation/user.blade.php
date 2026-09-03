<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0 z-40 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            
            <!-- Left: Logo & Brand -->
            <div class="flex items-center">
                <a href="{{ route('user.dashboard') }}" class="flex items-center gap-3 group">
                    <!-- Logo Image (Ganti dengan aset logo asli Anda) -->
                    <img src="{{ asset('images/asset/Logo-coloured.png') }}" alt="Logo" class="h-10 w-auto object-contain">
                    
                    <!-- Brand Text -->
                    <div class="flex flex-col">
                        <span class="font-extrabold text-xl text-gray-900 leading-tight tracking-tight">SimpelBS</span>
                        <span class="text-[10px] text-gray-500 font-medium tracking-wide uppercase">Sistem Pelayanan Banjarsari</span>
                    </div>
                </a>
            </div>

            <!-- Center: Navigation Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <!-- Beranda (Dashboard) - Active State: Text Green & Bold -->
                <a href="{{ route('user.dashboard') }}" 
                   class="flex items-center gap-2 text-sm font-medium transition-colors duration-200 
                          {{ request()->routeIs('user.dashboard') ? 'text-[#00C07F] font-bold' : 'text-gray-500 hover:text-[#00C07F]' }}">
                    <i class="fas fa-home text-lg {{ request()->routeIs('user.dashboard') ? 'text-[#00C07F]' : 'text-gray-400' }}"></i>
                    <span>Beranda</span>
                </a>

                <!-- Info Layanan -->
                <a href="{{ route('user.layanan') }}" 
                   class="flex items-center gap-2 text-sm font-medium transition-colors duration-200 
                          {{ request()->routeIs('user.layanan') ? 'text-[#00C07F] font-bold' : 'text-gray-500 hover:text-[#00C07F]' }}">
                    <i class="fas fa-info-circle text-lg {{ request()->routeIs('user.layanan') ? 'text-[#00C07F]' : 'text-gray-400' }}"></i>
                    <span>Info Layanan</span>
                </a>

                <!-- IRiwayat -->
                <a href="{{ route('user.riwayat') }}" 
                   class="flex items-center gap-2 text-sm font-medium transition-colors duration-200 
                          {{ request()->routeIs('user.riwayat') ? 'text-[#00C07F] font-bold' : 'text-gray-500 hover:text-[#00C07F]' }}">
                    <i class="fas fa-history text-lg {{ request()->routeIs('user.riwayat') ? 'text-[#00C07F]' : 'text-gray-400' }}"></i>
                    <span>Riwayat</span>
                </a>
            </div>

            <!-- Right: Notification & Profile -->
            <div class="hidden md:flex md:items-center md:ms-6 gap-6">
                <!-- Profile Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center gap-3 focus:outline-none group">
                            <!-- Avatar -->
                            <div class="relative">
                                <img class="h-10 w-10 rounded-full object-cover border-2 border-gray-100 group-hover:border-[#00C07F] transition-all" 
                                     src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random&color=fff" 
                                     alt="{{ Auth::user()->name }}" />
                                <!-- Status Indicator (Optional) -->
                                <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full ring-2 ring-white bg-green-500"></span>
                            </div>
                            
                            <!-- Name & Role -->
                            <div class="text-left hidden md:block">
                                <div class="text-sm font-bold text-gray-900 group-hover:text-[#00C07F] transition-colors">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="text-xs text-gray-500 font-medium">Warga</div>
                            </div>

                            <!-- Chevron Icon -->
                            <i class="fas fa-chevron-down text-xs text-gray-400 group-hover:text-gray-600 transition-transform duration-200"></i>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 border-b border-gray-100 lg:hidden">
                            <div class="font-medium text-sm text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-xs text-gray-500">{{ Auth::user()->email }}</div>
                        </div>

                        <x-dropdown-link :href="route('profile.edit')">
                            <i class="fas fa-user-circle mr-2 text-gray-400"></i> {{ __('Profil Saya') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="text-red-600 hover:text-red-700 hover:bg-red-50">
                                <i class="fas fa-sign-out-alt mr-2"></i> {{ __('Keluar') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="-me-2 flex items-center md:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out">
                    <i class="fas fa-bars text-xl" x-show="!open"></i>
                    <i class="fas fa-times text-xl" x-show="open" style="display: none;"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Off-canvas Navigation (like admin) -->
    <div 
         @keydown.window.escape="open = false" 
         x-show="open" 
         class="relative z-50 md:hidden"
         style="display: none;">
        <!-- Backdrop -->
        <div x-show="open"
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-gray-900/80"
             @click="open = false"></div>

        <!-- Sidebar Panel -->
        <div x-show="open"
             x-transition:enter="transition ease-in-out duration-300 transform"
             x-transition:enter-start="-translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in-out duration-300 transform"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="-translate-x-full"
             class="fixed inset-y-0 left-0 flex w-full max-w-xs flex-col bg-white shadow-xl">

             <div class="flex items-center justify-between px-6 h-16 border-b border-gray-100">
                 <div class="flex items-center gap-2">
                     <img src="{{ asset('images/asset/Logo-coloured.png') }}" alt="Logo" class="w-8 h-8 object-contain">
                     <span class="font-bold text-lg">SimpelBS</span>
                 </div>
                 <button @click="open = false" class="text-gray-500 hover:text-gray-900">
                     <i class="fas fa-times text-xl"></i>
                 </button>
             </div>

             <div class="flex-1 overflow-y-auto px-4 py-4 space-y-1">
                 <a href="{{ route('user.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('user.dashboard') ? 'bg-green-50 text-green-700 font-semibold' : 'text-gray-600' }}">
                     <i class="fas fa-home w-5"></i> Beranda
                 </a>
                 <a href="{{ route('user.layanan') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('user.layanan') ? 'bg-green-50 text-green-700 font-semibold' : 'text-gray-600' }}">
                     <i class="fas fa-info-circle w-5"></i> Info Layanan
                 </a>
                 <a href="{{ route('user.riwayat') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('user.riwayat') ? 'bg-green-50 text-green-700 font-semibold' : 'text-gray-600' }}">
                     <i class="fas fa-history w-5"></i> Riwayat
                 </a>

                 <div class="pt-4 border-t border-gray-100">
                     <div class="px-4 flex items-center gap-3">
                         <div class="flex-shrink-0">
                             <img class="h-10 w-10 rounded-full object-cover border border-gray-200" 
                                  src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random&color=fff" 
                                  alt="{{ Auth::user()->name }}" />
                         </div>
                         <div>
                             <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                             <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                         </div>
                     </div>

                     <div class="mt-3 space-y-1">
                         <a href="{{ route('profile.edit') }}" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-700">
                             Profil Saya
                         </a>

                         <form method="POST" action="{{ route('logout') }}">
                             @csrf
                             <button type="submit" class="w-full text-left flex items-center gap-3 px-4 py-3 rounded-lg text-red-600 hover:bg-red-50 font-semibold">
                                 <i class="fas fa-sign-out-alt w-5"></i> Keluar
                             </button>
                         </form>
                     </div>
                 </div>
             </div>
        </div>
    </div>
</nav>