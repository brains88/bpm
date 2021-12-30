<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- COMPULSORY META TAGS -->
        <meta charset="utf-8">
        <meta name="_token" content="{{ csrf_token() }}" />
        <meta http-equiv='cache-control' content='no-cache'>
        <meta http-equiv='expires' content='0'>
        <meta http-equiv='pragma' content='no-cache'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="keywords" content="Buy, Sell, Shop, Explore products and services, properties, Advertize, Lands, Houses, Rent, Lease" />
        <meta name="image" content="/images/logos/logo.png" />

        <meta name="og:site_name" content="Geohomes Services Limited" />
        <meta name="og:locale" content="en_US" />
        <meta name="article:section" content="Buy, Sell, Shop, Explore products and services, properties, Advertize, Lands, Houses, Rent, Lease" />
        <meta name="description" content="Buy, Sell, Shop, Explore products and services, properties, Advertize, Lands, Houses, Rent, Lease" />

        <meta name="framework" content="Redux 4.3.3">
        <meta name='robots' content='max-image-preview:large'>
        <link rel='dns-prefetch' href='bpm-content/maps/index.htm'>
        <link rel='dns-prefetch' href='//fonts.googleapis.com'>
        <link href='https://fonts.gstatic.com' crossorigin="" rel='preconnect'>

        <link rel="stylesheet" type="text/css" href="bpm-content/uploads/new/bpmStyle.css" id='bestpropertymarket-addons-inline-css'>
        <link href="bpm-content/uploads/new/bpmsite.css" type="text/css" rel="stylesheet"/>

        <script type='text/javascript' src='assets/js/jquery/jquery.min.js' id='jquery-core-js'></script>
        <link rel="https://api.w.org/" href="assets/json/index.htm.json">
        <link rel="EditURI" type="application/rsd+xml" title="RSD" href="../xmlrpc.php.xml?rsd">
        <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="public/assets/wlwmanifest.xml">

        <!-- Facebook Open Graph -->
        <meta property="og:image" content="/images/logos/logo.png" />
        <meta property="og:url" content="https://geohomesgroup.com//" />
        <meta property="og:type" content="Real Estate" />
        <meta property="og:title" content="Geohomes Services Limited" />
        <meta property="og:description" content="Buy, Sell, Shop, Explore products and services, properties, Advertize, Lands, Houses, Rent, Lease" />

        <!--Twitter Share-->
        <meta name="twitter:image:src" content="/images/logos/logo.png" />
        <meta property="twitter:image" content="/images/logos/logo.png" />
        <meta property="twitter:title" content="Geohomes Services Limited" />
        <meta property="twitter:card" content="summary_large_card" />
        <meta property="twitter:site" content="https://geohomesgroup.com/" />
        <meta property="twitter:site_name" content="Geohomes Services Limited"/>
        <meta property="twitter:description" content="Buy, Sell, Shop, Explore products and services, properties, Advertize, Lands, Houses, Rent, Lease" />

        <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
        <link rel="manifest" href="/favicon/site.webmanifest">
        <!-- SITE TITLE -->
        <title>{{ $title ?? config('app.name') }}</title>
        {{-- Google fonts --}}
        @if(env('APP_ENV') === 'production')
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Crimson+Pro">
        @endif
        <!-- Bootstrap CSS CDN -->
        <!-- <link rel="stylesheet" type="text/css" href="/bootstrap/bootstrap.min.css"> -->
        <!-- utility CSS -->
        <!-- <link rel="stylesheet" type="text/css" href="/css/utility.css"> -->
        <!-- index CSS -->
        <!-- <link rel="stylesheet" type="text/css" href="/css/index.css"> -->
        <!-- Auth processing CSS -->
        <!-- <link rel="stylesheet" type="text/css" href="/css/auth.css"> -->
        <!-- ico font css -->
        <!-- <link rel="stylesheet" type="text/css" href="/icofont/icofont.min.css"> -->
        <!-- fontawesome css -->
        <!-- <link rel="stylesheet" type="text/css" href="/fontawesome/css/all.min.css"> -->
        <!-- summernote CSS -->
        <!-- <link rel="stylesheet" type="text/css" href="/summernote/summernote-lite.min.css"> -->
    </head>
    <body class="page-template page-template-home-page page-template-home-page-php page page-id-6808 wp-custom-logo bestpropertymarket-has-addons ehf-footer ehf-template-bestpropertymarket ehf-stylesheet-bestpropertymarket body-bestpropertymarket folio-archive- elementor-default elementor-kit-7175 elementor-page elementor-page-6808">
    <!--loader-->
    <div class="loader-wrap">
    <div class="loader-inner"> 
    <svg> 
    <defs> 
    <filter id="goo">
    <fegaussianblur in="SourceGraphic" stddeviation="2" result="blur"></fegaussianblur>
    <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 5 -2" result="gooey"></fecolormatrix>
    <fecomposite in="SourceGraphic" in2="gooey" operator="atop"></fecomposite> 
    </filter>
    </defs>
    </svg>
    </div>
    </div> 
    <!--loader end-->
    <div id="main-theme">