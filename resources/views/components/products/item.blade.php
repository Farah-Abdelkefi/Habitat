
<style>

</style>
@if($product)

@if($product->price)
    <a href="/product/{{$product->slug}}">
    <div class="container col-sm-3" >
        <div class="card" >
            <div class="slide slide1">
                <div class="content">
                    <div class="icon">
                        <img src="{{asset('storage/'.$product->image)}}" class="card-img-top" style="height: inherit; " />
                    </div>
                </div>
            </div>
            <div class="slide slide2">
                <div class="content">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex flex-row">
                            <h3 class="mb-1 me-1">{{$product->name}}   {{ $product->dimensions }}</h3>
                            <!--<span class="text-danger"><s>$49.99</s></span>-->
                        </div>
                        <p class="card-text">{{$product->price}}  TND </p>
                        <div class="d-flex align-items-center pt-3 px-0 pb-0 mt-auto" style="width: 100%">

                            <a href="/product/{{$product->slug}}"   style="width: 100%; box-shadow: transparent;" class="btn btn-primary ">Add to cart</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    </a>

@else

    <div class="container col-sm-3">
    <a href="/product/{{$product->slug}}">

        <div class="card">
            <div class="slide slide1">
                <div class="content">
                    <div class="icon">
                        <img src="{{$product->image}}" class="card-img-top" />
                    </div>
                </div>
            </div>
            <div class="slide slide2">
                <div class="content">
                    <h3>
                        {{$product->title}}
                    </h3>

                </div>
            </div>
        </div>
</a>
    </div>

@endif
@endif
