@extends('user.layout.app')
@section('meta')
    <title>Contact Us Page</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
@endsection
@section('content')
    <!-- contact section  -->
    <div class="get_in_tuch my-3">
        <div class="d-flex justify-content-center align-items-center">
            <form action="" name="formData" onsubmit="return false;" method="POST">
                <div class="container py-3">
                    <h2 class="text-center mb-3 h1-header">Get In Touch</h2>

                    <!-- <p class="text-center">We are here for you! How can we help?</p> -->

                    <label for="name"><b>Your Name *</b></label>
                    <div class="d-flex input_part py-2 px-3 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 20 20"
                            fill="none">
                            <path
                                d="M3.66675 17.5C3.66675 14.2783 6.27842 11.6667 9.50008 11.6667C12.7217 11.6667 15.3334 14.2783 15.3334 17.5M12.8334 5.83333C12.8334 7.67428 11.341 9.16667 9.50008 9.16667C7.65913 9.16667 6.16675 7.67428 6.16675 5.83333C6.16675 3.99238 7.65913 2.5 9.50008 2.5C11.341 2.5 12.8334 3.99238 12.8334 5.83333Z"
                                stroke="{{$mainColor}}" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <input type="text" placeholder="Enter Name" name="name">
                    </div>
                    <div class="text-danger errmsg errmsg_name"></div>

                    <label for="email"><b>Your E-mail *</b></label>
                    <div class="d-flex input_part py-2 px-3 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 20 21"
                            fill="none">
                            <path
                                d="M17 7L14.0327 8.64852C12.3783 9.56758 11.5512 10.0272 10.6752 10.2073C9.89983 10.3668 9.10017 10.3668 8.32483 10.2073C7.44887 10.0272 6.62169 9.56758 4.96733 8.64852L2 7M4.66667 16.1667H14.3333C15.2667 16.1667 15.7335 16.1667 16.09 15.985C16.4036 15.8253 16.6586 15.5703 16.8183 15.2567C17 14.9002 17 14.4334 17 13.5V7.16667C17 6.23325 17 5.76653 16.8183 5.41002C16.6586 5.09641 16.4036 4.84144 16.09 4.68166C15.7335 4.5 15.2667 4.5 14.3333 4.5H4.66667C3.73325 4.5 3.26653 4.5 2.91002 4.68166C2.59641 4.84144 2.34144 5.09641 2.18166 5.41002C2 5.76653 2 6.23324 2 7.16667V13.5C2 14.4334 2 14.9002 2.18166 15.2567C2.34144 15.5703 2.59641 15.8253 2.91002 15.985C3.26653 16.1667 3.73324 16.1667 4.66667 16.1667Z"
                                stroke="{{$mainColor}}" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <input type="text" placeholder="Enter Your Email" name="email">
                    </div>
                    <div class="text-danger errmsg errmsg_email"></div>

                    <label for="sub"><b>Subject *</b></label>
                    <div class="d-flex input_part py-2 px-3 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 20 21"
                            fill="none">
                            <path
                                d="M12.5005 10.5C12.5005 11.8807 11.3812 13 10.0005 13C8.6198 13 7.50049 11.8807 7.50049 10.5C7.50049 9.11925 8.6198 8 10.0005 8C11.3812 8 12.5005 9.11925 12.5005 10.5Z"
                                stroke="{{$mainColor}}" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M10.0009 4.66675C6.26954 4.66675 3.11097 7.11915 2.04907 10.5001C3.11096 13.881 6.26954 16.3334 10.0009 16.3334C13.7323 16.3334 16.8908 13.881 17.9528 10.5001C16.8908 7.11917 13.7323 4.66675 10.0009 4.66675Z"
                                stroke="{{$mainColor}}" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <input type="text" placeholder="Enter Subject" name="subject">
                    </div>
                    <div class="text-danger errmsg errmsg_subject"></div>

                    <label for="email"><b>Your Mobile No. *</b></label>
                    <div class="d-flex input_part py-2 px-3 mb-2">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="{{$mainColor}}" stroke="none">
                                <path d="M916 5105 c-81 -21 -164 -67 -249 -140 -94 -81 -431 -424 -486 -495 -223 -285 -227 -728 -11 -1300 263 -699 756 -1407 1380 -1982 860 -793 2012 -1306 2605 -1162 88 21 234 89 301 140 68 51 520 515 562 576 78 113 108 264 78 392 -34 143 -45 156 -480 592 -439 439 -453 450 -598 480 -115 24 -232 3 -345 -62 -26 -16 -150 -129 -275 -253 l-227 -224 -73 38 c-179 93 -311 182 -508 344 -202 166 -484 457 -640 661 -113 148 -279 421 -280 458 0 7 78 89 173 182 200 195 279 286 324 372 56 109 67 247 28 361 -39 116 -77 160 -459 543 -378 378 -436 428 -544 465 -75 27 -199 33 -276 14z m232 -281 c28 -16 188 -167 403 -383 389 -390 404 -408 403 -511 0 -91 -24 -123 -285 -384 -132 -131 -247 -252 -255 -269 -12 -21 -15 -50 -12 -99 3 -60 11 -83 72 -204 138 -274 320 -515 621 -823 299 -306 597 -534 904 -692 109 -56 130 -64 180 -63 34 0 70 7 91 18 19 10 143 126 275 257 170 169 253 244 285 258 60 27 138 27 193 0 60 -30 767 -736 798 -798 17 -33 24 -63 24 -106 0 -103 -21 -131 -305 -416 -281 -282 -307 -301 -457 -335 -145 -32 -388 -6 -634 67 -375 111 -879 377 -1294 683 -799 588 -1485 1487 -1770 2318 -136 395 -151 678 -47 888 32 67 62 101 270 312 128 130 251 248 272 263 90 62 182 69 268 19z" />
                            </g>
                        </svg>
                        <input type="text" placeholder="Enter Your Mobile No." name="mobile" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\.*?)\..*/g, '$1');">
                    </div>
                    <div class="text-danger errmsg errmsg_mobile"></div>

                    <label for="psw"><b>Your Message</b></label>
                    <div class="d-flex input_part py-2 px-3 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 20 21"
                            fill="none">
                            <path
                                d="M12.5005 10.5C12.5005 11.8807 11.3812 13 10.0005 13C8.6198 13 7.50049 11.8807 7.50049 10.5C7.50049 9.11925 8.6198 8 10.0005 8C11.3812 8 12.5005 9.11925 12.5005 10.5Z"
                                stroke="{{$mainColor}}" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M10.0009 4.66675C6.26954 4.66675 3.11097 7.11915 2.04907 10.5001C3.11096 13.881 6.26954 16.3334 10.0009 16.3334C13.7323 16.3334 16.8908 13.881 17.9528 10.5001C16.8908 7.11917 13.7323 4.66675 10.0009 4.66675Z"
                                stroke="{{$mainColor}}" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <textarea id="" cols="30" rows="4" name="message"
                            placeholder="Enter Your Message here..."></textarea>
                    </div>
                    <button data-mdb-ripple-init type="submit" class="btn custom-btn btn-block w-100 text-light fw-bold"
                        id="SubmitData">Send</button>
                </div>
            </form>
        </div>
    </div>

    <!--Advertwise banner section and -->
@endsection
@push('js')
    <script>
        $('.contact').addClass('active');

        $('#SubmitData').click(function() {
            $('input').removeClass('border border-danger');
            $('select').removeClass('border-danger');
            $('textarea').removeClass('border border-danger');
            $('.errmsg').text('')
            var form = document.formData;
            var formData = new FormData(form);
            formData.append("_token", "{{ csrf_token() }}");
            var url = '{{ route('user.contact_us') }}';
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
                    if (data.status == 401) {
                        $.each(data.error1, function(index, value) {
                            $('.err_' + index + ' input').addClass('border border-danger');
                            $('.err_' + index + ' select').addClass('border-danger');
                            $('.err_' + index + ' textarea').addClass('border border-danger');
                            $('.errmsg_' + index).text(value);
                        });
                    }
                    if (data.status == 1) {
                        $('form')[0].reset()
                        Swal.fire({
                            text: data.message,
                            icon: "success",
                        })
                        // window.location.href = data.redirect;
                    }
                }
            });
        });
    </script>
@endpush
