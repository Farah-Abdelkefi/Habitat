
<select name="category_id" id="category_id" class="form-control input-block"  required>
    {{$slot}}
    @foreach (\App\Models\Category::all() as $category)
        <option
            value="{{ $category->id }}"
            {{ old('category_id') == $category->id ? 'selected' : '' }}
        >{{ ucwords($category->name) }}</option>
    @endforeach
</select>

<x-form.error name="category"/>
