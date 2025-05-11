@extends('user.layout.app')
@section('meta')
    <title>World Classified - Discover Endless Fun</title>
    <meta name="description" content="Make your travel planning easier with our list of national and international travel agencies. Find affordable solo and group tour packages for your next holiday..,classified submission site, world classified submission site, travel classified,best tourist places in ahmedabad, best tourist places in world, best tourist places gujarat, best tourist place, places, tourist">
    <meta name="keywords" content="classified submission site, world classified submission site, travel classified,best tourist places in ahmedabad, best tourist places in world, best tourist places gujarat, best tourist place, places, tourist">
@endsection
@section('content')

    <!-- select category design  -->
    <section class="category-custom my-3 py-2 px-3">
        <div class="row align-items-center custom-row-view">
            <div class="col-md-5">
                <div class="location">
                    <label for="" class="py-2 label-custom">Category</label>
                    <select class="form-select home_search_category">
                        <option value="">Select Category</option>
                        @foreach ($category as $key => $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-5">
                <div class="location">
                    <label for="" class="py-2 label-custom">Where is it?</label>
                    <select class="form-select location_search home_search_city">
                        <option value="">Select location</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="location mt-4">
                    <button type="button" class="btn mt-3 w-100 fw-bold btn_yellow text-light" onclick="homeSearch()"><span class="pe-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path
                                    d="M13.1629 13.1759L17.5 17.5M15 8.75C15 12.2017 12.2017 15 8.75 15C5.29822 15 2.5 12.2017 2.5 8.75C2.5 5.29822 5.29822 2.5 8.75 2.5C12.2017 2.5 15 5.29822 15 8.75Z"
                                    stroke="#FFF" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                            </svg></span>Search
                    </button>
                </div>
            </div>

        </div>

    </section>
    <!-- select category design end -->

    <!-- top category section -->
    <section class="category-card-top  py-3  px-3">
        <div class="top-category">
            <div class="category-header text-center phone-header">
                <div>
                    <h2 class=" h1-header">Category</h2>
                </div>
            </div>
            <div class="category-card">
                <div class="row row-cols-2 row-cols-md-4 g-4 justify-content-center">
                    @foreach ($category as $value)
                        <a href="{{route('user.category',['category_url'=>$value->url_name])}}#middleSection" class="col" onclick="CategoryFilter('{{$value->id}}')">
                            <div class="card h-100 custom-category-card">
                                <div class="my-2">
                                    <img src="{{$value->image}}" alt="" class="home_category_image">
                                </div>
                                <div class="">
                                    <h6 class="phone-size">{{$value->name}}</h6>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
    <!-- top category section and -->

    <!-- Our Latest Blog  -->
    <section class="category-card-top my-3  py-3  px-3">
        <div class="latest-ads">
            <div class="category-header text-center phone-header">
                <div>
                    <h2 class=" h1-header">Our Latest Blog</h2>
                </div>
            </div>
            <div class="our-card">
                <div class="row row-cols-1 row-cols-md-3 g-4 ourLatestBlog">

                </div>
            </div>
        </div>
    </section>
    <!-- Our Latest Blog and  -->

    <!-- add section -->
    <section>
        <div class="container p-0">
            <div class="row">
                <div class="col-md-6">
                    <div class="payment-add">
                        <img src="{{ asset('public/user/img/pyment-add.png') }}" alt="" class="w-100">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="payment-add">
                        <img src="{{ asset('public/user/img/payment-add-2.png') }}" alt="" class="w-100">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- add section and -->

    <!-- Explore Top Locations section -->
    <section class="category-card-top my-3  py-3  px-3">
        <div class="category-header text-center phone-header">
            <div>
                <h2 class=" h1-header">Explore Top Locations</h2>
            </div>
        </div>
        <div class="Top-Locations">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="position-relative">
                        <img src="{{ asset('public/user/img/United Kingdom.png') }}" class="card-img-top" alt="...">
                        <div class="card-body text-center py-2 position-img">
                            <h5 class="card-title">United Kingdom</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="position-relative">
                        <img src="{{ asset('public/user/img/use.png') }}" class="card-img-top" alt="...">
                        <div class="card-body text-center py-2 position-img">
                            <h5 class="card-title">USA</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="position-relative">
                        <img src="{{ asset('public/user/img/Russia.png') }}" class="card-img-top" alt="...">
                        <div class="card-body text-center py-2 position-img">
                            <h5 class="card-title">Russia</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Explore Top Locations section and -->

    <!-- Explore Top Locations section -->
    <section class="category-card-top my-3  py-3  px-3">
        <div class="category-header  phone-header">
            <div>
                <h1 class="h1-header text-center">Explore the World – Discover the Best Places to Visit</h1>
            </div>
            <div class="location-card card-1">
                <p class="text-justify">World Classified Hub is a travel blog website where we share detailed information about different beautiful and interesting places around the world. Our only purpose is to provide useful and trustworthy blog content to help users explore new destinations and discover the best places to visit in the world.</p>
                <p class="text-justify">Whether you're looking for beaches, mountains, trekking spots, museums, or adventure locations, our blogs offer key details and travel tips for every place. We aim to inspire your travel journey with genuine, informative blogs that make exploring the world both exciting and accessible.</p>
                <p class="text-justify">Stay connected with us to discover inspiring places and plan your next adventure with us.</p>
            </div>
        </div>
        <div class="card location-card px-2 py-2 my-2">
            <div class="card-1">
                <h2 class="h1-header fw-bold">Why Should You Connect Here for the Best Places in the World?</h2>
            </div>
        </div>
        <div class="location-col">
            <div class="row w-100">
                <div class="col-md-12">
                    <div class="card location-card px-2 py-2 my-2">
                        <div class="card-1">
                            <p class="text-justify">We know the world is full of incredible destinations—and finding the right one can be overwhelming. That’s why our blog is here: to guide you with authentic, reliable, and inspiring travel content about the best places in the world.</p>
                            <p class="text-justify">Here’s why thousands of travelers trust us:</p>

                            <p class="text-justify m-0"><b>Trusted & Informative Content</b></p>
                            <p class="text-justify">We provide well-researched, reliable travel information written by real explorers and travel enthusiasts. Whether it’s a famous tourist spot or a hidden gem, you can trust our insights to help you plan better.</p>

                            <p class="text-justify m-0"><b>Vast Range of Destinations</b></p>
                            <p class="text-justify">From tropical beaches to snow-covered mountains, cultural cities to natural wonders, we cover a wide variety of places. No matter your mood or style, you’ll find a destination that suits you perfectly.</p>

                            <p class="text-justify m-0"><b>Multiple Travel Styles</b></p>
                            <p class="text-justify">Whether you're into solo adventures, romantic escapes, family vacations, or group tours, our blog offers suggestions and guides tailored to every kind of traveler.</p>

                            <p class="text-justify m-0"><b>Fast & Honest Guidance</b></p>
                            <p class="text-justify">Got questions about a destination? Our articles provide quick answers, useful tips, and real experiences to help you feel confident before you go.</p>
                            <p class="text-justify">Apart from that, we focus on value for money and responsible travel. Whether you're traveling on a budget or seeking luxury, our blog ensures you find what fits your needs while respecting local cultures and environments.</p>


                            {{-- <h4 class="h1-header fw-bold text-center">Book Taxi, Sit Back &amp; Relax! </h4> --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Explore Top Locations section and -->
@endsection
@push('js')
    <script>
        $('.index').addClass('active');

        ourLatestBlog()
        function ourLatestBlog()
        {
            var home_search_city = $('.home_search_city').val();
            var home_search_category = $('.home_search_category').val();

            var formData = new FormData();
            formData.append("type", 'ourLatestBlog');
            formData.append("city_id", home_search_city);
            formData.append("category_id", home_search_category);
            formData.append("_token", "{{ csrf_token() }}");

            var url = '{{ route('user.ourLatestBlog') }}';
            $.ajax({
                type: 'POST',
                url: url,
                processData: false,
                contentType: false,
                dataType: 'json',
                data: formData,
                dataSrc: "",
                beforeSend: function() {
                    $('.loader').removeClass('d-none');
                },
                complete: function(data, status) {
                    $('.loader').addClass('d-none');
                },
                success: function(data) {
                    if (data.status) {
                        if(data.data.length > 0)
                        {
                            $.each(data.data, function(index, value) {
                                var url = "{{ route('user.blogDetails',['slug'=>':slugs']) }}"
                                url = url.replace(':slugs',value.slug);
                                var mainColor = '{{$mainColor}}';

                                var ourLatestBlogElement = `<div class="col">
                                                            <div class="card h-100">
                                                                <div class="img-bg-card mx-2 my-2">
                                                                    <a href="${url}"><img src="${value.image}" class="card-img-top" alt="..."></a>
                                                                </div>
                                                                <div class="card-body">
                                                                <a href="${url}"><h6 class="card-title fs-5 pb-2 h1-header text-lg-start text-center">${value.title}</h6></a>
                                                                    <div class="d-flex">
                                                                        <div>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                                viewBox="0 0 20 20" fill="none">
                                                                                <g clip-path="url(#clip0_337_2717)">
                                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                        d="M10.302 9.36827C9.32503 9.36827 8.53317 8.5764 8.53317 7.5994C8.53317 6.62239 9.32503 5.83053 10.302 5.83053C11.279 5.83053 12.0709 6.62239 12.0709 7.5994C12.0709 8.5764 11.279 9.36827 10.302 9.36827ZM10.302 4.65129C8.67409 4.65129 7.35392 5.97086 7.35392 7.5994C7.35392 9.22794 8.67409 10.5475 10.302 10.5475C11.93 10.5475 13.2501 9.22794 13.2501 7.5994C13.2501 5.97086 11.93 4.65129 10.302 4.65129ZM10.302 17.623C9.32149 17.6283 4.40581 10.0646 4.40581 7.5994C4.40581 4.3435 7.04555 1.70317 10.302 1.70317C13.5585 1.70317 16.1983 4.3435 16.1983 7.5994C16.1983 10.0316 11.2672 17.6283 10.302 17.623ZM10.302 0.523926C6.39461 0.523926 3.22656 3.69197 3.22656 7.5994C3.22656 10.5581 9.12574 19.3983 10.302 19.3919C11.4601 19.3983 17.3775 10.518 17.3775 7.5994C17.3775 3.69197 14.2095 0.523926 10.302 0.523926Z"
                                                                                        fill="${mainColor}" />
                                                                                </g>
                                                                                <defs>
                                                                                    <clipPath id="clip0_337_2717">
                                                                                        <rect width="18.8679" height="18.8679" fill="white"
                                                                                            transform="translate(0.86792 0.523926)" />
                                                                                    </clipPath>
                                                                                </defs>
                                                                            </svg>
                                                                        </div>
                                                                        <div class="ps-1">
                                                                            <p class="mb-0 h1-header">${value.cityName}</p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="d-flex">
                                                                        <div>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="19"
                                                                                viewBox="0 0 20 19" fill="none">
                                                                                <path
                                                                                    d="M10.302 16.5518C14.2097 16.5518 17.3775 13.3841 17.3775 9.47635C17.3775 5.56868 14.2097 2.40088 10.302 2.40088C6.39436 2.40088 3.22656 5.56868 3.22656 9.47635C3.22656 13.3841 6.39436 16.5518 10.302 16.5518Z"
                                                                                    stroke="{{$mainColor}}" stroke-width="1.17925" stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                                <path d="M10.302 4.75952V9.4765" stroke="{{$mainColor}}" stroke-width="1.17925"
                                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                                <path d="M13.6353 12.8097L10.302 9.47632" stroke="{{$mainColor}}"
                                                                                    stroke-width="1.17925" stroke-linecap="round" stroke-linejoin="round" />
                                                                            </svg>
                                                                        </div>
                                                                        <div class="ps-1">
                                                                            <p class="mb-0 h1-header">${value.date}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>`
                                $('.ourLatestBlog').append(ourLatestBlogElement);
                            })
                        }
                        else
                        {
                            $('.ourLatestBlog').html('<h2 class=" h1-header text-center w-100 mt-3">No data found </h2>');
                        }
                    }
                }
            });
        }
        function homeSearch()
        {
            var home_search_city = $('.home_search_city').val();
            var home_search_category = $('.home_search_category').val();
            if(home_search_city && home_search_category)
            {
                $('.ourLatestAds').html('');
                document.location.href = "#OurLatestAds";
                ourLatestAds()
            }
            else{
                alert('Both field is required')
                return true;
            }
        }
    </script>
@endpush
