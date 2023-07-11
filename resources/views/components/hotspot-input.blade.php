@props(['id','inputStyle','contentStyle','labelStyle'])
@php
    $product = \App\Models\Product::find($id);
@endphp

<div class="BornHS__Modal__Input">
    <input type="checkbox" id="{{$id}}" name="HotSpot" class="BornHS__Input" style="{{$inputStyle}}">
    <label for="{{$id}}" class="BornHS__Label" style="{{$labelStyle}}"></label>
    <label for="{{$id}}" class="BornHS__Overlay"></label>
    <!------------ Content Start ------------>
    <div class="BornHS__Modal__Content" style="{{$contentStyle}}">
        <div class="Content__Wrapper">
            <label for="{{$id}}" class="BornHS__Close"></label>
            <ul class="product-list image-top">
                <li>
                    <div class="product-inner">
                        <div class="product-image">
                            <a href="/product/{{$product->slug}}">
                                <img width="450" height="579" src="{{$product->image}}" />
                            </a>
                        </div>

                        <div class="product-info">
                            <h6 class="BornHS__Title"> {{$product->title}}</h6>
                            <span class="product-price">Dimensions  :  {{$product->dimensions}}</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!------------ Content End -------------->
</div>
