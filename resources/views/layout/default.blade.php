<!DOCTYPE html>
<html lang="pt-br">
	<head>
		@include('layout.main.head')
	</head>
	<body>
		<header>
			@include('layout.main.header-navbar')
		</header>

		<main class="container">
			<div style="margin-top:15px">
				@yield('breadcrumb')
			</div>
			<span class="dynamic-messages-section"></span>
			<div id="container">
				@yield('content')
			</div>
		</main>

		<br><br>

		<footer>
			@include('layout.main.footer')
		</footer>

		@stack('start-scripts')
		<script type="text/javascript" src="{{ asset(mix('/js/plugins.js', null)) }}"></script>
		<script type="text/javascript" src="{{ asset(mix('/js/all.js', null)) }}"></script>
		@stack('final-scripts')

	</body>
</html>
