<!DOCTYPE html>
<html lang="en">
@php
    // $mainBody = '#fff';
    // $mainColor = '#00A79D';
    // $mainBgColor = '#fff';
    // $mainFontColor = '#000';

    // $mainBody = '#404040';
    // $mainColor = '#FFC005';
    // $mainBgColor = '#181818';
    // $mainFontColor = '#fff';
    $mainBody = App\Models\WebConfig::where('name','bodyColor')->first()->description ?? '';
    $mainColor = App\Models\WebConfig::where('name','themeColor')->first()->description ?? '';
    $mainBgColor = App\Models\WebConfig::where('name','backgroundColor')->first()->description ?? '';
    $mainFontColor = App\Models\WebConfig::where('name','fontColor')->first()->description ?? '';
    $logo = App\Models\WebConfig::where('name','logo')->first()->description ?? '';
    $faviconLogo = App\Models\WebConfig::where('name','faviconLogo')->first()->description ?? '';
    $logoImage = '';
    $faviconLogoImage = '';
    if(File::exists(public_path($logo)) && !empty($logo))
    {
        $logoImage = asset('public/'.$logo);
    }
    if(File::exists(public_path($faviconLogo)) && !empty($faviconLogo))
    {
        $faviconLogoImage = asset('public/'.$faviconLogo);
    }

@endphp
<head>
    <style>
        :root {
            /* World */
            --mainBody: {{$mainBody}};
            --mainColor: {{$mainColor}};
            --mainBgColor: {{$mainBgColor}};
            --mainFontColor: {{$mainFontColor}};

            /* Drive */
            /* --mainBody: #404040;
            --mainColor: #FFC005;
            --mainBgColor: #181818;
            --mainFontColor: #fff; */
        }
        p,span,h1,h2,h3,h4,h5,h6,li,a{
            font-family: math !important;
        }
        a,p,h6{
            font-size: 18px !important;
        }
        h2,h1{
            font-weight: 600 !important;
        }


    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="{{ url()->current() }}/" />
    <link href="{{ $faviconLogoImage }}" rel="shortcut icon">
    <link rel="icon" href="{{ $faviconLogoImage }}">

    @yield('meta')
    <meta property="og:title" content="World Classified - Discover Endless Fun" />
    <meta property="og:description" content="Make your travel planning easier with our list of national and international travel agencies. Find affordable solo and group tour packages for your next holiday, classified submission site, world classified submission site, travel classified,best tourist places in ahmedabad, best tourist places in world, best tourist places gujarat, best tourist place, places, tourist" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://www.worldclassifiedhub.com/" />
    <meta property="og:image" content="{{asset('public/user/img/drive_classified_logo.png')}}">
    <meta property="og:locale" content="en_US">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="twitter:title" property="og:title" content="World Classified - Discover Endless Fun">
    <meta name="twitter:description" property="og:description" content="Make your travel planning easier with our list of national and international travel agencies. Find affordable solo and group tour packages for your next holiday, classified submission site, world classified submission site, travel classified,best tourist places in ahmedabad, best tourist places in world, best tourist places gujarat, best tourist place, places, tourist">
    <meta property="og:site_name" content="www.worldclassifiedhub.com">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@worldclassifiedhub">
    <meta name="twitter:domain" content="www.worldclassifiedhub.com">
    <meta name="twitter:creator" content="@worldclassifiedhub">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/public/user/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/user/css/media.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ $faviconLogoImage }}">

    {{-- DROPDOWN SEARCH CSS --}}
    <link rel="stylesheet" href="{{ asset('public/user/css/select2.min.css') }}">

</head>

