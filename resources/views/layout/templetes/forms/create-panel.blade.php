@extends('layout.templates.panels.simple-panel')

@section('before-panel')
	<div class="row">
		<div class="col-md-12 text-right">
			<label class="required-text small">Campos com <span class="bullet-red">*</span> são obrigatórios.</label>
		</div>
	</div>

	@yield('form-open')
@stop

@section('after-panel')
	@section('form-buttons')
		<div class="pull-right">
			<?php if(!isset($returnTo)) throw new \Exception('You should pass a variable called "returnTo" to this template') ?>
			<a href="{{ $returnTo }}" class="btn btn-default">
				<i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
			</a>

			{{ Form::button('<i class="fa fa-check" aria-hidden="true"></i> Salvar',
			[
				'class'=>'btn btn-primary',
				'type'=>'submit',
				'id' => 'save'])
			}}
		</div>
	@show

	@yield('form-close')
@stop
