@extends('user.layout.app')
@section('meta')
    <title>Your Perfect Web Location Awaits</title>
    <meta name="description" content="Looking for international classifieds? Visit our location page to browse listings from all over the world and connect with sellers.">
    <meta name="keywords" content="classified submission site, world classified submission site, travel classified">
@endsection
@section('content')

    <!-- select category design  -->
    <section class="category-custom my-3 py-2 px-3">
        <div class="row align-items-center custom-row-view">
            <div class="col-md-5">
                <div class="location">
                    <label for="" class="py-2 label-custom">Category</label>
                    <select class="form-select location_search_category">
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
                    <select class="form-select location_search">
                        <option value="">Select location</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="location mt-4">
                    <button type="button" class="btn mt-3 w-100 fw-bold search_location btn_yellow text-light"><span class="pe-2">
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
    <div class="all_locations category-card-top mb-3 py-3  px-3" id="middleSection">
        <div class="text-center">
            <h2 class="text-center h1-header">All Locations</h2>
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="3" viewBox="0 0 64 3" fill="none">
                <path d="M2 1.5H62" stroke="{{$mainColor}}" stroke-width="3" stroke-linecap="round" />
            </svg>

        </div>
        <div class="row show_all_location" id="content">
        </div>

    </div>

@endsection
@push('js')
    <script>
        $('.menu_locations').addClass('active');

        // ALL LOCATION GET START
            var offset = 0
            allLocation()
            function allLocation() {
                var formData = new FormData();
                formData.append("offset", offset);
                formData.append("type", 'allLocation');
                formData.append("_token", "{{ csrf_token() }}");
                var url = '{{ route('user.location') }}';
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

                                var location_url = "{{ route('user.location_detail', ['country' => ':countrys', 'state' => ':states', 'city' => ':citys']) }}";
                                location_url = location_url.replace(':countrys', value.country.slug);
                                location_url = location_url.replace(':states', value.state.slug);
                                location_url = location_url.replace(':citys', value.slug);
                                var title_list = ``;

                                var all_location = `<div class="col-lg-4 col-sm-6 py-2">
                                                    <div>
                                                        <div class="location_box_card p-3">
                                                            <a href="${location_url}" class="text-center">
                                                                <h4 class="fw-bold h1-header mb-0">${value.name}</h4>
                                                                <h6 class="text-theme">${value.state.name+`, `+ value.country.name}</h6>
                                                                <p class="text-theme mb-0">(${value.blog.length} Blog)</p>
                                                            </a>
                                                            <hr class="text-theme">
                                                            <div>
                                                                ${title_list}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`
                                $('.show_all_location').append(all_location)
                            });
                        }
                    }
                });
            }
        // ALL LOCATION GET EMD

        // PAGE SCROLL TIME LOAD DATA START
            $('#middleSection').scroll(function() {
                if ($('#middleSection').scrollTop() + $('#middleSection').height() >= $('#content').height() + 60) {
                    offset += 10
                    allLocation()
                }
            });
        // PAGE SCROLL TIME LOAD DATA END

        // SEARCH SINGLE LOCATION START
            $('.search_location').click(function(){
                var category_id = $('.location_search_category').val();
                var city_id = $('.location_search').val();
                if(city_id && category_id)
                {
                    var formData = new FormData();
                    formData.append("city_id", city_id);
                    formData.append("category_id", category_id);
                    formData.append("type", 'singleSearchLocation');
                    formData.append("_token", "{{ csrf_token() }}");
                    var url = '{{ route('user.location') }}';
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
                                var title_list = ``;
                                if (data.data) {
                                    var location_url = "{{ route('user.location_detail', ['country' => ':countrys', 'state' => ':states', 'city' => ':citys']) }}";
                                    location_url = location_url.replace(':countrys', data.data.country.slug);
                                    location_url = location_url.replace(':states', data.data.state.slug);
                                    location_url = location_url.replace(':citys', data.data.slug);

                                    var all_location = `<div class="col-lg-4 col-sm-6 py-2">
                                                        <a href="${location_url}">
                                                            <div class="location_box_card p-3">
                                                                <div class="text-center">
                                                                    <h4 class="fw-bold h1-header mb-0">${data.data.name}</h4>
                                                                    <h6 class="text-theme">${data.data.state.name+`, `+ data.data.country.name}</h6>
                                                                    <p class="text-theme mb-0">(${data.data.blog.length} Blog)</p>
                                                                </div>
                                                                <hr class="text-theme">
                                                                <div>
                                                                    ${title_list}
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>`
                                }
                                else
                                {
                                    all_location = `<h3 class="text-center"><b>No Data Found</b></h3>`
                                }
                                    $('.show_all_location').html(all_location)
                            }
                        }
                    });
                }
                else{
                    alert('Both field is required')
                    return true;
                }
            })
        // SEARCH SINGLE LOCATION END
    </script>
@endpush
