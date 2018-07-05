{{--
    For include this you need to specify the following:
        type ('submit','confirm', 'empty')
        size(sm,md,lg)
        id ('modal id')
        title (modal title)
        body (you can pass view('name-of-view') to pass or just text)
    Example:
    @include("layout.templates.modal", ['type' => 'submit','id' => 'modal', 'title' => 'Título', 'body' => ''])
--}}
<?php
    $title = isset($title) ? $title : $title = '';
    $body = isset($body) ? $body : $body = '';
    $type = isset($type) ? $type : $type = 'submit';
    $size = isset($size) ? 'modal-' . $size : null;
    $onEvent = isset($onEvent) ? $onEvent : $ref = null;
    $idTitleModal = isset($idTitleModal) ? $idTitleModal : $idTitleModal = '';
?>

<div id="{{ $id }}" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog {{ $size }}" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="closeX" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 id="{{ $idTitleModal }}" class="modal-title">{{ $title }}</h4>
            </div>
            <div class="modal-body">
                {!! $body !!}
            </div>
            @if($type != 'empty')
                <div class="modal-footer">
                    @if($type == 'submit')
                        <button id="btn_close_modal" type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary btn-loading">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            Salvar
                        </button>
                    @endif

                    @if($type == 'confirm')
                        <a id="btn_close_modal" class="btn btn-default btn-close" data-dismiss="modal">Não</a>
                        <a class="btn btn-primary btn-confirm" data-event="{{ $onEvent }}" data-dismiss="modal">Sim</a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
