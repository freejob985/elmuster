@php


Carbon::setlocale(Config::get('app.locale'));



if(Session::has('locale')){
$locale = Session::get('locale', Config::get('app.locale'));
}
else{
$locale = env('DEFAULT_LANGUAGE');
}
$lang = \App\Models\Language::where('code', $locale)->first();
@endphp
<!DOCTYPE html>
@if($lang != null && $lang->rtl == 1)
<html dir="rtl" lang="en">
@else
<html lang="en">
@endif

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ env('APP_URL')}}">
    <!-- Title -->
    <title>@yield('meta_title', get_setting('website_name').' | '.get_setting('site_motto'))</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('meta_description', get_setting('meta_description'))" />
    <meta name="keywords" content="@yield('meta_keywords', get_setting('meta_keywords'))">

    @yield('meta')

    @if(!isset($page))
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ config('app.name', env('APP_NAME')) }}">
    <meta itemprop="description" content="{{ get_setting('meta_description') }}">
    <meta itemprop="image" content="{{ custom_asset( get_setting('meta_image') ) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ config('app.name', env('APP_NAME')) }}">
    <meta name="twitter:description" content="{{ get_setting('meta_description') }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ custom_asset( get_setting('meta_image')) }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ config('app.name', env('APP_NAME')) }}" />
    <meta property="og:type" content="Business Site" />
    <meta property="og:url" content="{{ env('APP_URL') }}" />
    <meta property="og:image" content="{{ custom_asset(get_setting('meta_image')) }}" />
    <meta property="og:description" content="{{ get_setting('meta_description') }}" />
    <meta property="og:site_name" content="{{ get_setting('website_name') }}" />
    @endif

    <!-- Favicon -->
    <link rel="icon" href="{{ custom_asset(get_setting('site_icon')) }}">

    <!-- CSS -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="{{ my_asset('assets/common/css/vendors.css') }}">
    <link rel="stylesheet" href="{{ my_asset('assets/common/css/animate.css') }}">

    @if($lang != null && $lang->rtl == 1)
    <link rel="stylesheet" href="{{ my_asset('assets/common/css/bootstrap-rtl.min.css') }}">
    @endif
    <link rel="stylesheet" href="{{ my_asset('assets/common/css/aiz-core.css') }}">
    <link rel="stylesheet" href="{{ my_asset('assets/frontend/default/css/custom.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        var AIZ = AIZ || {};
    </script>
    <style type="text/css">
        body {
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
        }

        :root {
            --primary: {
                    {
                    get_setting('base_color', '#377dff')
                }
            }

            ;

            --hov-primary: {
                    {
                    get_setting('base_hov_color', '#0069d9')
                }
            }

            ;

            --soft-primary: {
                    {
                    hex2rgba(get_setting('base_hov_color', '#377dff'), .15)
                }
            }

            ;
        }

        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;500&display=swap');

        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        a,
        p,
        span {
            font-family: 'Tajawal', sans-serif !important;
        }.h4, h4 {
    color: #d65e2c;
    font-size: 1.5rem;
}.list-inline-item {
    display: inline-block;
    color: #d65e2c;
}.btn-primary, .btn-soft-primary:hover, .btn-outline-primary:hover {
    background-color: #2f5e8c!important;
    border-color: #2f5e8c!important;
    color: var(--white);
}
.lh-1-5 {
    color: #d65e2c;
    line-height: 1.5;
}.aiz-square-check:after {
    border-color: #d65e2c!important;}
        .btn-primary,
        .btn-soft-primary:hover,
        .btn-outline-primary:hover {
            background-color: #2f5e8c;
            border-color: var(--primary);
            color: var(--white);
        }

        .text-inherit {
            color: #d65e2c !important;
            font-weight: bold;
            font-size: 18px;
        }

        .text-truncate {
            font-size: 22px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .navbar-expand .navbar-nav .nav-link {
            color: #fff;
            font-weight: bold;
            padding-left: .5rem;
            padding-right: .5rem;
        }

        .menu-a {
            color: #fff;
            font-weight: bold;
            font-size: 18px;
            padding: 0px 12px;
        }

        .aiz-front-widget .title {
            font-weight: bold;
            color: #d65e2c !important;
        }

        .show.dropdown-menu {
            background: #d65e2c !important;
            visibility: visible;
            opacity: 1;
            margin-top: 0 !important;
        }

        .text-muted {
            color: #000 !important;
        }

        header span {
            color: #fff;
        }
.show.dropdown-menu {
    background: #fafafa !important;}
    .aiz-navbar .menu a {
    color: #000;
    font-weight: 500;
    font-size: 13px;
}.text-truncate {
    font-size: 14px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}p{width:100%!important;}
        @media (max-width:800px) {
            .aiz-carousel-full * {
                height: 212PX;
            }

            .pt-10,
            .py-10,
            .p-10 {
                padding-top: 2rem;
            }

            .pb-10,
            .py-10,
            .p-10 {
                padding-bottom: 2rem;
            }

            .menu-a {
                display: none;
            }
        }
        
        
        
        
        @media (max-width: 800px){
.btn {
    padding: 0.6rem 0.2rem;
    font-size: 0.675rem;
    color: #fff;
    font-weight: inherit;
}.aiz-navbar.py-15px.fs-14.position-relative {
    padding-bottom: 6px;
    padding-top: 6px;
}}
    </style>

    @if (get_setting('google_analytics_activation_checkbox') == 1)
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_ANALYTICS_TRACKING_ID') }}"></script>

    <script>
        window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', '{{ env('GOOGLE_ANALYTICS_TRACKING_ID') }}');
    </script>
    @endif

    @if (get_setting('fb_pixel_activation_checkbox') == 1)
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
          {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
          n.callMethod.apply(n,arguments):n.queue.push(arguments)};
          if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
          n.queue=[];t=b.createElement(e);t.async=!0;
          t.src=v;s=b.getElementsByTagName(e)[0];
          s.parentNode.insertBefore(t,s)}(window, document,'script',
          'https://connect.facebook.net/en_US/fbevents.js');
          fbq('init', {{ env('FACEBOOK_PIXEL_ID') }});
          fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id={{ env('FACEBOOK_PIXEL_ID') }}/&ev=PageView&noscript=1" />
    </noscript>
    <!-- End Facebook Pixel Code -->
    @endif



    <link rel="stylesheet" href="{{ my_asset('assets/common/css/aiz-core.css') }}">
    <script>
        var AIZ = AIZ || {};
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-59798465"></script>

    <script>
        window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', 'UA-59798465');
    </script>

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
          {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
          n.callMethod.apply(n,arguments):n.queue.push(arguments)};
          if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
          n.queue=[];t=b.createElement(e);t.async=!0;
          t.src=v;s=b.getElementsByTagName(e)[0];
          s.parentNode.insertBefore(t,s)}(window, document,'script',
          'https://connect.facebook.net/en_US/fbevents.js');
          fbq('init', 4847894654988);
          fbq('track', 'PageView');
    </script>



</head>

<body class="text-left">

    <div class="aiz-main-wrapper d-flex flex-column">

        @include('frontend/default.inc.header')

        <!-- ========== MAIN CONTENT ========== -->

        @yield('content')

        <!-- ========== END MAIN CONTENT ========== -->

        @include('frontend/default.inc.footer')

    </div>

    @yield('modal')

    @if (get_setting('facebook_chat_activation_checkbox') == 1)
    <script type="text/javascript">
        window.fbAsyncInit = function() {
                FB.init({
                  xfbml            : true,
                  version          : 'v3.3'
                });
              };

              (function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
    </script>
    <div id="fb-root"></div>
    <!-- Your customer chat code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="{{ env('FACEBOOK_PAGE_ID') }}">
    </div>
    @endif

    <script src="{{ my_asset('assets/common/js/vendors.js') }}"></script>
    <script src="{{ my_asset('assets/common/js/aiz-core.js') }}"></script>
    <script src="{{ my_asset('assets/common/js/WOW.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

    <script>
        new WOW().init();
    </script>
    <script type="text/javascript">
        @foreach (session('flash_notification', collect())->toArray() as $message)
            AIZ.plugins.notify('{{ $message['level'] }}', '{{ $message['message'] }}');
        @endforeach
    </script>
<script>
    $(function () {
      //  alert();
      $.ajaxSetup({
        beforeSend: function(xhr, type) {
            if (!type.crossDomain) {
                xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            }
        },
    });
        $(".link").click(function () {
            var path ='{{ route('Notices.Single') }}';
            var link= $(this).attr('href');
            var link_= $(this).attr('href');

            var link=link.replace("{{Request::root()}}","");
         //   alert(link);
            $.post(path, {link: link}, function (data) {
                console.log(data);
          //     alert(data);

               window.location.href = link_;
            });
            return false;
        });
    });
</script>
    @yield('script')

</body>

</html>