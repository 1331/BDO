@extends('layout.default')

<?php
	if(!isset($tableClass)) $tableClass = "table-bordered table-hover table-canoastec";
	if(!isset($collection)) throw new \Exception("You should pass a variable called 'collection' to this Template");
?>

@section('content')
    {{--
        If no "infoMessage" has been passed by the view,
        the default message will be shown: 'A busca não retornou resultado.'.
    --}}
    @if(!isset($infoMessage) && $collection->count() == 0)
        @php $infoMessage = 'A busca não retornou resultado.'; @endphp
    @elseif($collection->count() > 0)
        @php $infoMessage = ''; @endphp
    @endif

    @include('layout.templates.messages.success')
    @include('layout.templates.messages.error')
    @include('layout.templates.messages.info', ['infoMessage' => $infoMessage])
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

    @endif
@stop
