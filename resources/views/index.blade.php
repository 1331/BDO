@extends('layout.default')

@section('breadcrumb')
	{!! Breadcrumbs::render('home') !!}
@stop

@section('content')
	@include('layout.templates.messages.info', ['infoMessage' => 'Página inicial DOMC'])
@stop

@push('final-scripts')
	{{-- Aqui vão os arquivos javascript --}}
@endpush


