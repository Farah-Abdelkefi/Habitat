<x-admin.layout active="Collection">
    <x-slot name="styles">


    </x-slot>


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">New Collection Products </h3>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body demo-card">
                        <div class="row clearfix">
                            <form method="POST" action="/collection" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <div class="col-lg-12 col-md-12">
                                    <x-form.input name="id" id="id" :value="old('id',$collectionTitle->id)" hidden/>
                                    <x-form.input name="name" id="name" :value="old('name', $collectionTitle->name)"  hidden/>
                                    <x-form.label name=" Title "/>
                                    <x-form.input class="form-control" name="value" id="value" value="{{ old('value',$collectionTitle->value) }}" required />

                                </div>
                                <br> <br>
                                <div class="col-lg-12 col-md-12">
                                    <x-form.label name="New Collection Products" />
                                    <div class="form-group multiselect_div">
                                        <select id="multiselect5" name="multiselect5[]" class="multiselect-custom"  multiple required>
                                            @foreach( $categories as $category )
                                                @if (count($category->products) != 0)
                                                    <optgroup label="{{ $category->name }}">
                                                        @foreach( $category->products as $product )
                                                            <option value="{{ $product->id }}" name="new_arrival_product" id="new_arrival_product"  {{ $product->new_arrival_product == 1 ? 'selected' : '' }} >{{ $product->name }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-form.error name="multiselect5" />
                                </div>
                                <br> <br>
                                <div class = "row justify-content-md-center">

                                    <x-form.input name="collection_img_id" id="id" :value="old('collection_img_id',$collection_img->id)" hidden/>
                                    <x-form.input name="collection_img_name" id="name" :value="old('collection_img_name', $collection_img->name)"  hidden />
                                    <div class="col-lg-4 col-md-6">
                                        <x-form.image-input src="storage/{{$collection_img->value}}" name="collection_img_value" />
                                        <x-form.error name="collection_img_value" />
                                    </div>
                                </div>
                                <br> <br>
                                <div class="row justify-content-md-center">
                                    <div class = "col-lg-auto">
                                        <button class="btn btn-outline-dark "  type="submit" style="width: max-content"> <i class="fa fa-save"></i>  save </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <x-slot name="scripts">


    </x-slot>
</x-admin.layout>
