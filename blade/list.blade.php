@foreach($products as $product)
    <div class=" w-1/2 md:w-1/3 lg:w-1/4">

        {{-- ... --}}

        {{--This line is too long, how would you rework it?--}}
        <a href="{{route('product.show', [$product->name])}}" class="whitespace-no-wrap overflow-hidden shadow bg-yellow-500 w-full text-black rounded block text-center font-number text-3xl sm:text-4xl md:text-5xl px-1">
            {{$product->label}}
        </a>

        {{-- ... --}}

    </div>
@endforeach