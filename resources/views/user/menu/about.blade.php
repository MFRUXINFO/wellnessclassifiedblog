@extends('user.layout.app')
@section('meta')
    <title>World Classified - Discover Endless Fun</title>
    <meta name="description" content="Make your travel planning easier with our list of national and international travel agencies. Find affordable solo and group tour packages for your next holiday..">
    <meta name="keywords" content="classified submission site, world classified submission site, travel classified">
@endsection
@section('content')
    {{-- <img src="{{asset('public/user/img/pageUnderConstruction.svg')}}" alt=""> --}}
    {{-- BANNER SECTION START --}}
    <section class="About_banner">
        <div class="Our_Story_title">Our Story</div>
        <img src="{{('public/user/img/About_Banner_img.webp')}}" class="w-100" alt="">
    </section>
    {{-- BANNER SECTION END --}}

    {{-- ABOUT CONTAIN SECTION START --}}
    <section class="About_Details py-5">
        <div class="row align-items-center">
            <div class="col-md-7 py-3">
                <p>In 2015, the world of travel was undergoing a silent transformation. The rise of digital platforms had empowered consumers to book trips with a few taps, but it also left many small and mid-sized travel agencies struggling to keep up, often drowned out by giant corporations and complex marketplaces.</p>
                <p>In Ahmedabad, a curious entrepreneur saw this gap — and saw an opportunity. With a background in technology and a passion for exploring the stories behind every journey, they realized that the most powerful travel experiences often came not from big brands, but from passionate local travel experts who knew how to craft unforgettable memories. Thus was born World Classified Hub — a platform to give voice to those agencies, and to simplify the process of discovering them for every traveler.</p>
                <p>World Classified Hub was built with a single idea: every journey deserves to begin with trust, clarity, and possibility. We became the bridge between real-world explorers and the silent creators of those journeys — the agencies and experts who curate, guide, and deliver the joy of travel.</p>
                <p>Since then, we’ve grown into one of the most dynamic classified hubs for tour and travel listings — from solo treks and cultural tours to honeymoon getaways and corporate retreats. Every listing is a story waiting to unfold.</p>
            </div>
            <div class="col-md-5 py-3">
                <img src="{{('public/user/img/about_detail_imag.webp')}}" class="w-100" alt="">
            </div>
        </div>
    </section>
    {{-- ABOUT CONTAIN SECTION END --}}

    {{-- OUR PURPOSE SECTION START --}}
    <section class="Our_Purpose py-5">
        <div class="sec_tit mb-5">
            <h2 class="mb-0">Our Purpose</h2>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4 py-3">
                <div>
                    <img src="{{('public/user/img/Our_Purpose_image.webp')}}" class="w-100" alt="">
                </div>
            </div>
            <div class="col-md-8 py-3">
                <div>
                    <p>At World Classified Hub, we believe travel is more than logistics — it’s transformation. It’s discovery. And everyone deserves the opportunity to explore, connect, and create lasting memories.</p>
                    <p>Our purpose is to be a trusted enabler of that discovery — not just for travelers, but for the thousands of travel agents, local businesses, and tour creators who often go unnoticed. We empower these experts by giving them visibility, accessibility, and a place where their passion meets an audience that values it.</p>
                    <p>From the snow peaks of Himachal to the streets of Paris, from backpackers to families — <b>we are here to connect dreams to destinations.</b></p>
                </div>
            </div>
        </div>
    </section>
    {{-- OUR PURPOSE SECTION END --}}

    {{-- OUR TEAM SECTION START --}}
    <section class="Our_Team py-5">
        <div class="sec_tit mb-5">
            <h2 class="mb-0"> Our Team</h2>
        </div>
        <div class="row">
            <div class="col-md-3 py-3">
                <div class="Custome_team_card">
                    <img src="{{('public/user/img/fruxinfo_team/KarshanZala.webp')}}" class="w-100" alt="">
                    <h3 class="Orange_f fw-bold text-center mt-3">Karshan Zala</h3>
                </div>
            </div>
            <div class="col-md-3 py-3">
                <div class="Custome_team_card">
                    <img src="{{('public/user/img/fruxinfo_team/DishantRai.webp')}}" class="w-100" alt="">
                    <h3 class="Orange_f fw-bold text-center mt-3">Dishant Rai</h3>
                </div>
            </div>
            <div class="col-md-3 py-3">
                <div class="Custome_team_card">
                    <img src="{{('public/user/img/fruxinfo_team/PratikSinghChundawat.webp')}}" class="w-100" alt="">
                    <h3 class="Orange_f fw-bold text-center mt-3">Pratik Singh Chundawat</h3>
                </div>
            </div>
            <div class="col-md-3 py-3">
                <div class="Custome_team_card">
                    <img src="{{('public/user/img/fruxinfo_team/PritiZala.webp')}}" class="w-100" alt="">
                    <h3 class="Orange_f fw-bold text-center mt-3">Priti Zala</h3>
                </div>
            </div>
            <div class="col-md-3 py-3">
                <div class="Custome_team_card">
                    <img src="{{('public/user/img/fruxinfo_team/MahendrasinhRathod.webp')}}" class="w-100" alt="">
                    <h3 class="Orange_f fw-bold text-center mt-3">Mahendrasinh Rathod</h3>
                </div>
            </div>
            <div class="col-md-3 py-3">
                <div class="Custome_team_card">
                    <img src="{{('public/user/img/fruxinfo_team/DixitZalariya.webp')}}" class="w-100" alt="">
                    <h3 class="Orange_f fw-bold text-center mt-3">Dixit Zalariya</h3>
                </div>
            </div>
            <div class="col-md-3 py-3">
                <div class="Custome_team_card">
                    <img src="{{('public/user/img/fruxinfo_team/YagnikMalviya.webp')}}" class="w-100" alt="">
                    <h3 class="Orange_f fw-bold text-center mt-3">Yagnik Malviya</h3>
                </div>
            </div>
            <div class="col-md-3 py-3">
                <div class="Custome_team_card">
                    <img src="{{('public/user/img/fruxinfo_team/DhaneshKodiyatar.webp')}}" class="w-100" alt="">
                    <h3 class="Orange_f fw-bold text-center mt-3">Dhanesh Kodiyatar</h3>
                </div>
            </div>
            <div class="col-md-3 py-3">
                <div class="Custome_team_card">
                    <img src="{{('public/user/img/fruxinfo_team/DharmikGajera.webp')}}" class="w-100" alt="">
                    <h3 class="Orange_f fw-bold text-center mt-3">Dharmik Gajera</h3>
                </div>
            </div>
            <div class="col-md-3 py-3">
                <div class="Custome_team_card">
                    <img src="{{('public/user/img/fruxinfo_team/KuldipBhadrecha.webp')}}" class="w-100" alt="">
                    <h3 class="Orange_f fw-bold text-center mt-3">Kuldip Bhadrecha</h3>
                </div>
            </div>
            <div class="col-md-3 py-3">
                <div class="Custome_team_card">
                    <img src="{{('public/user/img/fruxinfo_team/BansiBhalodia.webp')}}" class="w-100" alt="">
                    <h3 class="Orange_f fw-bold text-center mt-3">Bansi Bhalodia</h3>
                </div>
            </div>
            <div class="col-md-3 py-3">
                <div class="Custome_team_card">
                    <img src="{{('public/user/img/fruxinfo_team/HardikVishalpura.webp')}}" class="w-100" alt="">
                    <h3 class="Orange_f fw-bold text-center mt-3">Hardik Vishalpura</h3>
                </div>
            </div>
        </div>
    </section>
    {{-- OUR TEAM SECTION END --}}
@endsection
@push('js')
    <script>
        $('.about').addClass('active');
    </script>
@endpush
