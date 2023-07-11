
    <div class="container col-sm-3">
        <a href="/product-category/{{$category->slug}}">

            <div class="card">
                <div class="slide slide1">
                    <div class="content">
                        <div class="icon">
                            <img src="{{$category->image}}" class="card-img-top" />
                        </div>
                    </div>
                </div>
                <div class="slide slide2">
                    <div class="content">
                        <h3>
                            {{$category->name}}
                        </h3>
                        <div class="d-flex align-items-center pt-3 px-0 pb-0 mt-auto" style="width: 100%">

                            <a href="/product-category/{{$category->slug}}"  style="width: 100%;" class="btn btn-primary shadow-0 me-1">Decouvrir</a>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>



