<x-admin.layout active="Hotspot">

    <x-slot name="styles">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/allcss/realestate_style.css')}}" />
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">HotSpot</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="row align-items-center">
                    <div class="col">

                        <form method="POST" action="/about/{{$hotspot_img->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="container">
                                <div class = "row justify-content-md-center">
                                    <x-form.input name="name" id="name" :value="old('name', $hotspot_img->name)"  hidden ></x-form.input>
                                    <div class="col-lg-4 col-md-6">
                                        <x-form.image-input src="storage/{{$hotspot_img->value}}" name="value" />
                                    </div>
                                </div>
                                <div class="row justify-content-md-center">
                                    <div class = "col-sm-auto ">
                                        <button class="btn btn-outline-dark "  type="submit" style="width: max-content"> <i class="fa fa-save"></i>  save </button>
                                    </div>
                                </div>

                                <!--  </div>-->
                            </div>

                        </form>
                        <br>
                        <a href="/hotspot/add">
                            <button class="btn btn-outline-dark">
                                new hotspot input
                            </button>
                        </a>
                        <br>
                        <br>
                        <x-hotspot-wrapper />

                    </div>



                    </div>

                </div>
            </div>
        </div>
    </div>


    <x-slot name="scripts">
    </x-slot>

</x-admin.layout>
