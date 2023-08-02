@props(['active' ])
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <!-- Bootstrap Core and vandor -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/bootstrap/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/bootstrap/dist/css/bootstrap.css.map')}}">

    <!-- Plugins css -->
    {{ $styles }}

    <!-- Core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" type="text/css" id="stylesheet" href="{{asset('assets/css/theme1.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/multi-select/css/multi-select.css')}}">


    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('assets/css/feathericon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/simple-line-icons.css')}}">
    <link rel="stylesheet"  type='text/css' href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css">
</head>
<body class="font-opensans">



<x-admin.side-bar :active=$active />


<div id="main_content">

    <div class="page">

        <!-- start body header -->
        <div id="page_top" class="section-body">
            <div class="container-fluid">
    <x-admin.header :title=$active />



@if (session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="alert-info fixed bg-blue-500  py-2 px-4 rounded-xl bottom-3 right-3 text-sm"
    >
        <p  >{{ Session::get('success') }}</p>
    </div>
@endif

<br>

{{$slot}}
</div>
        </div>
    </div>
</div>


<!-- jQuery and bootstrtap js -->
<script src="{{asset('assets/bundles/lib.vendor.bundle.js')}}"></script>

<!-- start plugin js file  -->
<script src="{{asset('assets/bundles/apexcharts.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/counterup.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/knobjs.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/c3.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/flot.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/jvectormap1.bundle.js')}}"></script>


<!-- Start core js and page js -->
<script src="{{asset('assets/js/core.js')}}"></script>
<script src="{{asset('assets/js/page/index.js')}}"></script>

<script src="{{asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('assets/js/form/form-advanced.js')}}"></script>
<script src="{{asset('assets/plugins/multi-select/js/jquery.multi-select.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>

{{$scripts}}
</body>
</html>
