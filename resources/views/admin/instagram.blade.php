<x-admin.layout active="Instagram">
    <x-slot name="styles">

    </x-slot>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Instagram Images </h3>
        </div>
        <div class="container">
            <div class = "row justify-content-md-center">

            @foreach( $insta_imgs as $insta_img)
                    <form method="POST" action="/insta/{{$insta_img->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                                    <x-form.input name="name" id="name" :value="old('name', $insta_img->name)"  hidden ></x-form.input>
                                    <x-form.image-input src="storage/{{$insta_img->value}}" name="value" />
                            <div class = "col-sm-auto ">
                                <button class="btn btn-outline-dark "  type="submit" style="width: max-content"> <i class="fa fa-save"></i>  save </button>
                            </div>

                    </form>
                @endforeach


            </div>
        </div>



    </div>



    <x-slot name="scripts">

    </x-slot>
</x-admin.layout>
