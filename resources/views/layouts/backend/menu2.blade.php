<div>
    <nav class="flex items-center bg-[#395083] p-3 flex-wrap">
        <a href="#" class="p-2 mr-4 inline-flex items-center">
            <img src="../../assets/image/logo.png" class="relative" alt="">
        </a>
        <div
            class="lg:inline-flex lg:block hidden lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start flex flex-col lg:h-auto">
            <a href="{{ route('index') }}"
                class="lg:inline-flex font-vietnam lg:w-auto w-full px-3 py-2 rounded text-white items-center justify-center hover:bg-[#F9AE55] hover:text-[#F9AE55]">
                <span>Home</span>
            </a>
            <a href="#"
                class="lg:inline-flex font-vietnam lg:w-auto w-full px-3 py-2 rounded text-white items-center justify-center hover:bg-[#F9AE55] hover:text-[#F9AE55]">
                <span>Course</span>
            </a>
            <a href="#"
                class="lg:inline-flex font-vietnam lg:w-auto w-full px-3 py-2 rounded text-white items-center justify-center hover:bg-[#F9AE55] hover:text-[#F9AE55]">
                <span>Promo</span>
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
                <div class="relative px-3 py-2">
                    <input type="search"
                        class="peer cursor-pointer font-vietnam  relative z-10 h-10 w-10 rounded-full border border-white bg-transparent pl-12 outline-none focus:w-full focus:cursor-text focus:border-black text-white focus:pl-16 focus:pr-4" />
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-y-0 my-auto h-8 w-12 border-r border-transparent stroke-gray-500 px-3.5 peer-focus:border-black peer-focus:stroke-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <iconify-icon icon="bytesize:cart" class="text-white px-3 py-2"></iconify-icon>
                <a href="#"
                    class="lg:hidden  block font-vietnam lg:w-auto w-full px-3 py-2 rounded text-white items-center justify-center hover:bg-[#F9AE55] hover:text-[#F9AE55]">
                    <span>Home</span>
                </a>
                <a href="#"
                    class="lg:hidden block font-vietnam lg:w-auto w-full px-3 py-2 rounded text-white items-center justify-center hover:bg-[#F9AE55] hover:text-[#F9AE55]">
                    <span>Course</span>
                </a>
                <a href="#"
                    class="lg:hidden block font-vietnam lg:w-auto w-full px-3 py-2 rounded text-white items-center justify-center hover:bg-[#F9AE55] hover:text-[#F9AE55]">
                    <span>Promo</span>
                </a>
                <a href="#"
                    class="lg:inline-flex font-vietnam lg:w-auto w-full px-3 py-2 rounded text-white items-center justify-center hover:bg-[#F9AE55] hover:text-[#F9AE55]">
                    <span>Masuk</span>
                </a>
                <a href="#"
                    class="lg:inline-flex lg:w-auto font-vietnam  bg-[#75B843] w-full px-3 py-2 rounded-full text-white items-center justify-center hover:bg-[#F9AE55] hover:text-[#F9AE55]">
                    <span>Register</span>
                </a>

            </div>
        </div>
    </nav>

</div>
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


    