@extends('user.layout.app')
@section('meta')
    <title>Your Comfort, Our Priority</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <style>
        p{
            color: #000 !important;
            text-align: justify;
        }
    </style>
@endsection
@section('content')

<!-- select category design  -->
<section class="category-custom my-3 py-2 px-3">
    <div class="row align-items-center custom-row-view">
        <div class="col-md-10">
            <div class="location">
                <label for="" class="py-2 label-custom">Where is it?</label>
                <select class="form-select location_search blog_get_city">
                    <option value="">Select location</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="location mt-4">
                <button type="button" class="btn mt-3 w-100 fw-bold btn_yellow" onclick="blogSearch()"><span class="pe-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M13.1629 13.1759L17.5 17.5M15 8.75C15 12.2017 12.2017 15 8.75 15C5.29822 15 2.5 12.2017 2.5 8.75C2.5 5.29822 5.29822 2.5 8.75 2.5C12.2017 2.5 15 5.29822 15 8.75Z" stroke="#000" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
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

<!-- Our Latest Blog section -->
<section class="Our_Latest_Ads mt-3" id="middleSection">
    <div class="latest_ads p-3 mb-3">
        <div class="row">
            <div class="col-md-4 ">
            </div>
            <div class="col-md-4 ">
                <div>
                    <h2 class="text-center h1-header">Our Latest Blog</h2>
                </div>
            </div>
        </div>
        <div id="content" class="show_all_post"></div>
    </div>
</section>

@if ($single_category->content)
    <section class="category-card-top my-3  py-3  px-3">
        <div class="category-header text-center phone-header">
            <div>
                <h1 class=" h1-header">{{ $single_category->name }}</h1>
            </div>
        </div>
        <div class="location-col">
            <div class="row w-100">
                <div class="col-md-12">
                    <div class="card location-card px-2 py-2 my-2">
                        <div class="card-1">
                            {!! $single_category->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection
@push('js')
<script>

    var offset = 0
    allBlog()

    // GET ALL POST START
        function allBlog() {
            var blog_get_city = $('.blog_get_city').val();
            var blog_get_category = '{{$single_category->id}}';
            var formData = new FormData();
            formData.append("offset", offset);
            formData.append("type", 'AllPost');
            formData.append("city_id", blog_get_city);
            formData.append("category_id", blog_get_category);
            formData.append("_token", "{{ csrf_token() }}");

            var url = '{{ route('user.blog') }}';
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
                        $.each(data.data, function(index, value) {

                            var post_view = "{{ route('user.blogDetails',['slug'=>':slugs']) }}"
                                post_view = post_view.replace(':slugs',value.slug);

                            var all_post = `<div>
                                                <div class="row latest_ads_card mt-4">
                                                <div class="col-md-3">
                                                    <div class="img_bg">
                                                        <a href="${post_view}"><img src="${value.image}" class="h-100 w-100" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex flex-column justify-content-between h-100">
                                                        <div>
                                                            <a href="${post_view}"><h4 class="h1-header text-lg-start text-center mt-lg-0 mt-3">${value.title}</h4></a>
                                                            <a href="${post_view}"><h6 class="h1-header mt-3 mt-lg-0 text-lg-start text-center">${value.shortTitle}</h6></a>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 d-flex flex-column ">
                                                                <div class="svg_color">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                                        <g clip-path="url(#clip0_337_2717)">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.302 9.36827C9.32503 9.36827 8.53317 8.5764 8.53317 7.5994C8.53317 6.62239 9.32503 5.83053 10.302 5.83053C11.279 5.83053 12.0709 6.62239 12.0709 7.5994C12.0709 8.5764 11.279 9.36827 10.302 9.36827ZM10.302 4.65129C8.67409 4.65129 7.35392 5.97086 7.35392 7.5994C7.35392 9.22794 8.67409 10.5475 10.302 10.5475C11.93 10.5475 13.2501 9.22794 13.2501 7.5994C13.2501 5.97086 11.93 4.65129 10.302 4.65129ZM10.302 17.623C9.32149 17.6283 4.40581 10.0646 4.40581 7.5994C4.40581 4.3435 7.04555 1.70317 10.302 1.70317C13.5585 1.70317 16.1983 4.3435 16.1983 7.5994C16.1983 10.0316 11.2672 17.6283 10.302 17.623ZM10.302 0.523926C6.39461 0.523926 3.22656 3.69197 3.22656 7.5994C3.22656 10.5581 9.12574 19.3983 10.302 19.3919C11.4601 19.3983 17.3775 10.518 17.3775 7.5994C17.3775 3.69197 14.2095 0.523926 10.302 0.523926Z" fill="{{$mainColor}}"></path>
                                                                        </g>
                                                                        <defs>
                                                                            <clipPath id="clip0_337_2717">
                                                                                <rect width="18.8679" height="18.8679" fill="white" transform="translate(0.86792 0.523926)"></rect>
                                                                            </clipPath>
                                                                        </defs>
                                                                    </svg>
                                                                    ${value.cityName}
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 d-flex flex-column text-md-end">
                                                                <div class="svg_color">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19" fill="none">
                                                                        <path d="M10.302 16.5518C14.2097 16.5518 17.3775 13.3841 17.3775 9.47635C17.3775 5.56868 14.2097 2.40088 10.302 2.40088C6.39436 2.40088 3.22656 5.56868 3.22656 9.47635C3.22656 13.3841 6.39436 16.5518 10.302 16.5518Z" stroke="{{$mainColor}}" stroke-width="1.17925" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        <path d="M10.302 4.75952V9.4765" stroke="{{$mainColor}}" stroke-width="1.17925" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        <path d="M13.6353 12.8097L10.302 9.47632" stroke="{{$mainColor}}" stroke-width="1.17925" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                    ${value.date}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`
                            $('.show_all_post').append(all_post)
                        });
                    }
                }
            });
        }
    // GET ALL POST END

    // PAGE SCROLL TIME LOAD DATA START
        $('#middleSection').scroll(function() {
            if ($('#middleSection').scrollTop() + $('#middleSection').height() >= $('#content').height() + 100) {
                offset += 9
                allBlog()
            }
        });
    // PAGE SCROLL TIME LOAD DATA END

    function blogSearch()
    {
        var blog_get_city = $('.blog_get_city').val();
        var blog_get_category = '{{$single_category->id}}';


        if(blog_get_city && blog_get_category)
        {
            offset = 0
            $('.show_all_post').html('')
            document.location.href = "#middleSection";
            allBlog()
        }
        else{
            alert('Location field is required')
            return true;
        }
    }


</script>
@endpush
