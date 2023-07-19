<x-admin.layout active="About">

    <x-slot name="styles">
    </x-slot>

    <div class="row row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form  method="POST" action="/about/{{$about->id}}">
                        @csrf
                        @method('PATCH')
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-11">
                                    <x-form.input name="name" id="name" :value="old('name', $about->name)"  hidden></x-form.input>
                                    <textarea  class="form-control" name="value" id="value" placeholder="" required >{{ old('value',  $about->value ) }}</textarea>
                                </div>
                                <div class="col-sm-1">
                                    <button class="btn btn-outline-dark" type="submit"> <i class="fa fa-save"></i>  save </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <form method="POST" action="/about/{{$about_img->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="container">
                            <div class = "row justify-content-md-center">
                                <x-form.input name="name" id="name" :value="old('name', $about_img->name)"  hidden ></x-form.input>
                                <x-form.image-input src="storage/{{$about_img->value}}" name="value" />
                            </div>
                            <div class="row justify-content-md-center">
                                <div class = "col-sm-auto ">
                                    <button class="btn btn-outline-dark "  type="submit" style="width: max-content"> <i class="fa fa-save"></i>  save </button>
                                </div>
                            </div>

                            <!--  </div>-->
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


<x-slot name="scripts">


</x-slot>

</x-admin.layout>