<body>
    <section>
        <div class="container-fluid">
            <div class="row">
                @include('user.layout.header')
                {{-- <div class="col-md-2">
                    <div id="ftdiv9129264" style="position: relative; width: 160px; height: 600px;"><a href="https://googleads.g.doubleclick.net/dbm/clk?sa=L&amp;ai=CY7YYlhD-Z47mNZHA3LUP0cWPsQf4guL4e9Tp5s63E5fa9P0IEAEgxOKWf2DlgoCAqA6gAYviiqAByAEJqAMByAObBKoEkwJP0Pj4rRoEhYcke-pcFAHI-mKvqPKb7RT8a2V2cALAD36dnZHFyjJqmFEiUTT8dQmhXhhQqxt-WuKNeF3gauphSxw9n4Uh56PTmOiVpryu45agfXpDOGjq1fnXLxar_QtZg5xpc61KG4Cu-G4tjbpimEj8A51FZOJKfcl7WCbodpmt546whkm7AxgUJdG2mqvfgBpcCNeVlziUWbODl0drE2QxBrvDpt7HVjnyNmbPjLOgdNbdbaOfZX_DjoksJaipbYueXir5Jt8O6pQQcE5-g3Jx2XDclpHOzhr31DSqUpEy1b-uMSemf7MaUrKT9gmNVNXRtnkMuNJpUzh_C9GkNkOBjChKNsVw_w6qWnOS6zuhYMAEoaKa04kF4AQDiAWY9Pj0UZAGAaAGTYAH3Z313wKoB9XJG6gH2baxAqgHpr4bqAfz0RuoB5bYG6gHqpuxAqgH4L2xAqgHjs4bqAeT2BuoB_DgG6gH7paxAqgH_p6xAqgHr76xAqgHmgaoB_-esQKoB9-fsQKoB_jCsQKoB_vCsQLYBwDSCCcIgGEQARhdMgKKAjoMgECAwICAgICogAIgSL39wTpYxN-IxcfZjAPyCBBiaWRkZXItOENVQkNCNjE3gAoEmAsByAsBgAwBqg0CSU7wDQGwE9SGnhzQEwDYEw3YFAHQFQH4FgGAFwGyFwQYAioAshgJEgLoWBhNIgEA&amp;ae=1&amp;num=1&amp;cid=CAQShQEA2abss8l1IMgYcbvp_FFC4ZkIs_p8Jy_gDEJUlevhoKm6dQVfu3q5-R08ETEghvpX7u7liS05PFKOSn1SMZp57Rg1G-vMEdKhMIHHnonWqdkFpeAh12kpET-xFKhVDb1L4cM1d-yQJFj709YyCfi01fO64j5oN4Hn-dTfpQGDNWht9v9xGAE&amp;sig=AOD64_2umrZ2PVSy8DXBnYJk6P849hvntQ&amp;client=ca-pub-2240701429486168&amp;dbm_c=AKAmf-DCCQT91tCSps50XsLUVo0V_5L6Ocjt0rFndHjKL8udbGrpzl8bHKqIPfEuFMwonsrX7Qudx9cSR79PLTIoXavZD7f-P6ERXc39Y4dXRzKyIy-fuz8O3rFf8Iwwq55ZsyrmefqwRVIlb2HZ7F2LUjtUlq46aCdP3JT9S772ii7WQSEVOYHqUQxkGE8y-CDoxPVwFCRk2FXeCWC99z9RBCrFjoZfUYmJWlXXf5SWMvW3pExtF0PJAgIRPiGQgX6js-fyk6sy0dLc1d4zWzmRXUJqCkGLwg&amp;cry=1&amp;dbm_d=AKAmf-BIKrOzFQiw8Lm88V1m8xoNaQRG--CcqCUwFcPk8TkEZcSZyS86uQNOXm9nNZHJdljUlbtmYMePgQsN4tiTALYsngrdJM77ifAN1kL14yJvoiMuM9VeQwavHKq3cQbuhpnJWPJT0-ZmffHj2pALt9CnMxXS4mqB9JT24DnIkPHOalFkFyruv0N1REP9lrN_O-SI4BgezZLi3ICGHzmeUYgfnlNrVKKHU25CSVmCjj2E6bYsEkb2bz5GNC8A2nYg1U41aP1tLhCzbEQESCRg20eydLsSnJxKDC-BVzce81mdD9I1U8TWH2iygWJ_b_fXGaOztb_TWvMD_iVNGpIOfVlXY5njut9yHy9raFzZ6rT8DiJFUDFqBofik-QvvackS1vP9UZ_oVpDx_0UjTQ5uaqVsqwtQlnko78fTxT9ubqkJt5LGr3TJHStKIU_i_9z1tEZDLGaxo3oZ3qYeeho3qy_IIb5waVrRsgpWytIXqlGccCydUwqJZR9BjBzFxCqV63A4B-us2fh1_MIq6PATPNuG2OMs5EyGH2LGf2CmEdclB2P94t_t3Grhy4Yk6MPQC_-uL4BUfg6TJWjTiWQyAflBxYVT1m5AIyN2ApS2sJ0uauMbaqNP5rt_UsX7Yauvhfi_ohqKbKqSY-jRI9wKvwe7eOOUw&amp;adurl=https://servedby.flashtalking.com/click/7/258567;9129264;4691266;210;0/?gdpr=0&amp;ft_partnerimpid=ABAjH0ivSLFbAc5ZqnGvJSTWxjSS;ABAjH0ivSLFbAc5ZqnGvJSTWxjSS&amp;ft_impID=358B2A83-6FB1-A62C-F30C-1DFEC38C62CC&amp;ft_section=DV360CampID:21988522520&amp;g=5656C6C6C7D6FC&amp;random=105542.54993530978&amp;ft_width=160&amp;ft_height=600&amp;url=https://www.adobe.com/in/creativecloud.html?sdid=GVTYXXRY&amp;mv=display&amp;mv2=display" title="Click to learn more" id="ftalt9129264" target="_blank" style="display: inline-block;"><img src="https://cdn.flashtalking.com/190737/4691266/FY24Q2_CC_Individual_CCIAllApps_in_en_SettaStudios-Ae-Collaboration_AN_160x600.gif?512877018" id="ftalt9129264" alt="Click Here" style="border: 0px; width: 160px; height: 600px;"></a><script type="text/javascript" src="https://js.ad-score.com/score.min.js?pid=1000942&amp;tt=g#tid=27142&amp;l1=258567&amp;l2=DV360&amp;l3=9129264&amp;l4=4691266&amp;l5=104&amp;l6=104&amp;l7=0&amp;utid=358B2A83-6FB1-A62C-F30C-1DFEC38C62CC&amp;creative_type=display&amp;adid=ftdiv9129264&amp;pub_app=&amp;pub_domain=itsolutionstuff.com&amp;uid=&amp;cb=113525.28534262395&amp;pub_ts=1744212096&amp;582626864" pm_checked="true"></script><div id="ftAdChoices_9129264" style="position: absolute; top: 1px; right: 2px; z-index: 999999;"><a target="_blank" href="https://www.flashtalking.com/consumer-privacy"><img src="https://cdn.flashtalking.com/oba/icon/iconc.png?EDAA_icon=y" id="button" style="border: 0px; width: 19px; height: 15px;"><img id="expButton" style="border: 0px; display: none; width: 72px; height: 15px;"></a></div><div id="ftAdMarker_9129264" style="position: absolute; top: 0px; left: 0px; z-index: 999999;"><a href="https://www.flashtalking.com/consumer-privacy" target="_blank" title="Privacy Notification"><img src="https://secure.flashtalking.com/oba/icon/consumer-privacy-logo.png" id="button" style="border:0; margin:2px; width:16px; height:16px; display:block;"></a></div><div id="ftAdMarker_9129264" style="position: absolute; top: 0px; left: 0px; z-index: 999999;"><a href="https://www.flashtalking.com/consumer-privacy" target="_blank" title="Privacy Notification"><img src="https://secure.flashtalking.com/oba/icon/consumer-privacy-logo.png" id="button" style="border:0; margin:2px; width:16px; height:16px; display:block;"></a></div></div>
                </div> --}}
                <div class="col-md-8 mx-auto">
                    @yield('content')
                </div>
                {{-- <div class="col-md-2"></div> --}}
                @include('user.layout.footer')
            </div>
        </div>
    </section>
    {{-- <section>
        <div class="container-fluid">
            <div class="row">
                @include('user.layout.header')
                <div class="col-md-8 mx-auto">
                    @yield('content')
                </div>
                @include('user.layout.footer')
            </div>
        </div>
    </section> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('public/admin/js/sweetalert.js') }}"></script>
    {{-- DROPDOWN SEARCH JS --}}
    <script src='{{ asset('public/user/js/select2.min.js') }}'></script>
    <script>
        search_location()
        function search_location() {
            $('.location_search').select2({
                ajax: {
                    url: '{{ route('user.location_search') }}',
                    dataType: 'json',
                    type: 'GET',
                    data: function(params) {
                        return {
                            data: params.term
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data?.data, function(response) {
                                return {
                                    id: response.id,
                                    text: response.name
                                };
                            })
                        };
                    },
                },
            });
        }
    </script>
    @stack('js')
</body>

</HTML>
