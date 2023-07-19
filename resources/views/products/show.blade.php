<x-layout>



    <!-- content -->
    <section class="py-5">
        <div class="container">
            <div class="row gx-5">
                <aside class="col-lg-6">
                    <div class="border rounded-4 mb-3 d-flex justify-content-center">
                        <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="{{asset('storage/'.$product->image)}}">
                            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{asset('storage/'.$product->image)}}" />
                        </a>
                    </div>

                    <!-- thumbs-wrap.// -->
                    <!-- gallery-wrap .end// -->
                </aside>
                <main class="col-lg-6">
                    <h4 class="ps-lg-3">
                        <h4 class="title text-dark">
                            {{$product->title}} <br />
                        @if($product->price)
                            {{$product->dimensions}}
                        </h4>

                            <div class="mb-3">
                                <span class="h5">{{$product->price}}</span>
                                <span class="text-muted">TND</span>
                            </div>

                            <div class="float-container">


                            <div>
                                <form id="AddtoCart-form" method="POST" action="{{route('cart.store')}}"  enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                    <input type="hidden" value="{{ $product->name }}" name="name">
                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                    <input type="hidden" value="{{asset('storage/'.$product->image)  }}"  name="image">
                                    <input type="hidden" value="{{ $product->slug }}"  name="slug">


                                    <x-products.quantity-input />

                                    <!--<input type="hidden" value="1" name="quantity">-->
                                    <!--  <a href="" class="btn btn-primary shadow-0" > <i class="me-1 fa fa-shopping-basket"></i> Add to cart </a>-->
                                    <button type="submit" class="px-4 py-2 primary bg-blue-800 rounded">Add To Cart</button>
                                </form>

                            </div>
                            </div>

                        @else
                            </h4>
                             <p>
                                 {{$product->body}}
                            </p>
                            <a href="/"  class="btn btn-primary shadow-0"> <i class="me-1 fa fa-paper-plane"></i> Demande de Devis</a>

                        @endif
                    </div>
                </main>
            </div>
        </div>
    </section>




</x-layout>
