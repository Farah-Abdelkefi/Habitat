@props(['hotspot'])

@php
    $input = 'left: % ; top : % ;';
    $content = 'left:'.$hotspot->content_left.'% ; top : '.$hotspot->content_top.'% ;';
    $label = 'left:'.$hotspot->label_left.'% ; top : '.$hotspot->label_top.'% ;';
    $product = \App\Models\Product::find($hotspot->product_id);
@endphp
<div class="BornHS__Modal__Input">
    <input type="checkbox" id="H{{$hotspot->id}}" name="HotSpot" class="BornHS__Input" style="{{$input}}">
    <label for="H{{$hotspot->id}}" class="BornHS__Label" style="{{$label}}"></label>
    <label for="H{{$hotspot->id}}" class="BornHS__Overlay"></label>
    <!------------ Content Start ------------>
    <div class="BornHS__Modal__Content" style="{{$content}}">
        <div class="Content__Wrapper">
            <label for="H{{$hotspot->id}}" class="BornHS__Close"></label>
            <ul class="product-list image-top">
                <li>
                    <div class="product-inner">
                        <div class="product-image">
                            <a href="/product/{{$product->slug}}">
                                <img width="450" height="579" src="{{asset('storage/'.$product->image)}}" />
                            </a>
                        </div>
                        <div class="product-info">
                            <h6 class="BornHS__Title"> {{$product->title}}</h6>
                            <span class="product-price">Dimensions  :  {{$product->dimensions}}</span>
                        </div>

                        @if (request()->getRequestUri() === "/hotspot")
                            <x-form.button-action :item="$hotspot" link="hotspot"/>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!------------ Content End -------------->
</div>
