<!DOCTYPE html>
<html lang="pt-br">
	<head>
		@include('layout.main.head')
	</head>
	<body>
		<header>
			@include('layout.main.header-navbar')
			@include('layout.main.header-logo')
		</header>

		<main class="container">
			<span class="dynamic-messages-section"></span>
			@yield('content')
		</main>

		<footer>
			@include('layout.main.footer')
		</footer>

		<script type="text/javascript" src="{{ asset('/js/plugins.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/js/all.js') }}"></script>

	</body>
</html>
