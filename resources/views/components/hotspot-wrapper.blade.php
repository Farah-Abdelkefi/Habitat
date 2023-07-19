

@php
    $hotspot_img = \App\Models\Variables::firstWhere('name','hotspot_img');
    $hotspots = \App\Models\HotSpotInput::all();
@endphp
<div class="BornHS__Wrapper">
    <!------------ Image Start ------------>



    <figure>
        <img class="img-fluid" src="{{asset('storage/'.$hotspot_img->value)}}" alt="">
    </figure>
    <!------------ Image End -------------->

    <!------------ HotSpot Wrapper Start ------------>
    <div class="BornHS__Modal">

        @foreach($hotspots as $hotspot)

            <!------------ HotSpot Input Start ------------>
            <x-hotspot-input  :hotspot="$hotspot" />
            <!------------ HotSpot Input End -------------->
        @endforeach




    </div>
    <!------------ HotSpot Wrapper End -------------->

</div>
<!------------ HotSpot Wrapper End -------------->

</div>
