@extends('user.layout.app')
@section('meta')
    <title>Location Details</title>
    <meta name="description"
        content="Looking for the best taxi service in {{ $variable->name ?? '' }}? Choose our reliable and affordable service for local and outstation rides. Book now for a seamless travel experience!">
    <meta name="keywords" content="">
    <style>
        p {
            text-align: justify;
        }
    </style>
@endsection
@section('content')

    <!-- Our Latest Blog section -->
    <section class="Our_Latest_Ads">
        <div class="latest_ads p-3 mb-3">
            <div class="row">
                <div class="col-md-12 ">
                    <div>
                        <h2 class="text-center h1-header">Latest Blog in {{ $variable->name ?? '' }}</h2>
                    </div>
                </div>
            </div>
            <div id="content" class="show_all_post">
                @if (isset($blogData) && count($blogData) > 0)
                    @foreach ($blogData as $key => $value)
                        @php
                            $user_url = '#';
                            $post_view = route('user.blogDetails', ['slug' => $value->slug]);
                        @endphp
                        <div>
                            <div class="row latest_ads_card mt-4">
                                <div class="col-md-3">
                                    <div class="img_bg">
                                        <a href="{{ $post_view }}"><img src="{{ $value->image }}" class="h-100 w-100"
                                                alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="d-flex flex-column justify-content-between h-100">
                                        <div>
                                            <a href="{{ $post_view }}">
                                                <h4 class="h1-header text-lg-start text-center mt-3 mt-lg-0">
                                                    {{ $value->title }}</h4>
                                            </a>
                                            <a href="{{ $post_view }}">
                                                <h6 class="h1-header text-lg-start text-center mt-3 mt-lg-0">
                                                    {{ $value->shortTitle }}</h6>
                                            </a>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 d-flex flex-column ">
                                                <div class="svg_color">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 20 20" fill="none">
                                                        <g clip-path="url(#clip0_337_2717)">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M10.302 9.36827C9.32503 9.36827 8.53317 8.5764 8.53317 7.5994C8.53317 6.62239 9.32503 5.83053 10.302 5.83053C11.279 5.83053 12.0709 6.62239 12.0709 7.5994C12.0709 8.5764 11.279 9.36827 10.302 9.36827ZM10.302 4.65129C8.67409 4.65129 7.35392 5.97086 7.35392 7.5994C7.35392 9.22794 8.67409 10.5475 10.302 10.5475C11.93 10.5475 13.2501 9.22794 13.2501 7.5994C13.2501 5.97086 11.93 4.65129 10.302 4.65129ZM10.302 17.623C9.32149 17.6283 4.40581 10.0646 4.40581 7.5994C4.40581 4.3435 7.04555 1.70317 10.302 1.70317C13.5585 1.70317 16.1983 4.3435 16.1983 7.5994C16.1983 10.0316 11.2672 17.6283 10.302 17.623ZM10.302 0.523926C6.39461 0.523926 3.22656 3.69197 3.22656 7.5994C3.22656 10.5581 9.12574 19.3983 10.302 19.3919C11.4601 19.3983 17.3775 10.518 17.3775 7.5994C17.3775 3.69197 14.2095 0.523926 10.302 0.523926Z"
                                                                fill="{{ $mainColor }}"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_337_2717">
                                                                <rect width="18.8679" height="18.8679" fill="white"
                                                                    transform="translate(0.86792 0.523926)"></rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                    {{ $value->city->name }} | {{ $value->city->state->name }} |
                                                    {{ $value->city->country->name }}
                                                </div>
                                            </div>
                                            <div class="col-md-6 d-flex flex-column text-md-end">
                                                <div class="svg_color">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="19"
                                                        viewBox="0 0 20 19" fill="none">
                                                        <path
                                                            d="M10.302 16.5518C14.2097 16.5518 17.3775 13.3841 17.3775 9.47635C17.3775 5.56868 14.2097 2.40088 10.302 2.40088C6.39436 2.40088 3.22656 5.56868 3.22656 9.47635C3.22656 13.3841 6.39436 16.5518 10.302 16.5518Z"
                                                            stroke="{{ $mainColor }}" stroke-width="1.17925"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M10.302 4.75952V9.4765" stroke="{{ $mainColor }}"
                                                            stroke-width="1.17925" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path d="M13.6353 12.8097L10.302 9.47632"
                                                            stroke="{{ $mainColor }}" stroke-width="1.17925"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    {{ $value->date }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                @endif
            </div>
        </div>

        </div>
    </section>
    <!--Advertwise banner section and -->
@endsection
@push('js')
    <script>
        $('.menu_locations').addClass('active');
    </script>
@endpush
