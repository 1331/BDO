<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="javascript:void(0)">
                <img alt="Brand" class="icon" src="{{ asset('/images/canoastec_icon.png') }}">
            </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-default" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand titulo-sistema" href="{{ url('/') }}">{{ env('APP_NAME') }}</a>
        </div>

        <div class="collapse navbar-collapse" id="menu-default">
            <ul class="nav navbar-nav">
                @include('layout.templates.menus.default', ['items'=> Menu::get('nav')])
            </ul>

            <ul class="nav navbar-nav pull-right">
                @include('layout.templates.menus.default', ['items'=> Menu::get('logout')])
            </ul>
        </div>
    </div>
</nav>
