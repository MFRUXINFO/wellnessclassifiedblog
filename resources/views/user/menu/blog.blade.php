@extends('user.layout.app')
@section('meta')
    <title>Blog Page</title>
    <meta name="description" content="Free to attract users looking for cost-effective solutions.">
    <meta name="keywords" content="classified submission site, world classified submission site, travel classified">
@endsection
@section('content')

<!-- select category design  -->
<section class="category-custom my-3 py-2 px-3">
    <div class="row align-items-center custom-row-view">
        <div class="col-md-5">
            <div class="location">
                <label for="" class="py-2 label-custom">Category</label>
                <select class="form-select blog_get_category">
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
                <select class="form-select location_search blog_get_city">
                    <option value="">Select location</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="location mt-4">
                <button type="button" class="btn mt-3 w-100 fw-bold btn_yellow text-light" onclick="blogSearch()"><span class="pe-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M13.1629 13.1759L17.5 17.5M15 8.75C15 12.2017 12.2017 15 8.75 15C5.29822 15 2.5 12.2017 2.5 8.75C2.5 5.29822 5.29822 2.5 8.75 2.5C12.2017 2.5 15 5.29822 15 8.75Z" stroke="#FFF" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                        </svg></span>Search
                </button>
            </div>
        </div>

    </div>

</section>
<!-- select category design end -->

<!-- Our Latest Blog section -->
<section class="Our_Latest_Blog" id="middleSection">
    <div class="latest_blog p-3 mb-3">
        <div class="row">
            <div class="col-md-4 ">
            </div>
            <div class="col-md-4 ">
                <div>
                    <h2 class="text-center h1-header">Our Latest Blog</h2>
                </div>
            </div>
        </div>

        <div id="content" class="show_all_post">
        </div>

    </div>
</section>

@endsection
@push('js')
<script>
    $('.blog').addClass('active');

    var offset = 0
    allBlog()

    // GET ALL POST START
        function allBlog() {
            var blog_get_city = $('.blog_get_city').val();
            var blog_get_category = $('.blog_get_category').val();
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

                            var all_post = `<div class="mt-3">
                                                <div class="row latest_blog_card">
                                                <div class="col-md-3">
                                                    <div class="img_bg">
                                                        <a href="${post_view}"><img src="${value.image}" class="h-100 w-100" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex flex-column justify-content-between h-100">
                                                        <div>
                                                            <a href="${post_view}"><h4 class="h1-header mt-3 mt-lg-0 text-lg-start text-center">${value.title}</h4></a>
                                                            <a href="${post_view}"><h6 class="h1-header mt-3 mt-lg-0 text-lg-start text-center">${value.shortTitle}</h6></a>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 d-flex flex-column ">
                                                                <div class="svg_color h1-header">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none"><g clip-path="url(#clip0_601_539)"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.45291 9.77818C8.47591 9.77818 7.68405 8.98632 7.68405 8.00931C7.68405 7.03231 8.47591 6.24044 9.45291 6.24044C10.4299 6.24044 11.2218 7.03231 11.2218 8.00931C11.2218 8.98632 10.4299 9.77818 9.45291 9.77818ZM9.45291 5.0612C7.82497 5.0612 6.5048 6.38077 6.5048 8.00931C6.5048 9.63785 7.82497 10.9574 9.45291 10.9574C11.0809 10.9574 12.401 9.63785 12.401 8.00931C12.401 6.38077 11.0809 5.0612 9.45291 5.0612ZM9.45291 18.0329C8.47237 18.0382 3.55669 10.4745 3.55669 8.00931C3.55669 4.75341 6.19643 2.11308 9.45291 2.11308C12.7094 2.11308 15.3491 4.75341 15.3491 8.00931C15.3491 10.4415 10.4181 18.0382 9.45291 18.0329ZM9.45291 0.933838C5.54548 0.933838 2.37744 4.10188 2.37744 8.00931C2.37744 10.968 8.27662 19.8083 9.45291 19.8018C10.6109 19.8083 16.5284 10.9279 16.5284 8.00931C16.5284 4.10188 13.3603 0.933838 9.45291 0.933838Z" fill="{{$mainColor}}" /></g>
                                                                        <defs><clipPath id="clip0_601_539"><rect width="18.8679" height="18.8679" fill="{{$mainColor}}" transform="translate(0.0188599 0.933838)" /></clipPath></defs>
                                                                    </svg>
                                                                    ${value.cityName}
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 d-flex flex-column text-md-end">
                                                                <div class="svg_color h1-header">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M9.98111 17.4432C13.8888 17.4432 17.0566 14.2754 17.0566 10.3677C17.0566 6.46004 13.8888 3.29224 9.98111 3.29224C6.07344 3.29224 2.90564 6.46004 2.90564 10.3677C2.90564 14.2754 6.07344 17.4432 9.98111 17.4432Z" stroke="{{$mainColor}}" stroke-width="1.17925" stroke-linecap="round" stroke-linejoin="round" /><path d="M9.98108 5.65088V10.3679" stroke="{{$mainColor}}" stroke-width="1.17925" stroke-linecap="round" stroke-linejoin="round" /><path d="M13.3144 13.701L9.98108 10.3677" stroke="{{$mainColor}}" stroke-width="1.17925" stroke-linecap="round" stroke-linejoin="round" /></svg>
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
        var blog_get_category = $('.blog_get_category').val();
        if(blog_get_city && blog_get_category)
        {
            offset = 0
            $('.show_all_post').html('')
            allBlog()
        }
        else{
            alert('Both field is required')
            return true;
        }

    }


</script>
@endpush
