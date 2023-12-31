@if($pocket)
    <div class='home-2 mbm hidden-md hidden-lg  header_area main-menu-area' >
        <div class='menu_area mobile-menu' >
@else
    <div class='col-md-10 col-sm-10 col-xs-9' >
        <div class='tx_mmenu_together' >
@endif

        <nav class="poket_menu">
            <ul class="sub-menu">
                <li class="menu-item-has-children">
                    <a href="/#A-propos">Notre entreprise</a>
                </li>

                @foreach ($categories as $category  )
                    @if(! $category->parentCategory)

                        <x-category-menu-item :category=$category />

                    @endif

                @endforeach
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        @if(! $pocket )


        <div class="menu-left">
            <div class="main-search-menu">
                <div class="em-quearys-top msin-menu-search">
                    <div class="em-top-quearys-area">
                        <div class="em-header-quearys">
                            <div class="em-quearys-menu"> <i class="icofont-search-2 t-quearys"></i></div>
                        </div>
                        <div class="em-quearys-inner">
                            <div class="em-quearys-form">
                                <form class="top-form-control" action="/product" method="GET">
                                    <input type="text" placeholder="Type Your Keyword" name="search" value="{{request('search')}}" >
                                    <button class="top-quearys-style" type="submit"> <i class="icofont-long-arrow-right"></i> </button>
                                </form>
                                <div class="em-header-quearys-close text-center mrt10">
                                    <div class="em-quearys-menu"> <i class="icofont-close-line  t-close em-s-hidden"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu_popup_option">
                <div class="right_popupmenu_area">
                    <ul class="sub-menu">
                        <li><a href="#">Demande de devis</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>


