<x-admin.layout active="Instagram">
    <x-slot name="styles">

    </x-slot>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Instagram Images </h3>
        </div>
        <div class="container">
            <form method="POST" action="/insta" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class = "row justify-content-md-center">
                    @foreach( $insta_imgs as $insta_img)
                        <div class="col-sm-auto">
                            <x-form.input name="id{{$loop->iteration}}" id="id" :value="old('id{{$loop->iteration}}', $insta_img->id)"  hidden />
                            <x-form.input name="name{{$loop->iteration}}" id="name" :value="old('name{{$loop->iteration}}', $insta_img->name)"  hidden />
                            <x-form.image-input src="storage/{{$insta_img->value}}" name="insta_img_value{{$loop->iteration}}" />
                            <x-form.error name="insta_img_value{{$loop->iteration}}"/>
                        </div>
                    @endforeach
                </div>
                <div class = "row justify-content-md-center">
                    <div class = "col-sm-auto ">
                        <button class="btn btn-outline-dark "  type="submit" style="width: max-content"> <i class="fa fa-save"></i>  save </button>
                    </div>
                </div>
            </form>
            <br> <br>
        </div>
    </div>
    <x-slot name="scripts">

    </x-slot>
</x-admin.layout>
