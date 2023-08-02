
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


    </x-slot>

<x-slot name="links">
    {{$products->links()}}
</x-slot>

    @foreach($products as $product)

        <tr class="gradeA">
            <td><img src="{{asset('storage/'.$product->image)}}"/></td>
            <td>{{$product->name }}</td>
            <td>{{$product->body}}</td>
            <td>{{$product->dimensions}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->category->name}}</td>
            <td class="actions">
                <x-form.button-action link="product" :item=$product />
            </td>
        </tr>

    @endforeach


</x-admin.table>

<x-slot name="scripts">
    <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>
    <script src="{{asset('assets/js/table/datatable.js')}}"></script>

</x-slot>



</x-admin.layout>
