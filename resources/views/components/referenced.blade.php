@props((['ref']))
<div class="grid-item col-lg-4 col-md-4 col-xs-12 col-sm-12 witr_all_mb_30 {{$ref->category->slug}}">
    <div class="single_protfolio">
        <div class="prot_thumb">
            <img  src="{{asset('storage/'.$ref->image)}}" alt="image" style="height: min-content; width: min-content; "/>
            <div class="prot_content em_port_content">
                <div class="prot_content_inner">
                    <div class="picon">
                           <a class="portfolio-icon venobox vbox-item" data-gall="myGallery" href="{{asset('storage/'.$ref->image)}}">
                        <i class="icofont-image"></i></a>
                    </div>
                    <h3><a href="#">{{ $ref->name }}</a></h3>
                    <p> <span class="category-item-p">{{ $ref->category->name }}</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
