@props(['action','discard'])

<div class="card">
    <form method="POST" action="/{{$action}}" enctype="multipart/form-data">

        @csrf
        <div class="card-body" >
            <div class="row clearfix">
                {{ $slot }}
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-outline-dark"> <i class="fa fa-save"></i> save</button>

            <a href="/{{$discard}}">
                <button class="btn btn-outline-dark"  data-toggle="tooltip" type="button"  >
                    <i class="icon-close" aria-hidden="true"></i>
                    discard
                </button>
            </a>
        </div>
    </form>

</div>
