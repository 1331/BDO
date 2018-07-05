@extends('layout.default')

<?php
	if(!isset($tableClass)) $tableClass = "table-bordered table-hover table-canoastec";
    if(!isset($collection)) throw new \Exception("You should pass a variable called 'collection' to this Template");
    if(!isset($notfound)) throw new \Exception("You should pass a not found message to this Template");
?>

@section('content')

	@include('layout.templates.messages.success')
    @include('layout.templates.messages.error')
    @include('layout.templates.messages.errors', ['errors' => $errors])

	@section('before-table') @show

    @if($collection->count() > 0)
        <div class="table-responsive">
            <table @if(isset($tableId)) id="{{ $tableId }}" @endif class="table {{ $tableClass }}">
                <thead>
                    @yield('table-header')
                </thead>
                <tbody>
                    @yield('table-content')
                </tbody>
            </table>
        </div>

        @include('layout.templates.paginators.default', ['collection' => $collection])
    @else
        <div id="no_results_found" class="alert alert-info text-center">{{ $notfound }} </div>
    @endif
@stop
