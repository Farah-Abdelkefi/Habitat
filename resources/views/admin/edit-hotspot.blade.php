<x-admin.layout active="Hotspot">
    <x-slot name="styles" >
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/allcss/realestate_style.css')}}" />
        <style>
            a ,a:active {
                color: black;
                text-underline: none;
            }
            a:hover {
                color : white;
            }
        </style>
    </x-slot>


    @php
        if( $hotspot){
        $hotspot->input_left = request()->method()=="GET" ? $hotspot->input_left : $_POST['input_left'];
        $hotspot->input_top = request()->method() == "GET" ? $hotspot->input_top : $_POST['input_top'];
        $hotspot->content_left = request()->method()=="GET" ? $hotspot->content_left : $_POST['content_left'];
        $hotspot->content_top = request()->method() == "GET" ? $hotspot->content_top : $_POST['content_top'];
        $hotspot->label_left = request()->method()=="GET" ? $hotspot->label_left : $_POST['label_left'];
        $hotspot->label_top = request()->method() == "GET" ? $hotspot->label_top : $_POST['label_top'];
        $hotspot->product_id = request()->method() == "GET" ? $hotspot->product_id : $_POST['product_id'];
        }

    @endphp
    <div class="BornHS__Wrapper">
        <!------------ Image Start ------------>

        <figure>
            <img class="img-fluid" src="{{asset('storage/'.$hotspot_img->value)}}" alt="">
        </figure>

        <div class="BornHS__Modal">

                <!------------ HotSpot Input Start ------------>
            @if( $hotspot )
                <x-hotspot-input  :hotspot="$hotspot" />

            @endif
        </div>
    </div>

        <br>
        <form name="see-form" id="see-form" action="{{ request()->getRequestUri() == "/hotspot/add" ? '/hotspot/add' : '/hotspot/edit/'.$hotspot->id }}" method="POST">
            @csrf
            <div class="container">
                <div class="row">

                    <div class="col-sm-4">
                    <x-form.label name="input left" />
                    <x-form.input name="input_left" type="number" :value="request()->getRequestUri() == '/hotspot/add' ? '' :old('input_left',$hotspot->input_left)" required/>
                    </div>

                    <div class="col-sm-4">
                    <x-form.label name="content left" />
                    <x-form.input name="content_left" type="number" :value="request()->getRequestUri() == '/hotspot/add' ? '' :old('content_left',$hotspot->content_left)" required/>
                    </div>

                    <div class="col-sm-4">
                        <x-form.label name="label left" />
                        <x-form.input name="label_left" type="number" :value="request()->getRequestUri() == '/hotspot/add' ? '' :old('label_left',$hotspot->label_left)" required />
                    </div>

                </div>
                <div class="row">

                    <div class="col-sm-4">

                        <x-form.label name="input top" />
                        <x-form.input name="input_top" type="number" :value="request()->getRequestUri() == '/hotspot/add' ? '' :old('input_top',$hotspot->input_top)" required/>

                    </div>
                    <div class="col-sm-4">
                        <x-form.label name="content top" />
                        <x-form.input name="content_top" type="number" :value="request()->getRequestUri() == '/hotspot/add' ? '' :old('content_top',$hotspot->content_top)" required />

                    </div>
                    <div class="col-sm-4">
                        <x-form.label name="label top" />
                        <x-form.input name="label top" type="number" :value="request()->getRequestUri() == '/hotspot/add' ? '' :old('label_top',$hotspot->label_top)" required/>
                    </div>
                </div>

                    <x-form.label name="product" />
                    <select name="product_id" id="product_id" class="form-control input-block"  >
                        @foreach (\App\Models\Product::all() as $product)
                            @php
                                $old_prod = old("product_id",$hotspot->product_id) == $product->id ? 'selected' : ' ';
                            @endphp

                            <option
                                value="{{ $product->id }}"
                                {{request()->getRequestUri() == '/hotspot/add' ? '' : $old_prod }}
                            >{{ ucwords($product->name) }}
                            </option>
                        @endforeach
                    </select>
                <x-form.error name="product" />
                </div>

            </div>
            <br>
            <button type="submit" onclick="document.forms('see-form').submit()" class="btn btn-outline-dark"><i class="fa fa-eye"></i> see changes </button>
        </form>


    @if(  request()->getRequestUri() != "/hotspot/add")

    <form id="save-form" name="save-form" method="POST" action="/hotspot/edit/{{$hotspot->id}}" class=" save-form hidden">
        @csrf
        @method('PATCH')
        <div class="container hidden">
            <div class="row">

                <div class="col-sm-4">
                    <x-form.label name="input left" />
                    <x-form.input name="input_left" type="number" :value="old('input_left',$hotspot->input_left)" />
                </div>

                <div class="col-sm-4">
                    <x-form.label name="content left" />
                    <x-form.input name="content_left" type="number" :value="old('content_left',$hotspot->content_left)"/>
                </div>

                <div class="col-sm-4">
                    <x-form.label name="label left" />
                    <x-form.input name="label_left" type="number" :value="old('label_left',$hotspot->label_left)" />
                </div>

            </div>
            <div class="row">

                <div class="col-sm-4">

                    <x-form.label name="input top" />
                    <x-form.input name="input_top" type="number" :value="old('input_top',$hotspot->input_top)" />

                </div>
                <div class="col-sm-4">
                    <x-form.label name="content top" />
                    <x-form.input name="content_top" type="number" :value="old('content_top',$hotspot->content_top)" />

                </div>
                <div class="col-sm-4">
                    <x-form.label name="label top" />
                    <x-form.input name="label top" type="number" :value="old('label_top',$hotspot->label_top)" />
                </div>
            </div>

            <x-form.label name="product" />
            <select name="product_id" id="product_id" class="form-control input-block"  >
                @foreach (\App\Models\Product::all() as $product)
                    <option
                        value="{{ $product->id }}"
                        {{ old('product_id',$hotspot->product_id) == $product->id ? 'selected' : '' }}
                    >{{ ucwords($product->name) }}</option>
                @endforeach
            </select>
        </div>

    </form>
    @endif
    <button type="submit" onclick="document.getElementById('save-form').submit()"  class="btn btn-outline-dark"><i class="fa fa-save"></i> save </button>

    <a href="/hotspot"  >

        <button class="btn btn-outline-dark btn-icon button-discard"  data-toggle="tooltip"   >
            <i class="icon-close" aria-hidden="true"></i>
            Discard
        </button>
    </a>


    <x-slot name="scripts">

    </x-slot>


</x-admin.layout>
