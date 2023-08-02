@props(['product'])

<div class="col-6 col-sm-4">
    <label class="imagecheck mb-3">
        @if( request()->getRequestUri() == '/collection/edit/'.$product->id )
            <form method="POST" action="/collection/edit/{{$product->id}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <input name="new_arrival_product" id="new_arrival_product" type="checkbox"   value="1" class="imagecheck-input" {{ $product->new_arrival_product === 1 ? 'checked' : '' }}  />
                <figure class="imagecheck-figure">
                    <img src="{{asset('storage/'.$product->image)}}" alt="}" class="imagecheck-image">
                </figure>
                <div>

                </div>
                <button type="submit" class="btn btn-outline-dark "  > save </button>

            </form>
        @else
            <form method="POST" action="/reference/edit/{{$product->id}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <input name="referenced_product" id="referenced_product" type="checkbox"   value="1" class="imagecheck-input" {{ $product->referenced_product === 1 ? 'checked' : '' }}  >
                <figure class="imagecheck-figure">
                    <img src="{{asset('storage/'.$product->image)}}" alt="}" class="imagecheck-image" >
                </figure>
                <div>
                </div>
                <button type="submit" class="btn btn-outline-dark "  > save </button>
            </form>

        @endif

    </label>
</div>

