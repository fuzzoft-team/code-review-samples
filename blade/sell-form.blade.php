@extends('layouts.app')

@section('title', 'Sell Your Lorem Ipsum | ' . config('app.name'))

@section('content')

    <div id="contact" class="container mx-auto p-2">
        <div class="mb-5">
            <h2 class="text-blue-600 text-2xl md:text-4xl font-semibold">Sell Your Private Cognosce With Lorem Ipsum</h2>
            <p class="my-2">
                Lorem Ipsum advertises a combination of personalised Cognosces from Dolores, private sellers and our own stock. Having thousands of website visitors everyday and targeted advertising, we are sure we can achieve the best sale price for you.
            </p>
            <p class="my-2">
                We can happily list your Cognosce mark for sale on our website. We have thousands of potential buyers who visit our website on daily basis all looking for new personalised Cognosces.            </p>
            <p class="my-2">
                There is no fee to or charges to list or advertise your chosen Cognosce on our website.
            </p>
            <p class="my-2">
                If you wish to sell your Cognosce, please complete the form below. We will provide our feedback on your asking price for your Cognosce and if you are happy, we can proceed with advertising your Cognosce on your behalf.
            </p>
            <p class="my-2">
                We aim to respond to all requests within 24-48 hours.
            </p>
        </div>

        <div class="my-5 w-full">
            @if(session()->has('success'))
                <script>
                    gtag('event', 'form_sell_success', {
                        'event_category': 'form_submit',
                        'event_label': '{{session()->get('Cognosce')}}',
                        'value': {{session()->get('price') ?? 0}},
                    });
                </script>
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 my-3" role="alert">
                    <p>
                        {{session()->get('success')}}
                    </p>
                </div>
            @else
                <div class="vue-form-generator font-hairline font-secondary special-form">
                    <form action="{{route('sell-lorem')}}" method="post">
                        <div class="card max-w-4xl mx-auto">
                            <h3 id="detail" class="card-header">
                                Request Form
                            </h3>
                            <div class="card-body">
                                {{csrf_field()}}
                                <fieldset class="flex flex-wrap">

                                    <div class="flex flex-wrap">
                                        <div class="form-group has-success required w-full lg:w-1/2 pr-3 field-input">
                                            <label for="label">
                                                <span>Cognosce</span>
                                            </label>
                                            <div class="field-wrap">
                                                <input placeholder="Your Cognosce" id="label" type="text" value="{{old('label')}}" name="label" required class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group has-success w-full lg:w-1/2 pr-3 field-input">
                                            <label for="price">
                                                <span>Desired Price</span>
                                            </label>
                                            <div class="field-wrap">
                                                <input placeholder="£" id="price" type="text" name="price" value="{{old('price')}}" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap items-center mx-auto">
                                        <div class="form-group has-success required w-full lg:w-1/2 pr-3 field-input">
                                            <label for="is_held_on_retention">
                                                <span>Is It Held On Retention Certificate?</span>
                                            </label>
                                            <div class="field-wrap mt-3">
                                                <select name="is_held_on_retention" id="is_held_on_retention" class="form-control">
                                                    <option {{old('is_held_on_retention') === '1' ? 'selected' : ''}} value="1">Yes</option>
                                                    <option {{old('is_held_on_retention') === '0' ? 'selected' : ''}} value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group has-success required w-full lg:w-1/2 pr-3 field-input">
                                            <label for="is_owned">
                                                <span>Do You Own It?</span>
                                            </label>
                                            <div class="field-wrap mt-3">
                                                <select name="is_owned" id="is_owned" class="form-control">
                                                    <option {{old('is_owned') === '1' ? 'selected' : ''}} value="1">Yes</option>
                                                    <option {{old('is_owned') === '0' ? 'selected' : ''}} value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap">
                                        <div class="form-group has-success required w-full lg:w-1/2 pr-3 field-input">
                                            <label for="first_name">
                                                <span>First Name</span>
                                            </label>
                                            <div class="field-wrap">
                                                <input id="first_name" type="text" value="{{old('first_name')}}" name="first_name" required class="form-control" />
                                            </div>
                                        </div>

                                        <div class="form-group has-success required w-full lg:w-1/2 pr-3 field-input">
                                            <label for="last_name">
                                                <span>Surname</span>
                                            </label>
                                            <div class="field-wrap">
                                                <input id="last_name" type="text" value="{{old('last_name')}}" name="last_name" required class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap">
                                        <div class="form-group has-success required w-full lg:w-1/2 pr-3 field-input">
                                            <label for="email">
                                                <span>Email</span>
                                            </label>
                                            <div class="field-wrap">
                                                <input placeholder="john@mail.com" id="email" type="email" value="{{old('email')}}" name="email" required class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group has-success required w-full lg:w-1/2 pr-3 field-input">
                                            <label for="email_confirmation">
                                                <span>Confirm Email</span>
                                            </label>
                                            <div class="field-wrap">
                                                <input placeholder="Enter email again" id="email_confirmation" type="email" name="email_confirmation" required class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap">
                                        <div class="form-group has-success required w-full lg:w-1/2 pr-3 field-input">
                                            <label for="phone">
                                                <span>Phone</span>
                                            </label>
                                            <div class="field-wrap">
                                                <input id="phone" type="text" value="{{old('phone')}}" name="phone" required class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group has-success required w-full lg:w-1/2 pr-3 field-input">
                                            <label for="postcode">
                                                <span>Postcode</span>
                                            </label>
                                            <div class="field-wrap">
                                                <input id="postcode" type="text" value="{{old('postcode')}}" name="postcode" required class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group has-success w-full field-input">
                                        <label for="address">
                                            <span>Street Address</span>
                                        </label>
                                        <div class="field-wrap">
                                            <textarea id="address" name="address" class="form-control" rows="2">{{trim(old('address'))}}</textarea>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap">
                                        <div class="form-group has-success required w-full lg:w-1/2 pr-3 field-input">
                                            <label for="town">
                                                <span>Town</span>
                                            </label>
                                            <div class="field-wrap">
                                                <input id="town" type="text" value="{{old('town')}}" name="town" required class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group has-success required w-full lg:w-1/2 pr-3 field-input">
                                            <label for="county">
                                                <span>County</span>
                                            </label>
                                            <div class="field-wrap">
                                                <input id="county" type="text" value="{{old('county')}}" name="county" required class="form-control" />
                                            </div>
                                        </div>
                                    </div>
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
                                <div class="text-center w-full my-2">
                                    {!! NoCaptcha::display() !!}
                                </div>
                            </div>
                            <button type="submit" class="max-w-4xl w-full mx-auto py-2 my-6 px-4 bg-green-500 text-white text-xl uppercase">Request</button>

                        </div>
                    </form>
                </div>
            @endif

        </div>
    </div>
@endsection

@section('foot')
    {!! NoCaptcha::renderJs() !!}


@endsection