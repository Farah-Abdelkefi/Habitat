
<x-admin.layout active="Category" >

<x-slot name="styles">

    <link rel="stylesheet" href="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')}}">

</x-slot>
    <x-admin.table  request="category/add" title="categories" action="category" >
        <x-slot name="columns">

            <th>Name</th>
            <th>Parent Category</th>
            <th>Actions</th>
        </x-slot>

        <x-slot name="addRow">
            <td class="sorting_1">
                <x-form.input class="form-control input-block" name="name"  required />
            </td>
            <td>
                <x-form.select-category :nullable="true" :req="false" :category-to-edit="null" />

            </td>

            <td class="actions">
                <x-form.button-action link="category" item="" />
            </td>

        </x-slot>

        <x-slot name="links">
            {{$categories->links()}}
        </x-slot>

        @foreach($categories as $category)
            @if (session()->has('categoryToedit'))
                @if($category->id === Session::get('categoryToedit')->id)
                    <tr role="row" class="adding odd">
                        <form method="POST" action="/category/{{ $category->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <td class="sorting_1">
                                <x-form.input class="form-control input-block" name="name" :value="old('name', $category->name)"  />
                            </td>
                            <td>
                                <x-form.select-category :nullable="true" :req="false" :category-to-edit="$category->parentCategory ? $category->parentCategory->id : null" />
                            </td>
                            <td class="actions">
                                <x-form.button-action link="category" item="" />
                            </td>
                        </form>
                    </tr>

                @endif
            @else
                <tr class="gradeA">
                    <td>{{$category->name }}</td>
                    @if( $category->parentCategory)
                        <td>{{$category->parentCategory->name}}</td>
                    @else
                        <td> None </td>
                    @endif

                    <td class="actions">
                        <x-form.button-action link="category" :item=$category />
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
