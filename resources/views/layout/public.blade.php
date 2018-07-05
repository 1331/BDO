<!DOCTYPE html>
<html lang="pt-br">
<head>
    @include('layout.main.head')
</head>
<body>
<header>
    <style>
        html {
            position: relative;
            min-height: 100%;
        }

        footer {
            position: absolute;
            bottom: 0px;
            width: 100%;
        }

        .affix {
            top: 0;
            width: 100%;
            z-index: 998 !important;
            background: #119D93 !important;
        }

        .affix.navbar-default .navbar-nav > li > a, .public-menu .navbar-default .navbar-nav > li > a {
            color: #FFFFFF;
        }

        .affix.navbar-default .navbar-nav > .active > a, .public-menu .navbar-default .navbar-nav > .active > a {
            background-color: #007071;
        }

        .affix.navbar-default .navbar-nav > li > a:hover, .public-menu .navbar-default .navbar-nav > li > a:hover {
            color: #E0EEEE;
        }

        .affix.navbar-default .navbar-brand, .public-menu .navbar-default .navbar-brand {
            color: #FFF;
        }

        .affix.navbar-default .navbar-brand:hover, .public-menu .navbar-default .navbar-brand:hover {
            color: #E0EEEE;
        }

        .affix + .container-fluid {
            padding-top: 70px;
        }

        .public-menu .navbar {
            background: #119D93;
            border-color: #2E8B57;
            -webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
            box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
        }

        .navbar-default .navbar-toggle {
            background: #F5F5F5;
        }
    </style>
    <div class="public-menu">
        @include('layout.main.header-public')
    </div>
</header>

<main>
    <div class="container margin-top10">
        @yield('content')
    </div>
</main>

<footer>
    @include('layout.main.footer')
</footer>

@stack('start-scripts')
<script type="text/javascript" src="{{ asset(mix('/js/plugins.js', null)) }}"></script>
<script type="text/javascript" src="{{ asset(mix('/js/all.js', null)) }}"></script>
@stack('final-scripts')

</body>
</html>
