<x-admin.layout active="Product">
    <x-slot name="styles">
       <style>

       </style>
    </x-slot>


    @if (request()->getRequestUri() != '/product/add')
        <x-admin.add action="product/{{$productToedit->id}}" discard="product" >
                    @method('PATCH')
                    <div class="col-lg-4 col-md-6">
                        <x-form.image-input :src="asset('storage/'.$productToedit->image)" name="image"  />
                        <x-form.error name="image" />
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name',$productToedit->name)}}" >
                                    <x-form.error name="name" />
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Dimensions</label>
                                    <input type="text" class="form-control" placeholder="Dimensions"  name="dimensions" value="{{old('dimensions',$productToedit->dimensions)}}" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Price</label>
                                    <input type="number" name="price" class="form-control" value="{{old('price',$productToedit->price)}}" >
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-label">Category</label>
                                    <x-form.select-category :category-to-edit="$productToedit->category_id"  />
                                </div>
                            </div>


                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <label class="form-label">Body</label>
                                <textarea rows="5" name="body" class="form-control" placeholder="Body" > {{ $productToedit->body }}</textarea>
                            </div>
                        </div>
                        </div>
                    </div>

        </x-admin.add>
    @else
    <x-admin.add action="product/add" discard="product" >
        <div class="col-lg-4 col-md-6">
            <x-form.image-input src="" name="image" required />
            <x-form.error name="image" />
        </div>
        <div class="col-lg-8 col-md-6">
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name" required >
                        <x-form.error name="name" />
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label class="form-label">Dimensions</label>
                        <input type="text" class="form-control" placeholder="Dimensions"  name="dimensions">
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label class="form-label">Price</label>
                        <input type="number" name="price" class="form-control"  >
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <x-form.select-category :req="true" :nullable="false" category-to-edit="" />
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group mb-0">
                        <label class="form-label">Body</label>
                        <textarea rows="5" name="body" class="form-control" placeholder="Body"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </x-admin.add>
    @endif

    <x-slot name="scripts">




    </x-slot>
</x-admin.layout>
