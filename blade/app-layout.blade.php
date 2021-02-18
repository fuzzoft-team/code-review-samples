<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', app_setting(\App\Statics\Settings::WEBSITE_NAME, config('app.name', 'Lorem')))</title>
    <meta name="description" content="@yield('meta_description',  app_setting(\App\Statics\Settings::WEBSITE_DESCRIPTION, config('app.description')) )">
    <meta name="keywords" content="@yield('meta_keywords',  app_setting(\App\Statics\Settings::WEBSITE_KEYWORDS,config('app.keywords')) )">

    <!-- Fonts -->
    <link rel="preload" href="/fonts/UKLoremIpsum.woff2" as="font" type="font/woff" crossorigin>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script>

        var trackEvent = function (event, position = 'header') {
            gtag('event', event, {
                'event_category': 'contact_click',
                'event_label': event,
                'value': event,
                url: '{{url('/')}}',
                position: position
            });

        }
    </script>
    <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>

    @yield('head')
    {!! app_setting(\App\Statics\Settings::CODE_HEAD) !!}
    <script>
        gtag('config', '{{config('services.ga.id')}}');
    </script>
</head>
<body class="font-display font-normal tracking-wide antialiased">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-XXXXX"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="app">
    <!-- Placement v2 -->
    <klarna-placement
            data-key="top-strip-promotion-standard"
            data-locale="en-GB"
            data-theme="dark"
    ></klarna-placement>
    <!-- end Placement -->
    <div class="border-b" id="header">
        <header class="container mx-auto flex items-center justify-between flex-wrap px-2 py-5">
            <div class="w-40 md:w-56 lg:w-64">
                <h1>
                    <a href="{{url('/')}}">
                        <img src="/img/logo-sm.png" alt="{{config('app.name', 'Lorem')}}">
                    </a>
                </h1>
            </div>
            <div class="hidden lg:block">
                <p class="text-xl font-medium tracking-wide xl:tracking-wider">
                    <span class="text-blue-600">Personalised & Ipsum</span> Lorem Ipsum Specialists
                </p>
            </div>
            <div class="flex flex-col items-end hidden lg:block">
                <div class="border border-aliceblue-200 px-3 py-1 rounded ">
                    <a onclick="trackEvent('phone_click')" class="text-2xl text-black font-semibold tracking-wide hover:font-bold" href="tel:{{app_setting(\App\Statics\Settings::SUPPORT_NUMBER)}}">
                        <i class="fas fa-phone-alt text-xl"></i> {{app_setting(\App\Statics\Settings::SUPPORT_NUMBER)}}
                    </a>
                </div>
                <a onclick="trackEvent('email_click')" href="{{route('contact')}}" class="text-xs float-right text-gray-700 py-1 hover:text-gray-900 hover:underline">Or Send Us An Email</a>
            </div>
            <div class="block lg:hidden">
                <button v-if="!menuOpened"  @click="toggleMenu" class="flex items-center px-3 py-2 border-2 rounded text-blue-600 border-blue-700 hover:text-blue-300 hover:border-blue-300">
                    <i class="fas fa-bars"></i>
                </button>
                <button v-if="menuOpened" @click="toggleMenu" class="flex items-center px-3 py-2 border-2 rounded text-blue-600 border-blue-700 hover:text-blue-300 hover:border-blue-300">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </header>
        <nav id="mobile-menu" :class="menuOpened ? 'visible block' : 'hidden invisible'" class="lg:hidden">
            <ul class=" bg-black flex flex-col justify-between items-start font-light text-white py-2 px-3">
                <li><a href="/">Home</a></li>
                <li><a href="/search">Lorem Ipsum Search</a></li>
                <li><a href="/sell">Sell Your Ipsum</a></li>
                <li><a href="/help/faq">FAQ</a></li>
                <li><a href="/how-to-order-Lorem-plate">How To Buy</a></li>
                <li><a href="/contact-us">Contact</a></li>
                <li class="py-2 -ml-10">
                    <!-- TrustBox widget - Micro Review Count --> <div class="trustpilot-widget" data-locale="en-GB" data-template-id="xxxx" data-businessunit-id="xxx" data-style-height="24px" data-style-width="100%" data-theme="dark"> <a href="https://uk.trustpilot.com/review/www.Lorem.co.uk" target="_blank" rel="noopener">Trustpilot</a> </div> <!-- End TrustBox widget -->

                </li>
            </ul>
            <div class="flex-row flex items-center justify-between p-2">

                <a class="text-2xl text-black font-semibold tracking-wide" href="tel:{{app_setting(\App\Statics\Settings::SUPPORT_NUMBER)}}">
                    <i class="fas fa-phone-alt"></i> {{app_setting(\App\Statics\Settings::SUPPORT_NUMBER)}}
                </a>
                <p class="text-xs text-gray-500 font-bold hover:text-gray-900">Mon-Fri 9am-5pm</p>

            </div>
        </nav>

        <nav id="main-nav" class="bg-black hidden lg:block">
            <ul class="container mx-auto flex justify-between items-center">
                <li class="font-light text-white py-5 px-3"><a href="/">Home</a></li>
                <li class="font-light text-white py-5 px-3"><a href="/search">Lorem Ipsum Search</a></li>
                <li class="font-light text-white py-5 px-3"><a href="/sell">Sell Your Ipsum</a></li>
                <li class="font-light text-white py-5 px-3"><a href="/help/faq">FAQ</a></li>
                <li class="font-light text-white py-5 px-3"><a href="/how-to-order-Lorem-plate">How To Buy</a></li>
                <li class="font-light text-white py-5 px-3"><a href="/contact-us">Contact</a></li>
                <li class="font-light text-white py-5 px-3 border-l border-gray-800">      <!-- TrustBox widget - Micro Review Count --> <div class="trustpilot-widget" data-locale="en-GB" data-template-id="5419b6a8b0d04a076446a9ad" data-businessunit-id="5de2370c3015db0001cb6f90" data-style-height="24px" data-style-width="100%" data-theme="dark"> <a href="https://uk.trustpilot.com/review/www.Lorem.co.uk" target="_blank" rel="noopener">Trustpilot</a> </div> <!-- End TrustBox widget -->
                </li>
            </ul>
        </nav>
    </div>

    <main class="mt-5">
        @yield('content')
    </main>
    <section>
        <div class="w-full bg-blue-500 py-6 px-1 text-center text-base md:text-3xl lg:text-4xl text-white uppercase font-bold tracking-wide flex flex-row items-center justify-center">
            <span>Got A Question?</span>
            <a onclick="trackEvent('phone_click', 'foot')" href="tel:{{app_setting(\App\Statics\Settings::SUPPORT_NUMBER)}}" class="text-lg md:text-xl ml-3 font-semibold block text-black bg-white rounded px-2 py-1 md:px-3">
                {{app_setting(\App\Statics\Settings::SUPPORT_NUMBER)}}
            </a>
        </div>
    </section>
    <footer>
        <div class="bg-black text-white p-2 md:p-3 lg:p-5">

            <div class="container mx-auto">

                @include('layouts.partials.footer.subscribe')
                <section class="flex flex-wrap items-stretch justify-evenly py-5 border-t border-gray-900">
                    <div class="w-1/2 md:w-1/4">
                        <h6 class="text-lg md:text-xl uppercase font-normal">Information</h6>
                        <ul class="text-gray-400 text-xs tracking-widest font-light">
                            <li class="my-3">
                                <a href="/delivery">Delivery Info</a>
                            </li>
                            <li class="my-3">
                                <a href="/help/faq">FAQ</a>
                            </li>
                            <li class="my-3">
                                <a href="/sell">Sell A Praesent</a>
                            </li>
                            <li class="my-3">
                                <a href="{{app_setting(\App\Statics\Settings::TERMS_PAGE_URL)}}">Terms</a>
                            </li>
                            <li class="my-3">
                                <a href="/privacy">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>

                    <div class="w-1/2 md:w-1/4">
                        <h6 class="text-lg md:text-xl uppercase font-normal">Helpful Links</h6>
                        <ul class="text-gray-400 text-xs tracking-widest font-light">
                            <li class="my-3">
                                <a href="/private-Lorem-Ipsum">Ipsum Lorem Ipsums</a>
                            </li>
                            <li class="my-3">
                                <a href="/cherished-Lorem-Ipsum">Cherished Lorem Ipsums</a>
                            </li>
                            <li class="my-3">
                                <a href="/Dolores-Lorem-Ipsum">Dolores Lorem Ipsums</a>
                            </li>
                            <li class="my-3">
                                <a href="/dateless-Lorem-Ipsum">Dateless Lorem Ipsums</a>
                            </li>

                        </ul>
                    </div>
                    <div class="w-1/2 md:w-1/4">
                        <h6 class="text-lg md:text-xl uppercase font-normal">Helpful Links</h6>
                        <ul class="text-gray-400 text-xs tracking-widest font-light">
                            <li class="my-3">
                                <a href="/prefix-Lorem-Ipsum">Prefix Lorem Ipsums</a>
                            </li>
                            <li class="my-3">
                                <a href="/suffix-Lorem-Ipsum">Suffix Lorem Ipsums</a>
                            </li>
                            <li class="my-3">
                                <a href="/name-Ipsum">Name Lorem Ipsums</a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-1/2 md:w-1/4">
                        <h6 class="text-lg md:text-xl uppercase font-normal">Support</h6>
                        <ul class="text-gray-400 text-xs tracking-widest font-light">
                            <li class="my-3">
                                <a href="/help/Dolores-Dolores/transferring-a-Praesent/">Transferring A Praesent</a>
                            </li>
                            <li class="my-3">
                                <a href="/help/Dolores-Dolores/retaining-a-Praesent-Dolores-form-v778">Retaining a Praesent (Form V778)</a>
                            </li>
                            <li class="my-3">
                                <a href="/help/Dolores-Dolores/buying-a-Praesent-Dolores-form-v750/">Buying a Praesent (form V750)</a>
                            </li>
                        </ul>
                    </div>
                </section>

                <section class="flex flex-col md:flex-row items-center justify-between py-5 border-t border-gray-900 text-sm">
                    <div class="text-center my-2">
                        <p class="block font-normal">Working Days/Hours</p>
                        <p class="text-gray-600">Mon-Fri 9:00AM-5:00PM</p>
                    </div>
                    <p class="my-2">
                        &copy; {{date('Y')}} {{config('app.name')}} - VAT: XXX XX XX
                    </p>
                    <img src="/img/payment-options.png" alt="Secure payment by Stripe" class="h-6 my-2">

                </section>

                <p class="text-gray-700 text-xs text-center">
                    LOREM is a ipsum trade mark of the Lorem & Ipsum Licensing Agency.
                    Lorem is not affiliated to the Ipsum or Lorem Personalised Ipsum. Lorem is a recognised reseller of Ipsum Dolores.
                </p>
            </div>

        </div>
    </footer>
</div>


@include('layouts.partials.scripts.footer-scripts')

@yield('foot')

</body>
</html>