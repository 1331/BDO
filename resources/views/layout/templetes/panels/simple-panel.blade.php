@extends('layout.default')

@section('content')

	@include('layout.templates.messages.success')
	@include('layout.templates.messages.error')
	@include('layout.templates.messages.errors')
	@include('layout.templates.messages.info')

	@section('before-panel') @show

	<div class="panel panel-default panel-canoastec">
		<div class="panel-heading panel-canoastec-heading">
			<h3 class="panel-title">@yield('panel-description')</h3>
		</div>
		<div class="panel-body">
			@yield('panel-content')

			@section('end-panel') @show
		</div>
	</div>

	@section('after-panel') @show

@stop
