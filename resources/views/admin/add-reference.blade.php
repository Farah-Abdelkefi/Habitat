<x-admin.layout active="Reference">

    <x-slot name="styles">
        <style>

        </style>
    </x-slot>

    @if( request()->getRequestUri() != '/reference/add')
        <x-admin.add action="reference/{{$refToedit->id}}" discard="reference" >
            @method('PATCH')
            <div class="col-lg-4 col-md-6">
                <x-form.image-input :src="asset('storage/'.$refToedit->image)" name="image"  />
                <x-form.error name="image" />
            </div>
            <div class="col-lg-8 col-md-6">
                <br> <br> <br> <br>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name',$refToedit->name)}}"  >
                            <x-form.error name="name" />
                        </div>
                    </div>
                    <div class=" col-md-4">
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <x-form.select-category :category-to-edit="$refToedit->category->id" :parent="true" />
                        </div>
                    </div>
                    <div class=" col-md-8">
                        <div class="form-group">
                            <label class="form-label">Products</label>
                            <div class="form-group multiselect_div">
                                <select id="multiselect5" name="multiselect5[]" class="multiselect-custom"  multiple >
                                    @foreach( \App\Models\Category::all() as $category )
                                        @if (count($category->products) != 0)
                                            <optgroup label="{{ $category->name }}">
                                                @foreach( $category->products as $product )
                                                    <option value="{{ $product->id }}" name="reference_product" id="referenced_product" {{ $refToedit->products->contains('id',$product->id) ? 'selected' : '' }} >{{ $product->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>




        </x-admin.add>
    @else
        <x-admin.add action="reference/add" discard="reference" >
            <div class="col-lg-4 col-md-6">
                <x-form.image-input src="" name="image" required />
                @error('image')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>


            <div class="col-lg-8 col-md-6">
                <br> <br> <br> <br>

                <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')}}" required >
                        <x-form.error name="name" />
                    </div>
                </div>
                    <div class=" col-md-4">
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <x-form.select-category category-to-edit="" :parent="true" />
                        </div>
                    </div>
                 <div class=" col-md-8">
                        <div class="form-group">
                            <label class="form-label">Products</label>
                            <div class="form-group multiselect_div">
                                <select id="multiselect5" name="multiselect5[]" class="multiselect-custom"  multiple required>
                                    @foreach( \App\Models\Category::all() as $category )
                                        @if (count($category->products) != 0)
                                            <optgroup label="{{ $category->name }}">
                                                @foreach( $category->products as $product )
                                                    <option value="{{ $product->id }}" name="reference_product" id="referenced_product" >{{ $product->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                </div>




        </x-admin.add>
    @endif
    <x-slot name="scripts">




    </x-slot>
</x-admin.layout>
