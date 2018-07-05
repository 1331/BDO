<html xmlns='http://www.w3.org/1999/xhtml'
      xmlns:og='http://ogp.me/ns#'>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta name="description" content="A Prefeitura Municipal de Canoas, através da Secretaria Municipal de Desenvolvimento Econômico e da Diretoria de Emprego, Trabalho, Renda e Formação Profissional apresenta, o Banco de oportunidades."/>
        <meta name="application-name" content="Banco de Oportunidades"/>
        <meta name="author" content="Prefeitura de Canoas">
        <meta name="keywords" content="Banco de Oportunidades, Prefeitura de Canoas, CanoasTec, Vagas, Empregos, Oportunidade, Cidadão, Empresa, curriculo"/>

        <meta property='og:title' content='Banco de Oportunidades' />
        <meta property='og:type' content='website' />
        <meta property='og:url' content='http://sistemas.canoas.rs.gov.br/bancodeoportunidades/' />
        <meta property='og:image' content='http://sistemas.canoas.rs.gov.br/bancodeoportunidades/publico/imagens/new_logo_bdo.png'/>
        <meta property='og:site_name' content='Banco de Oportunidades' />
        <meta property='og:description' content='A Prefeitura Municipal de Canoas, através da Secretaria Municipal de Desenvolvimento Econômico e da Diretoria de Emprego, Trabalho, Renda e Formação Profissional apresenta, o Banco de oportunidades.' />

		<link rel="stylesheet" type="text/css" href="{!! ('/css/style.css')!!}" >
        <link rel="stylesheet" type="text/css" href="{!! ('/css/jquery.tabs.css')!!}" media="print, projection, screen">
        <link rel="stylesheet" type="text/css" href="{!! ('/css/jquery.tabs-ie.css')!!}" media="projection, screen">
        <link rel="stylesheet" type="text/css" href="{!! ('/css/font-awesome.css')!!}">
        <link rel="stylesheet" type="text/css" href="{!! ('/css/app.css')!!}">
        <link rel="stylesheet" type="text/css" href="{!! ('/css/style_first.css')!!}">
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>

		<script type="text/javascript" src="{!! asset('/publico/js/jquery-1.2.1.pack.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/js/jquery.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/js/jquery.maskedinput.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/js/funcoes.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/js/jquery-1.3.2.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/js/jquery.history_remote.pack.js')!!}"></script>
        <script type="text/javascript" src="{!! asset('/js/jquery.tabs.pack.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/js/start.effect.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/js/clonacampo.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/js/custom-form-elements.js') !!}"></script>
		<script>

		    var $JQuery = jQuery.noConflict();

            window.onload = function() {
                scrollDiv_init();
              };
              ScrollRate = 20;
              function scrollDiv_init() {
                DivElmnt = document.getElementById('scroll');
                DivElmnt.onmouseover = pauseDiv;
                DivElmnt.onmouseout = resumeDiv;
                ReachedMaxScroll = false;
                DivElmnt.scrollTop = 0;
                PreviousScrollTop  = 0;
                ScrollInterval = setInterval('scrollDiv()', ScrollRate);
              }
              function scrollDiv() {
                if (!ReachedMaxScroll) {
                  DivElmnt.scrollTop = PreviousScrollTop;
                  PreviousScrollTop++;
                  ReachedMaxScroll = DivElmnt.scrollTop >= (DivElmnt.scrollHeight - DivElmnt.offsetHeight);
                }
                else {
                  DivElmnt.scrollTop = PreviousScrollTop = 0;
                  ReachedMaxScroll = false;

                  ReachedMaxScroll = (DivElmnt.scrollTop == 0)?false:true;
                  DivElmnt.scrollTop = PreviousScrollTop;
                  PreviousScrollTop--;
                }
              }
              function pauseDiv() {
                clearInterval(ScrollInterval);
              }
              function resumeDiv() {
                PreviousScrollTop = DivElmnt.scrollTop;
                ScrollInterval = setInterval('scrollDiv()', ScrollRate);
              }
        </script>

        <title>Banco de Oportunidades</title>
</head>
