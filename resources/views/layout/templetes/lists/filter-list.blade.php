@extends('layout.templates.lists.basic-list')

<?php $filterHeader = isset($filterHeader) ? $filterHeader : "Filtrar" ?>
@section('before-table')
	@section('before-filter') @show

	<div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <form action="@yield("filter-action-url")" method="GET">
                <div class="panel panel-default">
                    <div class="panel-heading panel-canoastec-heading">
                        <h3 class="panel-title panel-canoastec-title">{{ $filterHeader }}</h3>
                    </div>
                    <div class="panel-body">
                        @yield('filter-content')

                        <div class="row btn-m-bot">
                            <div class="col-md-12">
                                <div class="pull-right">
									@yield('filter-other-buttons')
                                    <a href="@yield("filter-action-url")" class="btn btn-default btn-m-r">
										<i class="fa fa-eraser" aria-hidden="true"></i> Limpar
									</a>
                                    <button id="search" type="submit" class="btn btn-primary">
										<i class="fa fa-search" aria-hidden="true"></i> Buscar
									</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

	@section("after-filter") @show
@stop
