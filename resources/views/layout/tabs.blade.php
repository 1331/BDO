@extends('layout.default')

@section('content')
    <div class="tabs-default">
        <ul class="nav nav-tabs" role="tablist">
            @yield('tab-declarations')
        </ul>
	</div>

	@yield('form-open')
		<div class="tab-content">
	        @yield('tab-content')
		</div>
	@yield('form-close')
@stop