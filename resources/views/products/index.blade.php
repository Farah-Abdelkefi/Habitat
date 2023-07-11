<x-layout>

<br><br>


    <div class="container">
        <div class="row">

    @if(count($categories) )

                @foreach($categories as $category)

                    <x-Categories.item :category="$category"  />

                @endforeach

    @endif
    @if (count($products))


                @foreach($products as $product)

                        <x-products.item :product="$product" />

                @endforeach

       <!--/ .products-container-->
    @else
            @if(! count($categories))

            <p class="text-center">No products yet. Please check back later.</p>

            @endif
        @endif
    </div>

    </div>

</x-layout>
