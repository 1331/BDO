<div class="container">
    <div class="row">
        <div class="col-md-6 text-xs-center text-sm-center padding-top10">
            <img src="{{ asset('/images/brasao_prefeitura.png') }}" title='Brasão da Prefeitura de Canoas' alt="Brasão da Prefeitura de Canoas"
                 class="text-xs-center hidden-sm hidden-xs" style="width: 250px;">
            <img src="{{ asset('/images/brasao.png') }}" title='Brasão da Prefeitura de Canoas' alt="Brasão da Prefeitura de Canoas"
                 class="text-xs-center hidden-lg hidden-md" style="width: 90px;">
        </div>
        <div class="col-md-6 text-right text-xs-center text-sm-center">
            <div class="padding-bottom5" style="color: #006B85;">
                <strong class="font90 hidden-xs hidden-sm">DOMC</strong>
                <p class="font35">Diário Oficial do Município de Canoas</p>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('public.index') }}"><i class="fa fa-home" aria-hidden="true"></i>Início</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ (Request::route()->getName() == 'public.publications-by-date') ? 'active' : '' }}">
                    <a href="{{ route('public.publications-by-date') }}"><i class="fa fa-calendar" aria-hidden="true"></i>Ver publicações por data <span class="sr-only">(current)</span></a>
                </li>
                <li class="{{ (Request::route()->getName() == 'public.search') ? 'active' : '' }}">
                    <a href="{{ route('public.search') }}"><i class="fa fa-search" aria-hidden="true"></i>Pesquisar</a>
                </li>
                <li class="{{ (Request::route()->getName() == 'public.certify-file-integrity') ? 'active' : '' }}">
                    <a href="{{ route('public.certify-file-integrity') }}"><i class="fa fa-check" aria-hidden="true"></i>Certificar integridade de arquivos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
