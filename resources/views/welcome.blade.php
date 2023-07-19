<x-layout  >

    <div class="witr_ds_content_area">
        <div class=" witr_ds_content witr_slick_height text-left" style="background-image:url({{asset('assets/images/realestate/slider1.jpg')}})">
            <div class="witr_ds_content_inner witr_containers fadeInUp">
                <h2>Collection 2023</h2>
                <div class="slider_btn">
                    <div class="witr_btn_style">
                        <div class="witr_btn_sinner">
                            <a class="witr_btn" href="/">DÉCOUVRIR</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end slider area -->
    <!-- about area  -->
    <div id="A-propos" class="realestate_about_area">
        <div class="container ">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="about_content_inner">
                        <div class="witr_section_title">
                            <div class="witr_section_title_inner text-left">
                                <h2>A propos</h2>
                                <h3>habitat</h3>
                                <p>
                                    {{ $about->value }}

                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="about_image_inner">
                        <div class="single_image_area">
                            <div class="single_image single_line_option">
                                <img src="{{asset("storage/".$about_img->value)}}" alt="image" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- start logos -->
    <div class="realestate_brand_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="carousel_imagess_area">
                        <div class="brand_act">

                            @foreach( $logos as $logo)
                                <x-logo :src="$logo->value"/>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end logos -->

    <!--  image hotspot -->
    <div class="container-fluid image_hotspot">
        <div class="row">
            <div class="col-md-12">
                <!------------ Component Start ------------>
                <x-hotspot-wrapper />
                <!------------ Component End -------------->
            </div>
        </div>
    </div>
    <!-- end image hotspot -->
    <!-- start realisation -->
    <div class="realestate_portfolio_area portfolio_grid_area portfolio_3column_area portfolio_style2 pstyle2 pstyle_1">
        <div class="container-fluid realisation">
            <div class="row">
                <div class="col-lg-12">
                    <div class="witr_section_title">
                        <div class="witr_section_title_inner text-center">
                            <h3>NOS RÉFERENCES</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="clearfix kicuakta">
                        <div class="col-md-12">
                            <div class="portfolio_nav  wittr_pfilter_menu">
                                <ul id="filter" class="filter_menu ">
                                    <li class="current_menu_item" data-filter="*">All Work</li>

                                    @foreach( $categories as $category)
                                        @if(! $category->parentCategory)
                                            <li data-filter=".{{$category->name}}"> {{$category->name}} </li>
                                        @endif
                                    @endforeach
                                    <li data-filter=".bussiness"> Portes </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="pstyle2">
                        <div class="prot_wrap row portfolio_active">
                            <!-- single portfolio -->
                            @foreach($referenced_products as $ref_product)
                                <x-referenced :product="$ref_product" />
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End realisation -->
    <!-- visite virtuelle -->
    <section class="visite_virtuelle">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="witr_section_title">
                        <div class="witr_section_title_inner text-center">
                            <h3>VISITE VIRTUELLE 360°</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="image_virtuelle">

                        <img src="assets/images/realestate/visite_virtuelle.jpg" />

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End visite virtuelle -->
    <!-- instagram-->
    <section class="gallery_sec_instagram">
        <div class="container">
            <div class="witr_section_title">
                <div class="witr_section_title_inner text-center">
                    <h2>Suivez nous sur instagram</h2>
                    <h3>@habitat</h3>
                </div>
            </div>
            <div class="row">
                @foreach( $insta_imgs as $insta_img)
                    <x-insta-logo :src="$insta_img->value" />

                @endforeach
            </div>
        </div>
    </section>
    <!--end instagram-->
</x-layout>
