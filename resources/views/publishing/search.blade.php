@extends('layout.public')

@section("content")
    @include('layout.templates.messages.error')
    @include('layout.templates.messages.errors')

    <style>
        .pdf-viewer-pdf-container {
            height: 80vh;
        }
        .pdf-viewer-loading {
            top: 63px !important;
        }
    </style>

    <span id="search_publications" v-cloak>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title text-center">Buscar publicações</h3>
            </div>
            <div class="panel-body">
                {!! Form::open(['method' => 'GET']) !!}
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Data de publicação</label>
                                <date v-model="publicationDate" name="publication_date"></date>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tipo de publicação</label>
                                {!! Form::select('publication_type', $publicationTypesComposer, request()->publication_type , ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Título</label>
                                <input class="form-control" name="title" type="text" placeholder="Título da publicação" value="{{ request()->title }}"/>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Conteúdo</label>
                                <input class="form-control" name="content" type="text" value="{{ request()->content }}" placeholder="Conteúdo presente no arquivo de uma publicação ou edição"/>
                            </div>
                        </div>
                    </div>

                    <div class="row btn-m-bot">
                        <div class="col-md-12">
                            <div class="pull-right">
                                <a href="{{ route('public.search') }}" class="btn btn-default btn-m-r">
                                    <i class="fa fa-eraser" aria-hidden="true"></i> Limpar
                                </a>
                                <button id="search" type="submit" class="btn btn-primary btn-loading">
                                    <i class="fa fa-search" aria-hidden="true"></i> Buscar
                                </button>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>

        <modal name="publication" :adaptive="true" width="95%" height="auto">
            <div class="row" style="padding: 10px; background-color: #f8f8f8;">
                <div class="col-md-10 col-sm-10 col-xs-10">
                    <button @click="downloadPublication()" class="btn btn-primary btn-sm" type="button">
                        <i class="fa fa-download" aria-hidden="true"></i> Publicação
                    </button>
                    <button @click="downloadEdition()" class="btn btn-primary btn-sm" type="button">
                        <i class="fa fa-download" aria-hidden="true"></i> Edição
                    </button>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2 text-right">
                    <i @click="$modal.hide('publication')" class="fa fa-2x fa-close" style="cursor: pointer"></i>
                </div>
            </div>
            <pdf-viewer :src="src" :page="page"></pdf-viewer>
        </modal>

        @include('layout.templates.messages.info')

        @if($pages->isNotEmpty())
            @include('layout.templates.paginators.default', ['collection' => $pages])

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="10%">Data</th>
                            <th width="50%">Título da Publicação</th>
                            <th width="20%">Edição</th>
                            <th width="5%">Página</th>
                            <th class="text-center" width="10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pages as $page)
                            <tr>
                                <td>{{ $page->getPublication()->getPublicationDate()->format('d/m/Y') }}</td>
                                <td>{{ $page->getPublication()->getTitle() }}</td>
                                <td>{{ $page->getEdition()->getTitle() }}</td>
                                <td>{{ $page->getPage() }}</td>
                                <td class="text-center">
                                    <button
                                        @click="setPage({{ $page->getEdition()->getId() }}, {{ $page->getPublication()->getId() }}, {{ $page->getPage() }})"
                                        class="btn btn-primary btn-sm"
                                    >Acessar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </span>
@stop

@push("final-scripts")
	<script type="text/javascript" src="{{ asset(mix('/js/pdf.js', null)) }}"></script>
@endpush

@push('final-scripts')
    <script type="text/javascript">
        new Vue({
            el: "#search_publications",
            data: {
                publicationDate: '{!! request()->publication_date !!}',
                src: null,
                publicationId: null,
                editionId: null,
                page: 1
            },
            methods: {
                setPage: function(edition, publication, page){
                    this.src = laroute.route('api.editionFile', {'editionId': edition});
                    this.editionId = edition;
                    this.publicationId = publication;
                    this.page = parseInt(page);
                    this.$modal.show('publication');
                },
                downloadEdition: function(){
                    window.open(laroute.route("api.editionFile", { editionId : this.editionId }));
                },
                downloadPublication: function(){
					window.open(laroute.route("api.publicationFile", { publicationId : this.publicationId }));
                }
            }
        })
    </script>
@endpush
