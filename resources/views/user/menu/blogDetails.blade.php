@extends('user.layout.app')
@section('meta')
    <title>{{ $data->metaTitle }}</title>
    <meta name="description" content="{{ $data->metaDescription }}">
    <meta name="keywords" content="{{ $data->metaKeyword }}">
@endsection
@section('content')

    <div class="pb-3 text-theme"><a href="{{ route('user.index') }}" class="text-theme">Home</a> / <a href="{{ route('user.blog') }}" class="text-theme">All Blog</a> / <a class="h1-header">{{ $data->title }}</a></div>
    <!-- top category section -->
    <section class="category-card-top  py-3  px-3">
        <div class="top-category">
            <div class="category-header">
                <div class="text-center">
                    <h1 class="h1-header">Our Latest Blog</h1>
                </div>
                <div class="latest_add_page">
                    @if ($data->image)
                        <div class="col-lg-8 mx-auto">
                            <img src="{{ $data->image }}" alt="" class="w-100 h-100 object-fit-contain">
                        </div>
                    @endif
                    <div class="Hire_Professional p-3 mt-3">
                        <div class="row align-items-center">
                            <div>
                                <h3 class="h1-header text-lg-start text-center"><b>{{ $data->title }}</b></h3>
                                <h5 class="h1-header text-lg-start text-center">{{ $data->shortTitle }}</h5>
                            </div>
                        </div>
                        <div class="d-flex hire-d-flex">
                            <div class="loc_color h1-header me-2">
                                <i class="fa-solid fa-location-dot"></i> {{ $data->city->name ?? '' }}
                            </div>
                            <div class="loc_color h1-header me-2">
                                <i class="fa-regular fa-clock"></i> {{ date_format(date_create($data->date), 'd-m-Y') }}
                            </div>
                            <div class="loc_color h1-header me-2">
                                <i class="fa-solid fa-layer-group"></i> {{ $data->category->name ?? '' }}
                            </div>
                        </div>

                        <hr>
                        <div class="text-theme">
                            <p>{!! $data->content !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- top category section and -->

@endsection
@push('js')
    <script>
        $('.blog').addClass('active');
    </script>
@endpush
