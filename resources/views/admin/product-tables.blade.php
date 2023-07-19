
<x-admin.layout active="Product" >
<x-slot name="styles">

    <link rel="stylesheet" href="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')}}">

</x-slot>


<x-admin.table  request="product/add" title="Products" action="product" >
<x-slot name="columns">
    <th>Image</th>
    <th>Name</th>
    <th>Body</th>
    <th>Dimensions</th>
    <th>Price</th>
    <th>Category</th>
    <th>Actions</th>
</x-slot>

<x-slot name="addRow">
    <td class="sorting_1">
        <x-form.input name="image" type="file" required />
    </td>
    <td>
        <x-form.input class="form-control input-block" name="name"  required />
    </td>
    <td>
        <x-form.input class="form-control input-block" name="body"  required />
    </td>
    <td>
        <x-form.input class="form-control input-block" name="dimensions"  required />
    </td>
    <td>
        <x-form.input class="form-control input-block" name="price"  required />
    </td>
    <td>
        <x-form.select-category />
    </td>

    <td class="actions">
        <x-form.button-action link="product" item="" />
    </td>

</x-slot>

<x-slot name="links">
    {{$products->links()}}
</x-slot>

    @foreach($products as $product)
        @if (session()->has('productToedit'))
            @if($product->id === Session::get('productToedit')->id)
                <tr role="row" class="adding odd">
                    <form method="POST" action="/product/{{ $product->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <td class="sorting_1">
                            <x-form.input name="image" type="file"  :value="old('image', $product->image)" />
                        </td>
                        <td>
                            <x-form.input class="form-control input-block" name="name" :value="old('name', $product->name)"  />
                        </td>
                        <td>
                            <x-form.input class="form-control input-block" name="body" :value="old('body', $product->body)" />
                        </td>
                        <td>
                            <x-form.input class="form-control input-block" name="dimensions" :value="old('dimensions', $product->dimensions)" />
                        </td>
                        <td>
                            <x-form.input class="form-control input-block" name="price"  :value="old('price', $product->price)" />
                        </td>
                        <td>
                            <x-form.select-category />
                        </td>

                        <td class="actions">
                            <x-form.button-action link="product" item="" />
                        </td>
                    </form>
                </tr>

            @endif
        @else
        <tr class="gradeA">
            <td><img src="{{asset('storage/'.$product->image)}}" style="width: fit-content; height: fit-content;"/></td>
            <td>{{$product->name }}</td>
            <td>{{$product->body}}</td>
            <td>{{$product->dimensions}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->category->name}}</td>
            <td class="actions">
                <x-form.button-action link="product" :item=$product />
            </td>
        </tr>
        @endif
    @endforeach


</x-admin.table>

<x-slot name="scripts">
    <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>
    <script src="{{asset('assets/js/table/datatable.js')}}"></script>

</x-slot>



</x-admin.layout>
