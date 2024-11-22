@extends('layouts.app')

@section('content')
    
    <div class="about-us-wrapper">
        <section class="top-section">
            <div class="top-section-mask d-flex justify-content-center"><p class="fs-1 text-light fw-bolder" style="align-self: center">About Us</p></div>
        </section>
        <section class="content-section">
            <div class="container-lg p-5">
                
                <div class="row row-vision mt-2" >
                    <div class="col-md-6 d-flex">
                        <img src="{{ asset('images/bear-img-removebg.png') }}" alt="bear-img" width="100%" style="align-self: center">
                    </div>
                    <div class="col-md-6">
                        <h1 class="mt-5 mb-2" style="width: fit-content;margin: 0 auto">Our Vision</h1>
                        <section class="d-flex" style="height: 70%">
                            <p style="align-self: center;">
                                To create a world where the beauty, diversity, and wonder of animals are celebrated and respected, inspiring people to connect with nature and foster a deeper understanding of the animal kingdom. By cultivating a vibrant community of animal enthusiasts, we aim to promote a culture of awareness, empathy, and active participation in wildlife conservation efforts.
                            </p>
                        </section>
                    </div>
                </div>

                <div class="row row-mission mt-5">
                    <div class="col-md-6">
                        <h1 class="mt-5 mb-5" style="width: fit-content;margin: 0 auto">Our Mission</h1>
                        <section class="d-flex" style="height: 70%">
                            <p style="align-self: center">
                                Our mission is to provide an engaging online platform that showcases the fascinating variety of animal life, highlighting their unique characteristics and natural habitats. Through this platform, we strive to build a global community where individuals can share their thoughts, stories, and experiences about animals, creating meaningful connections with like-minded enthusiasts. We are committed to fostering a love for animals, raising awareness about their importance, and encouraging actions that contribute to their protection and preservation.
                            </p>
                        </section>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center">
                        <img src="{{ asset('images/bird-img-modified.png') }}" alt="bear-img" style="max-width: 350px; max-height: 300px; align-self: center; min-width: 0px">
                    </div>
                    
                </div>
            </div>
        </section>
    </div>
    
    

@endsection

