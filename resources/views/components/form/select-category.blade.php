@props(['nullable' => false,'req'=>true ,'categoryToEdit' , 'parent' => false])
<select name="category_id" id="category_id" class="form-control input-block" {{$req  ? 'required' : ''}}  >
    @if($nullable)
        <option
            value="{{null}}"
            {{ $categoryToEdit == null ? 'selected' : '' }}

        > None
        </option>
    @endif
    @if($parent)
            @foreach (\App\Models\Category::all() as $category)
                @if( ! $category->parentCategory )
                    <option
                        name = "category_id"
                        value="{{ $category->id }}"
                        {{ $categoryToEdit == $category->id ? 'selected' : '' }}
                    >{{ ucwords($category->name) }}
                    </option>
                @endif
            @endforeach
    @else
            @foreach (\App\Models\Category::all() as $category)
                <option
                    name = "category_id"
                    value="{{ $category->id }}"
                    {{ $categoryToEdit == $category->id ? 'selected' : '' }}
                >{{ ucwords($category->name) }}
                </option>
            @endforeach
    @endif

</select >

<x-form.error name="category"/>
