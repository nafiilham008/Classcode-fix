@extends('layouts.home.master')

@section('title')
    About Us
@endsection

@section('content')
    {{-- Baris 1 --}}
    <div class="d-flex justify-align-center" style="padding-top: 100px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-lg-6">
                    <!-- Section Heading-->
                    <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <h3 class="poppins-bold">Our Creative <span> Team</span></h3>
                        <p class="poppins-light"> RDK (Radio Dalam Kopi) Teams, Proudly Present
                        </p>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- Single Advisor-->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.3s"
                        style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                        <!-- Team Thumb-->
                        <div class="advisor_thumb"><img src="{{ asset('assets/image/dika.jpg') }}" alt=""
                                style="max-width: 300px; border-radius: 20px;">
                        </div>
                        <!-- Team Details-->
                        <div class="single_advisor_details_info poppins-light">
                            <h6>Andika Dwi Santoso</h6>
                            <p class="designation poppins-light">UI Design</p>
                        </div>
                    </div>
                </div>
                <!-- Single Advisor-->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.2s"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <!-- Team Thumb-->
                        <div class="advisor_thumb"><img src="{{ asset('assets/image/nafi.png') }}" alt=""
                                style="max-width: 300px; border-radius: 20px;">
                        </div>
                        <!-- Team Details-->
                        <div class="single_advisor_details_info poppins-light">
                            <h6>Nafi Ilham Hamami</h6>
                            <p class="designation poppins-light">Back-End</p>
                        </div>
                    </div>
                </div>
                <!-- Single Advisor-->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.2s"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <!-- Team Thumb-->
                        <div class="advisor_thumb"><img src="{{ asset('assets/image/dona.png') }}" alt=""
                                style="max-width: 300px; border-radius: 20px;">
                        </div>
                        <!-- Team Details-->
                        <div class="single_advisor_details_info poppins-light">
                            <h6>Aldona Anindita N</h6>
                            <p class="designation poppins-light">Front-End</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
