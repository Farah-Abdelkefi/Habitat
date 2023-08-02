
@props(['active'])
<!-- Small icon top menu -->
<div id="header_top" class="header_top">
    <div class="container">
        <div class="hleft">
            <div class="dropdown">
                <a href="javascript:void(0)" class="nav-link user_btn"><img class="avatar" src="../assets/images/user.png" alt=""/></a>
                <a href="page-search.html" class="nav-link icon"><i class="fa fa-search"></i></a>
                <a href="index.html" class="nav-link icon"><i class="fa fa-home"></i></a>

            </div>
        </div>
        <div class="hright">
            <div class="dropdown">
                <a href="javascript:void(0)" class="nav-link icon settingbar"><i class="fa fa-bell"></i></a>
                <a href="javascript:void(0)" class="nav-link icon menu_toggle"><i class="fa fa-navicon"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- start Main menu -->
<div id="left-sidebar" class="sidebar">
    <div class="d-flex justify-content-between brand_name">
        <h5 class="brand-name">Crush it</h5>
        <div class="theme_btn">
            <a class="theme1" data-toggle="tooltip" title="Theme Radical" href="#" onclick="setStyleSheet('assets/css/theme1.css', 0);"></a>
            <a class="theme2" data-toggle="tooltip" title="Theme Turmeric" href="#" onclick="setStyleSheet('assets/css/theme2.css', 0);"></a>
            <a class="theme3" data-toggle="tooltip" title="Theme Caribbean" href="#" onclick="setStyleSheet('assets/css/theme3.css', 0);"></a>
            <a class="theme4" data-toggle="tooltip" title="Theme Cascade" href="#" onclick="setStyleSheet('assets/css/theme4.css', 0);"></a>

         </div>
    </div>
    <div class="input-icon">
                <span class="input-icon-addon">
                    <i class="fe fe-search"></i>
                </span>
        <input type="text" class="form-control" placeholder="Search...">
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active show" id="all-tab">
            <nav class="sidebar-nav">
                <ul class="metismenu ci-effect-1">
                    <li class="g_heading">Directories</li>
                    <li class= "{{  $active == "Dashboard" ? 'active' : '' }}">
                        <a href="#" class="has-arrow arrow-b" ><i class="icon-home"></i><span data-hover="Dashboard">Dashboard</span></a>
                        <!--<ul>
                            <li class=""><a href="index.html"><span data-hover="Web Analytics">Web Analytics</span></a></li>
                            <li><a href="index2.html"><span data-hover="Cryptocurrency">Cryptocurrency</span></a></li>
                            <li><a href="index3.html"><span data-hover="Sales Monitoring">Sales Monitoring</span></a></li>
                            <li><a href="index4.html"><span data-hover="eCommerce Analytics">eCommerce Analytics</span></a></li>
                            <li><a href="app-social.html"><span data-hover="Campaigns">Campaigns</span></a></li>
                        </ul>-->
                    </li>
                    <li class= "{{  $active == "Collection" ? 'active' : '' }}"><a href="/collection"><i class="icon-star"></i><span data-hover="Collection"> Collection </span></a></li>
                    <li class= "{{  $active == "About" ? 'active' : '' }}"><a href="/about" ><i class="icon-speech"></i><span data-hover="About">About</span></a></li>
                    <li class= "{{  $active == "Partenariat" ? 'active' : '' }}"><a href="/logo"><i class="icon-people"></i><span data-hover="Partenariat ">Partenariat </span></a></li>
                    <li class= "{{  $active == "Hotspot" ? 'active' : '' }}"><a href="/hotspot"><i class="icon-equalizer"></i><span data-hover="hotspot"> hotspot </span></a></li>
                    <li class= "{{  $active == "Instagram" ? 'active' : '' }}"><a href="/insta"><i class="icon-social-instagram"></i><span data-hover="Instagram"> Instagram </span></a></li>
                    <li class="g_heading">Tables</li>

                    <li class= "{{  $active == "Product" ? 'active' : '' }}">
                        <a href="/product" ><i class="icon-basket-loaded"></i><span data-hover="Products">Products</span></a>

                    </li>
                    <li class= "{{  $active == "Category" ? 'active' : '' }}">
                        <a href="/category" ><i class="icon-tag"></i><span data-hover="Categories">Categories</span></a>
                    </li>
                    <li class= "{{  $active == "Reference" ? 'active' : '' }}">
                        <a href="/reference"><i class="icon-picture"></i><span data-hover="Reference"> Reference </span></a>
                    </li>

                </ul>
            </nav>
        </div>

        <div class="tab-pane fade" id="setting-tab">
            <div class="mb-4 mt-3">
                <h6 class="font-14 font-weight-bold text-muted">Font Style</h6>
                <div class="custom-controls-stacked font_setting">
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="font" value="font-opensans" checked="">
                        <span class="custom-control-label">Open Sans Font</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="font" value="font-montserrat">
                        <span class="custom-control-label">Montserrat Google Font</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="font" value="font-poppins">
                        <span class="custom-control-label">Poppins Google Font</span>
                    </label>
                </div>
            </div>
            <div class="mb-4">
                <h6 class="font-14 font-weight-bold text-muted">Dropdown Menu Icon</h6>
                <div class="custom-controls-stacked arrow_option">
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="marrow" value="arrow-a" checked="">
                        <span class="custom-control-label">A</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="marrow" value="arrow-b">
                        <span class="custom-control-label">B</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="marrow" value="arrow-c">
                        <span class="custom-control-label">C</span>
                    </label>
                </div>
                <h6 class="font-14 font-weight-bold mt-4 text-muted">SubMenu List Icon</h6>
                <div class="custom-controls-stacked list_option">
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="listicon" value="list-a" checked="">
                        <span class="custom-control-label">A</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="listicon" value="list-b">
                        <span class="custom-control-label">B</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="listicon" value="list-c">
                        <span class="custom-control-label">C</span>
                    </label>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    function setStyleSheet(url){
        var stylesheet = document.getElementById("stylesheet");
        stylesheet.setAttribute('href', url);
    }
</script>
