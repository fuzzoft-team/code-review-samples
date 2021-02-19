@extends('layouts.app')

@section('title', 'Enquiry for '.$product->label.' | ' . config('app.name'))

@section('content')

    <div id="contact" class="container mx-auto p-2">
        <div class="mb-5">

            {{--Too long, any ideas?--}}
            <div class="whitespace-no-wrap overflow-hidden shadow bg-yellow-500 mx-auto max-w-xs w-full text-black rounded block text-center font-number text-3xl sm:text-4xl md:text-5xl px-1">
                {{$product->label}}
            </div>

            <div class="max-w-2xl mx-auto my-2 text-center flex flex-row justify-center items-center">
                <i class="fa fa-exclamation-triangle text-4xl text-gray-600 p-3" aria-hidden="true"></i>
                <p>
                    Bla bla, some text
                </p>
            </div>
        </div>

        <div class="my-5 w-full">

            {{--Any thoughts on this?--}}
            @if(session()->has('success'))
                <script>
                    gtag('event', 'form_submit', {
                        'event_category': 'form_submit',
                        'event_label': '{{$product->label}}',
                        'value': {{$product->price}},
                    });
                </script>
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 my-3" role="alert">
                    <p>
                        {{session()->get('success')}}
                    </p>
                </div>
            @else
                <form action="{{route('enquire-product', ['product' => $product->id])}}" method="post">
                        <div class="card max-w-4xl mx-auto">
                            <h3 id="detail" class="card-header">
                                Enquiry for {{$product->label}}
                            </h3>
                            <div class="card-body">
                                {{csrf_field()}}
                                <fieldset class="flex flex-wrap">

                                    {{-- ... --}}

                                    <div class="flex flex-wrap">
                                        <div class="required w-full lg:w-1/2 pr-3 field-input">
                                            <label for="first_name">
                                                <span>First Name</span>
                                            </label>
                                            <div class="field-wrap">
                                                <input id="first_name" type="text" value="{{old('first_name')}}" name="first_name" required class="form-control" />
                                            </div>
                                        </div>

                                        <div class="required w-full lg:w-1/2 pr-3 field-input">
                                            <label for="last_name">
                                                <span>Surname</span>
                                            </label>
                                            <div class="field-wrap">
                                                <input id="last_name" type="text" value="{{old('last_name')}}" name="last_name" required class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                    {{-- ... --}}

                                </fieldset>

                                @if ($errors->any())
                                    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 my-3" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            {{--Too long, right?--}}
                            <button type="submit" class="max-w-4xl w-full mx-auto py-2 my-6 px-4 bg-green-500 text-white text-xl uppercase">Send Enquiry</button>

                        </div>
                    </form>
            @endif
        </div>
    </div>
@endsection

{{--Any thoughts?--}}
@section('foot')
    <script>
        // Some script here
    </script>
@endsection