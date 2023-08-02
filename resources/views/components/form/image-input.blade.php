@props(['src','name'])
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Select an image  <small></small></h3>
        </div>
        <div class="card-body">
            <input type="file" id="{{$name}}" class="dropify" name="{{ $name }}" value="{{$src}}"  data-default-file="{{asset($src)}}" />

        </div>

    </div>
