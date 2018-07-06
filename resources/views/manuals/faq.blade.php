@extends('layout.main.head')
<body>
	<div id="corpo">
		<div id="conteudo">
			<div class="title">
				<h2>
					<i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
					Perguntas Frequentes
				</h2>
			</div>
			 @foreach($CommonQuestions as $questions)
				 <div class="caption">
	                 <h1>
	                     {{ $questions->getQuestion() }}
	                 </h1>
	                 <p>
	                     {{ $questions->getAnswer() }}
	                 </p>
	             </div>
			@endforeach
			<div class="width100 margin-bottom-20">
				<a href="{{ route('publishing.index')  }}" class="div-box div-box-hover pull-right margin-top-5 link-default margin-right-5 font-blue01">
					<i class="fa fa-arrow-circle-left fa-2x margin-right-5" aria-hidden="true"></i>
					Voltar
				</a>
				<br><br>
			</div>
		</div>
	</div>
@extends('layout.main.footer')
