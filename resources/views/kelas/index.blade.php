@extends('layouts.home.master')

@section('content')
    <section class="catalog">
            <h2 class="font-vietnam font-bold text-center py-20 text-[34px]">
                Catalog Class
            </h2>
            <div class="flex justify-center mb-14">
                <div class="flex flex-wrap lg:gap-5">
                    <div
                        class="lg:w-[300px] bg-white rounded-xl border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="bg-[#b9ebfc] rounded-t-lg">
                            <a href="#">
                                <img class="" src="../../assets/image/ui.png" alt="">
                            </a>
                        </div>
                        <div class="py-5 px-4">
                            <a href="#">
                                <h5
                                    class="mb-2 text-xl font-bold font-vietnam tracking-tight text-blue-900 dark:text-white">
                                    UX Design Essetial</h5>
                                    <h5
                                    class="mb-2 text-base font-vietnam tracking-tight text-blue-900 dark:text-white">IDR 149.000</h5>
                            </a>
                            <div class="flex gap-3 items-center py-3">
                                <iconify-icon icon="cil:clock" style="color: #219ebc;" width="24" height="24">
                                </iconify-icon>
                                <h3 class="text-sm font-vietnam text-[#219ebc]">Mentor</h3>
                            </div>
                            <div class="flex gap-3 items-center">
                                <iconify-icon icon="ph:medal-light" style="color: #219ebc;" width="24"
                                    height="24"></iconify-icon>
                                <h3 class="text-sm font-vietnam text-[#219ebc]">Sertifikat</h3>
                            </div>
                        </div>
                    </div>
                    <div
                        class="lg:w-[300px] bg-white rounded-xl border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="bg-[#b9ebfc] rounded-t-lg">
                            <a href="#">
                                <img class="" src="../../assets/image/ui.png" alt="">
                            </a>
                        </div>
                        <div class="py-5 px-4">
                            <a href="#">
                                <h5
                                    class="mb-2 text-xl font-bold font-vietnam tracking-tight text-blue-900 dark:text-white">
                                    UX Design Essetial</h5>
                                    <h5
                                    class="mb-2 text-base font-vietnam tracking-tight text-blue-900 dark:text-white">IDR 149.000</h5>
                            </a>
                            <div class="flex gap-3 items-center py-3">
                                <iconify-icon icon="cil:clock" style="color: #219ebc;" width="24" height="24">
                                </iconify-icon>
                                <h3 class="text-sm font-vietnam text-[#219ebc]">Mentor</h3>
                            </div>
                            <div class="flex gap-3 items-center">
                                <iconify-icon icon="ph:medal-light" style="color: #219ebc;" width="24"
                                    height="24"></iconify-icon>
                                <h3 class="text-sm font-vietnam text-[#219ebc]">Sertifikat</h3>
                            </div>
                        </div>
                    </div>
                    <div
                        class="lg:w-[300px] bg-white rounded-xl border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="bg-[#b9ebfc] rounded-t-lg">
                            <a href="#">
                                <img class="" src="../../assets/image/ui.png" alt="">
                            </a>
                        </div>
                        <div class="py-5 px-4">
                            <a href="#">
                                <h5
                                    class="mb-2 text-xl font-bold font-vietnam tracking-tight text-blue-900 dark:text-white">
                                    UX Design Essetial</h5>
                                    <h5
                                    class="mb-2 text-base font-vietnam tracking-tight text-blue-900 dark:text-white">IDR 149.000</h5>
                            </a>
                            <div class="flex gap-3 items-center py-3">
                                <iconify-icon icon="cil:clock" style="color: #219ebc;" width="24" height="24">
                                </iconify-icon>
                                <h3 class="text-sm font-vietnam text-[#219ebc]">Mentor</h3>
                            </div>
                            <div class="flex gap-3 items-center">
                                <iconify-icon icon="ph:medal-light" style="color: #219ebc;" width="24"
                                    height="24"></iconify-icon>
                                <h3 class="text-sm font-vietnam text-[#219ebc]">Sertifikat</h3>
                            </div>
                        </div>
                    </div>
                    <div
                        class="lg:w-[300px] bg-white rounded-xl border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="bg-[#b9ebfc] rounded-t-lg">
                            <a href="#">
                                <img class="" src="../../assets/image/ui.png" alt="">
                            </a>
                        </div>
                        <div class="py-5 px-4">
                            <a href="#">
                                <h5
                                    class="mb-2 text-xl font-bold font-vietnam tracking-tight text-blue-900 dark:text-white">
                                    UX Design Essetial</h5>
                                    <h5
                                    class="mb-2 text-base font-vietnam tracking-tight text-blue-900 dark:text-white">IDR 149.000</h5>
                            </a>
                            <div class="flex gap-3 items-center py-3">
                                <iconify-icon icon="cil:clock" style="color: #219ebc;" width="24" height="24">
                                </iconify-icon>
                                <h3 class="text-sm font-vietnam text-[#219ebc]">Mentor</h3>
                            </div>
                            <div class="flex gap-3 items-center">
                                <iconify-icon icon="ph:medal-light" style="color: #219ebc;" width="24"
                                    height="24"></iconify-icon>
                                <h3 class="text-sm font-vietnam text-[#219ebc]">Sertifikat</h3>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
        
        <div class="row mylist">
            @foreach ($data as $kelas)
                <div class="col-md-4 mt-2 mb-5">
                    <a class="card mx-auto kartuku titleku" style="border-radius: 20px; width:300px"
                        href="{{ route('kelas.detail', $kelas->slug_url) }}">
                        <img class="card-img-top  mx-auto mt-4 object-fit-fill" src="{{ asset('images_kelas/' . $kelas->image) }}"
                            alt="Course" style="width: 250px; height: 250px">
                        <div class="card-body" style="text-align: left;">
                            <p class="card-title poppins-bold">{{ $kelas->title }}</p>
                            <p class="card-text poppins-bold h5">Rp. {{ number_format($kelas->harga) }}</p>
                            <hr style="width:100%;text-align:left;margin-left:0;color: black;background-color: black;">
                        </div>
                        <div class="card-body" style="text-align: left; ">
                            <p class="card-text mentor poppins-bold">
                                {{ $kelas->id_user }}
                            </p>
                            <p class="card-text">
                                Mentor
                            </p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
