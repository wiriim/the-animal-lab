@extends('layouts.app')

@section('content')
    
    <div class="home-container d-flex flex-column">
        <section class="hero-section d-flex justify-content-center" style="min-height: 420px">
            <div class="hero-wrapper mt-1 d-flex flex-wrap-reverse justify-content-center p-4" style="column-gap: 40px; row-gap: 30px;align-items: center">
                <div class="hero-left">
                    <h1>Join the Community and Spread Love About Animals</h1>
                    <p class="lead">We are here to spread love and knowledge about animals that you may or may not have heard about</p>
                    <a href="{{Auth::check() ? '/animals/detail' : '/login'}}" class="btn btn-primary">Join Us</a>
                </div>
                <div class="hero-right">
                    <div class="hero-image">
                        <img src="{{ asset('images/komodo-image.png') }}" alt="komodo-image" style="border-radius: 50px" width="100%" height="100%">
                    </div>
                </div>
            </div>
        </section>

        <section class="exotic-section" style="min-height: 700px; padding: 2rem">
            <h2 class="text-black fw-bold" style="text-align: center; display: block;">Find Exotic Animals</h2>
            <div class="exotic-wrapper d-flex justify-content-center mt-5 flex-wrap" style="gap: 2rem">
                <div class="left-animals d-flex flex-wrap justify-content-center" style="gap: 2rem">
                    <a href="{{ route('read-more', ['animal'=>'7']) }}" style="text-decoration: none;">
                        <div class="cards">
                            <div class="image">
                                <img src="{{ asset('images/animals/Amazon Rainforest Frog.jpg') }}" alt="Amazon Rainforest Frog" width="100%">
                            </div>
                            <div class="text ms-2">
                                <p class="lead fw-bold mt-2">Amazon Rainforest Frog</p>
                                <p style="max-width: 280px; margin-top: -0.5rem">Frogs are overwhelmingly the most abundant amphibians in the rainforest. More than 1000 species of frogs are found in the Amazon Basin. Unlike temperate frogs which are mostly limited to habitats near water, tropical frogs are most abundant in the trees and relatively few are found near bodies of water on the forest floor.</p>
                            </div>
                        </div>
                    </a>
                    
                    <a href="{{ route('read-more', ['animal'=>'98']) }}" style="text-decoration: none;">
                        <div class="cards">
                            <div class="image">
                                <img src="{{ asset('images/animals/Komodo Dragon.jpg') }}" alt="Komodo Dragon" width="100%">
                            </div>
                            <div class="text ms-2">
                                <p class="lead fw-bold mt-2">Komodo Dragon</p>
                                <p style="max-width: 280px; margin-top: -0.5rem">The Komodo dragon (Varanus komodoensis), also known as the Komodo monitor, is a large reptile of the monitor lizard family Varanidae that is endemic to the Indonesian islands of Komodo, Rinca, Flores, and Gili Motang. It is the largest extant species of lizard, with the males growing to a maximum length of 3 m (9.8 ft) and weighing up to 150 kg (330 lb).</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="right-animals d-flex flex-wrap justify-content-center" style="gap: 2rem">
                    <a href="{{ route('read-more', ['animal'=>'170']) }}" style="text-decoration: none;">
                        <div class="cards">
                            <div class="image">
                                <img src="{{ asset('images/animals/Tufted Puffin.jpg') }}" alt="Tufted Puffin" width="100%">
                            </div>
                            <div class="text ms-2">
                                <p class="lead fw-bold mt-2">Tufted Puffin</p>
                                <p style="max-width: 280px; margin-top: -0.5rem">The tufted puffin (Fratercula cirrhata) is a striking seabird known for its distinctive appearance and vibrant plumage, native to the northern Pacific Ocean. This species of puffin is found along the coasts of Alaska, Canada, and the U.S. Pacific Northwest, as well as some parts of eastern Russia and Japan.</p>
                            </div>
                        </div>
                    </a>
                    
                    <a href="{{ route('read-more', ['animal'=>'125']) }}" style="text-decoration: none;">
                        <div class="cards">
                            <div class="image">
                                <img src="{{ asset('images/animals/Potoo.jpg') }}" alt="Potoo" width="100%">
                            </div>
                            <div class="text ms-2">
                                <p class="lead fw-bold mt-2">Potoo</p>
                                <p style="max-width: 280px; margin-top: -0.5rem">The potoo is a fascinating and mysterious bird that belongs to the family Nyctibiidae, found primarily in the forests and tropical regions of Central and South America. Known for their cryptic behavior and remarkable camouflage, potoos are nocturnal birds that are most active during the night, making them elusive and difficult to observe in the wild.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <section class="interraction-section d-flex justify-content-center" style="height: 600px; align-items: center">
            <div class="interraction-wrapper d-flex flex-wrap justify-content-center" style="gap: 40px; height: fit-content; align-items: center; padding: 20px">
                <div class="interraction-left">
                    <img src="{{ asset('images/interraction2.png') }}" alt="interraction2" width="100%" height="100%">
                </div>
                <div class="interraction-right">
                    <h2>Participate in the Community!</h2>
                    <p class="lead">Share your thoughts, build a community, and be supportive!</p>
                </div>
            </div>
        </section>

        <section class="quote-section d-flex justify-content-center">
            <div class="bg-mask"></div>
            <div class="quote-wrapper p-4">
                <p class="body lead fs-3">"The purity of a person's heart can be quickly measured by how they regard animals."</p>
                <p class="author fs-5 ms-auto" style="width: fit-content">- Theophile Gautier</p>
            </div>
        </section>

    </div>
    

@endsection

