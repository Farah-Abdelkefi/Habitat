<x-admin.layout active="Partenariat">
    <x-slot name="styles">
        <style>
            button a {
                color : black;
                text-decoration: none;
            }
            button a:hover{
                color : red;
            }

        </style>
    </x-slot>

    @php
        $id = $logos->count()+1;
    @endphp
    <div class="row row-deck">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <br>
                    @if( \request()->getRequestUri() == "/logo")

                    <div class = "row justify-content-md-center">
                        <div class = "col-sm-auto ">
                            <a href="/logo/add" >
                                <button id="addToTable" class="btn btn-outline-dark" type="button" >
                                    <i class="icon wb-plus" aria-hidden="true"></i> ajouter un partenaire
                                </button>
                            </a>
                        </div>
                    </div>
                    @endif
                    @if( \request()->getRequestUri() == "/logo/add")
                        <tr role="row" class="adding odd">
                            <form method="POST" action="/logo/add" enctype="multipart/form-data">
                                @csrf
                                <div class = "row justify-content-md-center">
                                    <x-form.input name="name" id="name"  value="logo{{$id}}" hidden />
                                    <div class="col-lg-4 col-md-6">
                                    <x-form.image-input src="" name="value" />
                                    </div>
                                </div>
                                <div class="row justify-content-md-center">
                                    <div class = "col-sm-auto ">
                                        <button class="btn btn-outline-dark "  type="submit" style="width: max-content"> <i class="fa fa-save"></i>  save </button>
                                    </div>
                                    <div class = "col-sm-auto ">
                                        <a href="/logo">
                                            <button class="btn btn-outline-dark btn-icon button-discard"  data-toggle="tooltip"   >
                                                <a href="/logo" >
                                                <i class="icon-close" aria-hidden="true"></i>
                                                    Discard
                                                </a>
                                            </button>
                                        </a>
                                    </div>
                                </div>

                            </form>

                        </tr>
                    @endif
                    <br>
                <div class="row">
                    @foreach($logos as $logo)
                    <div class="col-sm-4" style="  align-items: center;" >
                    <img src="{{asset('storage/'.$logo->value)}}" />
                        <div  class="px-6 py-4 whitespace-nowrap text-sm font-medium "  >
                            <form method="POST" action="/logo/{{ $logo->id }}">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-sm btn-icon on-default button-remove" data-toggle="tooltip" data-original-title="Remove">
                            <a href="#"><i class="icon-trash" aria-hidden="true"></i></a>
                            </button>
                            </form>
                         </div>
                    </div>


        @endforeach

</div>
        </div>
            </div>
        </div>
    </div>
    <x-slot name="scripts">


    </x-slot>


</x-admin.layout>
