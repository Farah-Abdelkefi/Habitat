@props(['link','item'])
<style>
    a{
        text-decoration: none;
        color : black;
    }
    a:hover{
        color:red;
    }
</style>
    @if (! $item)

        <div class="container ">
            <div class="row">
                <div class="col-sm-6">
                    <button class="btn btn-sm btn-icon on-editing m-r-5 button-save" type="submit"  data-toggle="tooltip" data-original-title="Save" >
                     <a href="#"><i class="icon-drawer" aria-hidden="true"></i></a>
                    </button>
                </div>
                <div class="col-sm-6">
                    <a href="/{{$link}}">
                        <button class="btn btn-sm btn-icon on-editing m-r-5 button-discard"  data-toggle="tooltip" data-original-title="Discard"  >
                            <a href="/{{$link}}"  >
                                <i class="icon-close" aria-hidden="true"></i>
                            </a>
                        </button>
                    </a>
                </div>
            </div>
        </div>


    @else

        <div class="container ">
            <div class="row">
                <div class="col-sm-6">
    <a href="/{{$link}}/edit/{{$item->id}}">
        <button class="btn btn-sm btn-icon on-default m-r-5 button-edit"
                data-toggle="tooltip" data-original-title="Edit">
            <i class="icon-pencil" aria-hidden="true"></i>
        </button>
    </a>
                </div>
<div class="col-sm-6">
    <!--  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"> -->
        <form method="POST" action="/{{$link}}/{{ $item->id }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-icon on-default button-remove"
                    data-toggle="tooltip" data-original-title="Remove">
                <a href="#"><i class="icon-trash" aria-hidden="true"></i></a>
            </button>
        </form>
            </div>
            </div>
        </div>
   <!-- </td> -->
@endif

