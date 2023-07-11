@props(['category'])


@if(  count($category->kids()) != 0 )
    <li class="menu-item-has-children">
        @if(! $category->parentCategory)
            <a href="/{{$category->slug}}"> {{$category->name}}</a>
        @else
            <a href="/product-category/{{$category->slug}}"> {{$category->name}}</a>
        @endif


        <ul class="sub-menu">

            @foreach($category->kids() as $kid)
                <x-category-menu-item :category=$kid  />
            @endforeach
        </ul>
    </li>
@else
    <li><a href="/product-category/{{$category->slug}}"> {{$category->name}}</a></li>
@endif


