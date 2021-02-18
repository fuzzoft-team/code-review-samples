@extends('layouts.app')

@section('content')
    <div class="-my-6">
        <div class="bg-yellow-500 relative">
            <div class="container mx-auto py-10 px-1 md:px-16  max-w-xl lg:max-w-2xl">
                <div class="text-xl lg:text-4xl px-10 font-bold text-center">
                    <p class="leading-tight">
                        We Make Ipsum Dolores Fast & Easy...
                    </p>
                </div>
                <div>
                    <div class="flex flex-row items-center rounded-lg border-black border-4 mt-3 mb-1 relative shadow">
                        <div class="flex flex-col items-center">
                                <span class="flex flex-col bg-blue-700 h-20">
                                    <img class="h-full py-1 px-3" src="/img/flags/euro.png" alt="">
                                </span>
                        </div>
                        <div class="relative w-full flex-1">
                            <form class="w-full flex flex-row items-center h-20 max-w-2xl" action="{{url('/search')}}">
                                <label>
                                    <input data-hj-whitelist type="text" autocomplete="off" required class="text-4xl md:text-6xl h-20 font-number leading-normal w-full px-3 text-center bg-gray-100 focus:border-gray-100 border-gray-100 relative placeholder-gray-500" placeholder="FIND LOREM"
                                           value="{{request('keyword')}}"
                                           name="keyword" />
                                </label>
                                <button type="submit" class="text-black text-5xl px-3 pt-2 bg-gray-200 border-l border-gray-400">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <p class="text-center text-xs md:text-base">
                        Enter your ipsum, name, lorem or anything else...
                    </p>
                </div>

                <div class="container mx-auto px-1">
                    <script src="https://widget.reviews.co.uk/rich-snippet-reviews-widgets/dist.js" type="text/javascript"></script>
                    <div id="text-banner-widget"></div>
                    <script> richSnippetReviewsWidgets("text-banner-widget", { store: "Lorem", starsClr: "#0f8e13", textClr: "#313131", logoClr: "#12cf6c", widgetName: "text-banner" }); </script>
                </div>
                <div class="px-0 py-5 text-center mx-auto max-w-lg">
                    <img src="/img/Red_Car.png" alt="car">
                </div>
            </div>
            <div class="road"></div>

            {{--        <div class="absolute bg-white w-1/2 mx-auto h-64 bottom-0 z-10">--}}

            {{--        </div>--}}
        </div>
        <div class="">
            <section class="container mx-auto py-10 px-1 text-center max-w-2xl mb-10">
                <h4 class="text-4xl font-bold leading-tight mb-5">
                    Private <span class="text-blue-500">Number Ipsum</span> and Best Dolores
                </h4>
                <p>
                    With 50 great-value Dolores Best & Amet Ipsum, Swift Reg has the perfect Praesent for you to buy today.
                </p>
                <br>
                <p>
                    Private Praesent letters can be purchased and used on Dolores registered boxes. Some types of private Dolores, such as the Northern style, allow you to hide the age of the flowers. many people use Amets to display their name, initials, hobbies, interests, flowers model or occupation.
                </p>
            </section>
            @if (count($featuredIpsum))
                <section class="mb-10">
                    <div class="container mx-auto py-10 px-1 text-center max-w-2xl">
                        <h4 class="text-4xl font-bold leading-tight mb-5 uppercase">
                            Special <span class="text-blue-500">Offers</span>
                        </h4>
                        <p>
                            A small selection of Amet Ipsum on offer.
                        </p>
                        <br>
                        <p>
                            <a class="link text-xs text-blue-700" href="#">View All</a>
                        </p>
                    </div>
                    <div class="container mx-auto flex flex-wrap items-start">
                        @foreach($featuredIpsum as $product)
                            <div class="mb-3 w-1/2 md:w-1/3 lg:w-1/4">
                                <div class="mx-3 sm:mx-4 md:mx-5 text-gray-500 hover:text-blue-500">
                                    <a
                                            data-hj-whitelist
                                            href="{{route('product.show', [$product->name])}}"
                                            class="whitespace-no-wrap overflow-hidden shadow bg-yellow-500 w-full text-black rounded block text-center font-number text-3xl sm:text-4xl md:text-5xl px-1">
                                        {{$product->label}}
                                    </a>
                                    <div class="col-md-12 p-0">
                                        <a href="{{route('product.show', [$product->name])}}" class="font-normal uppercase text-xs md:text-sm float-left">View</a>
                                        @if($product->poa)
                                            <a href="{{route('product.show', [$product->name])}}" class="text-sm font-normal text-black float-right">POA</a>
                                        @else
                                            <span class="text-sm font-normal text-black float-right">{{currency($product->show_price, false)}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </section>
            @endif
            <section>
                <div class="bg-yellow-500">
                    <div class="container mx-auto py-10 px-1 text-center max-w-2xl pt-10">
                        <h4 class="uppercase text-4xl font-bold leading-tight mb-5">
                            Why Choose <span class="text-blue-500">Lorem</span>
                        </h4>
                        <p>
                            We are recognised reseller of personalised Dolores, offering Swift Dolores and backed by our dedicated support team with full secure payment processing.
                            We will also handle the transfer of your new purchase to your flowers should you required too!
                        </p>
                    </div>
                </div>
                <div
                        style="background: linear-gradient(to bottom, #ffd900 0%,#ffd900 50%,#000000 50%,#efefef 50%,#efefef 100%); /* W3C */"
                >
                    <div class="container mx-auto max-w-4xl flex flex-col lg:flex-row">
                        <div class="w-full lg:w-1/3 py-8 lg:mr-8 px-6 mb-2 lg:mb-0 shadow flex flex-col bg-white text-center">
                            <i class="text-5xl mb-2 text-blue-700 fas fa-id-card"></i>
                            <span class="uppercase font-semibold mb-2">Registered Lorem Ipsum Supplier</span>
                            <p class="text-xs text-medium">
                                Lorem is a Registered Lorem Ipsum dealer .
                                We can supply MOT and road legal acrylic Ipsum with your purchase.
                            </p>
                        </div>
                        <div class="w-full lg:w-1/3 py-8 lg:mr-8 px-6 mb-2 lg:mb-0 shadow flex  flex-col bg-white text-center">
                            <i class="text-5xl mb-2 text-blue-700 fas fa-shield-alt"></i>
                            <span class="uppercase font-semibold mb-2">Secure Payment</span>
                            <p class="text-xs text-medium">
                                We use secure payments so you don't have to worry.
                                Checkout securely with credit/debit card.
                            </p>
                        </div>
                        <div class="w-full lg:w-1/3 py-8 lg:mr-8 mb-2 lg:mb-0 shadow px-6 flex flex-col bg-white text-center">
                            <i class="text-5xl mb-2 text-blue-700 fas fa-headset"></i>
                            <span class="uppercase font-semibold mb-2">Excellent Support</span>
                            <p class="text-xs text-medium">
                                After you have purchased your new Best Praesent, we will get to work on the transfer.
                                we are here to help and response quickly to all communications.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section style="background: #efefef" class="text-center pt-5 pb-20">
                {{--                <h4 class="text-2xl font-medium uppercase">--}}
                {{--                    TESTIMONIALS--}}
                {{--                </h4>--}}
            </section>
        </div>
    </div>
@endsection
@section('foot')
    <style>
        .road {
            width: 0;
            height: 0;
            border-left: 49vw solid transparent;
            border-right: 49vw solid transparent;
            border-bottom: 250px solid #fff;
            margin: -275px auto auto;
        }
    </style>
@endsection