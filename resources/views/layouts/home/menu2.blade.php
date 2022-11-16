<div>
    <nav class="flex items-center bg-[#395083] flex-wrap px-20">
        <a href="#" class="p-2 mr-4 inline-flex items-center">
            <img src="../../assets/image/logo.png" class="relative" alt="">
        </a>
        <div
            class="lg:inline-flex lg:block hidden gap-x-6 lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start flex flex-col lg:h-auto">
            <a href="{{ route('index') }}"
                class="lg:inline-flex font-vietnam lg:w-auto w-full py-2 rounded text-white items-center justify-center ">
                <span class="hover:text-[#F9AE55]">Home</span>
            </a>
            <a href="{{ route('kelas.index') }}"
                class="lg:inline-flex font-vietnam lg:w-auto w-full py-2 rounded text-white items-center justify-center">
                <span class="hover:text-[#F9AE55]">Course</span>
            </a>
            <a href="{{ route('promo.index') }}"
                class="lg:inline-flex font-vietnam lg:w-auto w-full py-2 rounded text-white items-center justify-center">
                <span class="hover:text-[#F9AE55]">Promo</span>
            </a>

        </div>
        <button
            class="text-white inline-flex p-3 hover:bg-gray-900 rounded lg:hidden ml-auto hover:text-white outline-none nav-toggler"
            data-target="#navigation">
            <iconify-icon icon="charm:menu-hamburger" width="24" height="24"></iconify-icon>
        </button>
        <div class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto" id="navigation">
            <div
                class="lg:inline-flex lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start flex flex-col lg:h-auto">
                {{-- SEARCH --}}
                <div class="relative py-2">
                    <form action="{{ route('home.search') }}" method="GET">
                        <input type="search" name="search"
                            class="peer cursor-pointer font-vietnam  relative z-10 h-10 w-10 rounded-full border border-white bg-transparent pl-12 outline-none focus:w-full focus:cursor-text focus:border-black text-white focus:pl-16 focus:pr-4 @error('search') is-invalid @enderror"
                            placeholder="Cari Kelas" />

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="absolute inset-y-0 my-auto h-8 w-12 border-r border-transparent stroke-gray-500 px-3.5 peer-focus:border-black peer-focus:stroke-gray-500"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        @error('search')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </form>
                </div>
                <div class="lg:hidden  block">
                    <a href="{{ route('index') }}"
                        class="font-vietnam lg:w-auto w-full px-3 py-2 rounded text-white items-center justify-center hover:bg-[#F9AE55] hover:text-[#F9AE55]">
                        <span>Home</span>
                    </a>
                    <a href="{{ route('kelas.index') }}"
                        class="font-vietnam lg:w-auto w-full px-3 py-2 rounded text-white items-center justify-center hover:bg-[#F9AE55] hover:text-[#F9AE55]">
                        <span>Course</span>
                    </a>
                    <a href="{{ route('promo.index') }}"
                        class="font-vietnam lg:w-auto w-full px-3 py-2 rounded text-white items-center justify-center hover:bg-[#F9AE55] hover:text-[#F9AE55]">
                        <span>Promo</span>
                    </a>
                </div>
                @guest
                    <a href="{{ route('login') }}"
                        class="lg:inline-flex font-vietnam lg:w-auto w-full px-3 py-2 rounded text-white items-center justify-center">
                        <span class="hover:text-[#F9AE55]">Masuk</span>
                    </a>
                    <a href="{{ route('register') }}"
                        class="lg:inline-flex lg:w-auto ml-3 font-vietnam  bg-[#75B843] w-full px-4 py-2.5 rounded-full text-white items-center justify-center hover:bg-[#F9AE55] hover:text-[#F9AE55]">
                        <span>Daftar</span>
                    </a>
                @else
                    <div x-data="{ open: false }" class="bg-[#395083] w-64   flex justify-center items-center">
                        <div @click="open = !open" class="relative border-b-4 border-transparent py-3"
                            :class="{ 'border-indigo-700 transform transition duration-300 ': open }"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100">
                            <div class="flex justify-center items-center space-x-3 cursor-pointer">
                                <div class="w-12 h-12 rounded-full overflow-hidden border-2  border-gray-900">
                                    @if (!Auth()->user()->image)
                                        <img src="images_profil/default.jpg"
                                            alt="Designed by syarifahbrit / Freepik" class="w-full h-full object-cover">
                                    @else
                                        <img src="{{ asset('images_profil/' . Auth::user()->image) }}" alt="profil"
                                            width="50px" class="w-full h-full object-cover">
                                    @endif
                                </div>
                                <div class="font-semibold  text-white font-vietnam text-base">
                                    <div class="cursor-pointer">{{ Auth()->user()->username }}</div>
                                </div>
                            </div>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute w-60 px-5 py-3  bg-white rounded-lg shadow border  mt-4">
                                <ul class="space-y-3 ">
                                    <li class="font-medium">
                                        @role('admin|mentor')
                                            <a href="{{ route('admin.index') }}"
                                                class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-indigo-700">
                                                <div class="mr-3">
                                                    <iconify-icon icon="ic:outline-dashboard-customize" width="24"
                                                        height="24"></iconify-icon>
                                                </div>
                                                Dashboard
                                            </a>
                                        @endrole
                                        @role('user')
                                            <a href="{{ route('dashboard.index') }}"
                                                class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-indigo-700">
                                                <div class="mr-3">
                                                    <iconify-icon icon="ic:outline-dashboard-customize" width="24"
                                                        height="24"></iconify-icon>
                                                </div>
                                                Dashboard
                                            </a>
                                        @endrole
                                    </li>

                                    {{-- <hr class=""> --}}
                                    <li class="font-medium">
                                        <a href="{{ route('logout') }}"
                                            class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-red-600"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <div class="mr-3 text-red-600">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                    </path>
                                                </svg>
                                            </div>
                                            Logout
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endguest
                {{-- @else --}}

                {{-- @endguest --}}


            </div>
        </div>
    </nav>

</div>

{{-- Script tambahan Navbar --}}
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $(".nav-toggler").each(function(_, navToggler) {
            var target = $(navToggler).data("target");
            $(navToggler).on("click", function() {
                $(target).animate({
                    height: "toggle",
                });
            });
        });
    });
</script>
<script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
