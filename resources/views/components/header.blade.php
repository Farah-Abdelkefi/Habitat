

<div class="wide_layout" style="align-content: space-between; ">

    <!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->
    <header id="header" data-shrink="1" class="type-1 " >

        <div class="h_top_part ">
            <div class="container">
                <div class="row ">
                    <div class=" col-sm-9">

                    @auth()
                        <div class="bar-login">
                            <span>
                                    Bienvenu, {{ auth()->user()->name }}!
                            </span>

                            <a class="to-logout"  href="#"  x-data="{}"  onclick="document.querySelector('#logout-form').submit()">
                                <i class="fa fa-sign-out" ></i>
                                <span>Se déconnecter</span>
                            </a>

                            <form id="logout-form" method="POST" action="/logout" class="hidden">
                                @csrf
                            </form>
                        </div>


                    @else
                        <div class="bar-login">
                            <a class="to-login"  href="/login"><i class="fa fa-unlock-alt"></i><span>S'identifier</span></a>
                            <a href="/register"><i class="fa fa-user"></i><span>Inscription</span></a>
                        </div>
                    @endauth
                    </div>
                    @auth()
                        @php(\Cart::session(\request()->user()->id))
                    @endauth
                    <div class="col-sm-3">
                        <div class="cart-holder clearfix">
                            <ul class="cart-set">
                                <li id="shopping-button">
                                    <a class="shopping-button" href="/my-cart">
                                        <div class="rapid_acess_items">
                                            <div class="rapid_acess_item nbr_product">
                                                <b> COMMANDE : {{ count(Cart::getContent()) }} article(s) </b>
                                            </div>
                                        </div>
                                    </a><!--/ .shopping-button-->
                                </li>
                            </ul> <!-- / .cart-set-->
                        </div><!--/ .cart-holder-->
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>

<div class="em40_header_area_main">
    <!-- END HEADER TOP AREA -->
    <div class="poket-main-menu one_page hidden-xs hidden-sm  witr_h_h10">
        <div class="poket_nav_area">
            <div class="container">
                <div class="row logo-left">
                    <x-logo />
                    <x-menu  :pocket=false />
                </div>
            </div>
        </div>
    </div>
</div>
