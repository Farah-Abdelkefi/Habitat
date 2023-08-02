<x-admin.layout active="Reference">
    <x-slot name="styles">


    </x-slot>

    <x-admin.table  request="reference/add" title="Reference" action="reference" >

        <x-slot name="columns">
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Products</th>
            <th>Actions</th>
        </x-slot>

        <x-slot name="addRow" >

        </x-slot>

        <x-slot name="links" >
        </x-slot>

        @foreach($references as $ref)

                <tr class="gradeA">
                    <td><img src="{{asset('storage/'.$ref->image)}}" style="height: 150px; width: 150px; "/></td>
                    <td>{{$ref->name }}</td>

                    <td>{{$ref->category->name }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Products
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach( $ref->products as $product )
                                    <div >
                                        {{$product->name}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td class="actions">
                        <x-form.button-action link="reference" :item=$ref />
                    </td>
                </tr>

        @endforeach




    </x-admin.table>

    <x-slot name="scripts">
        <script src="{{asset('assets/bundles/selectize.bundle.js')}}"></script>
        <script src="{{asset('assets/js/vendor/selectize.js')}}"></script>
    </x-slot>
</x-admin.layout>
