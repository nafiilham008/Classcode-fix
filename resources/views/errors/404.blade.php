<!DOCTYPE html>
<html lang="en">
<title>404 - Not Found</title>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel='icon' href='{{ asset('assets/node_modules/bootstrap/dist/css/img/classcode.png') }}' type='image/x-icon'
        sizes="3x3" />
    <!-- Style Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/node_modules/bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="lg:block hidden">
        <div class="bg-no-repeat bg-center bg-cover  w-screen h-screen"
            style="background-image: url('../../assets/image/404m.png');">
            <div class="flex items-center justify-center h-screen flex-col">
                <img src="../../assets/image/ilustrasi4.png" alt="">
                <a href="{{ route('index') }}" class="px-4 py-2 bg-[#75B843]/80 mt-10 rounded-lg hover:bg-[#F9AE55] text-white">Back</a>
            </div>
        </div>
    </div>
    <div class="lg:hidden block">
        <div class="bg-no-repeat bg-center bg-cover  w-screen h-screen"
            style="background-image: url('../../assets/image/404m.png');">
            <div class="flex justify-center h-screen flex-col">
                <img src="../../assets/image/ilustrasi4.png" alt="">
                <div class="flex justify-center">
                    <button
                        class="px-4 py-2 bg-[#75B843]/80 mt-10 rounded-lg w-max hover:bg-[#F9AE55] text-white">Back</button>
                </div>
            </div>
        </div>
    </div>
</body>
