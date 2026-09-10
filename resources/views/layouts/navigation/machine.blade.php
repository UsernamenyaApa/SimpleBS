<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0 z-40 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <a href="{{ route('machine.home') }}" class="flex items-center gap-3">
                <img src="{{ asset('images/asset/logo-coloured.png') }}" alt="Logo" class="h-10 w-auto object-contain">
                <div class="flex flex-col">
                    <span class="font-extrabold text-xl text-gray-900 leading-tight tracking-tight">SimpelBS</span>
                    <span class="text-[10px] text-gray-500 font-medium tracking-wide uppercase">Mesin Pelayanan Mandiri</span>
                </div>
            </a>

            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('machine.home') }}" class="flex items-center gap-2 text-sm font-medium {{ request()->routeIs('machine.home') ? 'text-[#00C07F] font-bold' : 'text-gray-500 hover:text-[#00C07F]' }}">
                    <i class="fas fa-home text-lg"></i><span>Home</span>
                </a>
                <a href="{{ route('machine.history') }}" class="flex items-center gap-2 text-sm font-medium {{ request()->routeIs('machine.history') ? 'text-[#00C07F] font-bold' : 'text-gray-500 hover:text-[#00C07F]' }}">
                    <i class="fas fa-history text-lg"></i><span>History</span>
                </a>
            </div>

            <div class="hidden md:flex items-center">
                <form method="POST" action="{{ route('logout') }}">@csrf
                    <button class="px-4 py-2 text-sm font-semibold text-red-600 hover:bg-red-50 rounded-lg"><i class="fas fa-sign-out-alt mr-2"></i>Keluar</button>
                </form>
            </div>

            <button @click="open = !open" class="md:hidden p-2 text-gray-500"><i class="fas fa-bars text-xl"></i></button>
        </div>
    </div>
    <div x-show="open" x-cloak class="md:hidden border-t border-gray-100 bg-white px-4 py-3 space-y-1">
        <a href="{{ route('machine.home') }}" class="block px-4 py-3 rounded-lg {{ request()->routeIs('machine.home') ? 'bg-green-50 text-green-700 font-semibold' : 'text-gray-600' }}"><i class="fas fa-home w-6"></i> Home</a>
        <a href="{{ route('machine.history') }}" class="block px-4 py-3 rounded-lg {{ request()->routeIs('machine.history') ? 'bg-green-50 text-green-700 font-semibold' : 'text-gray-600' }}"><i class="fas fa-history w-6"></i> History</a>
        <form method="POST" action="{{ route('logout') }}">@csrf<button class="w-full text-left px-4 py-3 text-red-600"><i class="fas fa-sign-out-alt w-6"></i> Keluar</button></form>
    </div>
</nav>
