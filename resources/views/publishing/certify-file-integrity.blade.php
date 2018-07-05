@extends('layout.public')

@section("content")
	@include('layout.templates.messages.success')
	@include('layout.templates.messages.errors')
	@include('layout.templates.messages.error')

	<div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title text-center">Certificar integridade de arquivos</h3>
        </div>
        <div class="panel-body">
            <p>
				<strong>Este procedimento certifica a autenticidade e a integridade de um arquivo, verificando se sua origem e seu conteúdo correspondem a um documento publicado neste Diário Oficial.</strong>
			</p>

			{!! Form::open(['route' => 'public.validate-file-integrity', 'files' => true]) !!}
				{!! Form::file('file', ['id' => 'file_validated']) !!}
				<br>
				<div class="text-right">
					<button type="submit" class="btn btn-primary btn-loading disabled">
						<i class="fa fa-check" aria-hidden="true"></i> Verificar Arquivo
					</button>
				</div>
			{!! Form::close() !!}
		</div>
    </div>
@endsection

@push('final-scripts')
	<script type="text/javascript">
		$('#file_validated').change(function() {
			if($(this).val() == '')
				$(".btn-primary").addClass("disabled");
			else
				$(".btn-primary").removeClass("disabled");
		});
	</script>
@endpush
