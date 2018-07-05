@extends('layout.public')

@section("content")
	@include('layout.templates.messages.success')
	@include('layout.templates.messages.errors')
	@include('layout.templates.messages.error')

	<style>
		.vdp-datepicker__calendar{
			width: 100% !important;
		}
	</style>

	<div class="panel panel-default" id="publications_panel" v-cloak>
        <div class="panel-body">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group text-center">
						<edition-date-selector @diary="selectDiary" id="publication_date" name="publication_date" :inline="true"></edition-date-selector>
					</div>
					<h5 v-if="hasDiary() && diary.editions.length > 1" class="text-center"><strong>Selecione a edição</strong></h5>
					<div v-if="hasDiary()" style="max-height: 250px; margin-bottom: 5px; overflow-y:auto;">
						<ul class="list-group">
							<li v-for="edition in diary.editions"
								style="cursor: pointer;"
								class="list-group-item text-primary"
								:class="{'edition-selected' : isSelected(edition)}"
								@click="selectEdition(edition)">
									@{{ edition.title }}
							</li>
						</ul>
					</div>
				</div>

				<div class="col-md-9" v-if="hasDiary()">
					<div class="row">
						<div class="col-md-12 form-inline">
							<select v-model="currentIndex" class="select-publication-index">
								<option v-for="index in edition.index" :value="index">@{{ index.publication_title }} - Página @{{ index.page_start }} a @{{ index.page_end }}</option>
							</select>
							<button @click="downloadPublication()" class="btn-download-publication" type="button">
								<i class="fa fa-download" aria-hidden="true"></i> Publicação
							</button>
							<button @click="downloadEdition()" class="btn-download-edition" type="button">
								<i class="fa fa-download" aria-hidden="true"></i> Edição
							</button>
						</div>
					</div>

					<h4 class="text-center">Diário oficial - @{{ edition.title }} - @{{ getDiaryDayFormat() }}</h4>

					<div class="row margin-top10">
						<div class="col-md-12">
							<pdf-viewer :src="pdf" :page="currentPage" @pagechanged="setCurrentPage"></pdf-viewer>
						</div>
					</div>
				</div>

				<div class="col-md-9 text-center" v-else="hasDiary()">
					<div class="alert alert-info"> <strong> @{{ message }} </strong> </div>

					<div class="alert alert-warning" v-if="showOldPublicationsMessage">
						Publicações realizadas até <strong>@{{ dataInicioDiarioOficial }}</strong> estão disponíveis aqui: <strong><a target="_blank" href="http://sistemas.canoas.rs.gov.br/gt/publico/dof">Publicações anteriores</a></strong>
					</div>
				</div>
			</div>


		</div>
    </div>
@endsection

@push("final-scripts")
	<script type="text/javascript" src="{{ asset(mix('/js/pdf.js', null)) }}"></script>
@endpush

@push("final-scripts")
	<script type="text/javascript">
		new Vue({
			el: "#publications_panel",
			data: {
				diary: null,
				edition: null,
				message: 'Selecione a data da edição',
				pdf: null,
				currentIndex: null,
				currentPage: 1,
				showOldPublicationsMessage: false,
				dataInicioDiarioOficial: window.dataInicioDiarioOficial.toLocaleDateString()
			},
			methods: {
				setCurrentPage: function(page){
					this.currentPage = page;

					if(!this.edition) return;

					for (var i in this.edition.index) {
						if(this.verifyIndex(this.currentPage, this.edition.index[i]))
							this.currentIndex = this.edition.index[i];
					}
				},
				verifyIndex: function(page, index){
					return page >= index.page_start && page <= index.page_end;
				},
				hasDiary: function(){
					return this.diary != null && !$.isEmptyObject(this.diary);
				},
				getDiaryDayFormat: function(){
					return this.diary.day.replace(/-/g, '/');
				},
				selectDiary: function(diary){
					if($.isEmptyObject(this.diary)){
						this.message = "Não existe nenhuma publicação realizada neste dia"
						this.showOldPublicationsMessage = true;
					}
					this.diary = diary;
					(this.hasDiary()) ? this.selectEdition(diary.editions[0]) : null;
				},
				selectEdition: function(edition){
					this.edition = edition;
					this.pdf = laroute.route("api.editionFile", { editionId : edition.id });
				},
				isSelected: function(edition){
					return this.edition == edition;
				},
				downloadEdition: function(){
					window.open(laroute.route("api.editionFile", { editionId : this.edition.id }));
				},
				downloadPublication: function(){
					if(this.currentIndex.publication_id != undefined){
						window.open(laroute.route("api.publicationFile", { publicationId : this.currentIndex.publication_id }));
					}
				}
			},
			watch:{
				edition: function(){
					if(this.edition.index.length > 0)
						this.currentIndex = this.edition.index[0];
					else
						this.currentIndex = null;
				},
				currentIndex: function(){
					if(this.currentIndex){
						if(!this.verifyIndex(this.currentPage, this.currentIndex))
							this.currentPage = this.currentIndex.page_start;
					}
				}
			}
		});
	</script>
@endpush
