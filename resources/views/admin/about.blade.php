<x-admin.layout active="About">

    <x-slot name="styles">
    </x-slot>

    <div class="row row-deck">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form  id="about" name="about" method="POST" action="/about" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <x-form.input name="about_id" id="id" :value="old('id',$about->id)" hidden/>
                                    <x-form.input name="about_name" id="name" :value="old('about_name', $about->name)"  hidden />
                                    <textarea rows="4" class="form-control" name="about_value" id="value" placeholder="" required > {{ old('about_value',  $about->value ) }}</textarea>
                                    <x-form.error name="about_value" />
                                </div>

                            </div>
                        </div>
                        <br> <br>
                        <div class="container">
                            <div class = "row justify-content-md-center">

                               <x-form.input name="about_img_id" id="id" :value="old('about_img_id',$about_img->id)" hidden/>
                                <x-form.input name="about_img_name" id="name" :value="old('about_img_name', $about_img->name)"  hidden />
                                <div class="col-lg-4 col-md-6">
                                <x-form.image-input src="storage/{{$about_img->value}}" name="about_img_value" />
                                <x-form.error name="about_img_value" />
                                </div>
                            </div>
                            <!--  </div>-->
                        </div>
                        <br><br>
                        <div class="row justify-content-md-center">
                            <div class = "col-sm-auto ">
                                <button class="btn btn-outline-dark "   type="submit" style="width: max-content"> <i class="fa fa-save"></i>  save </button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>


<x-slot name="scripts">

</x-slot>

</x-admin.layout>
