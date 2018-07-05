@extends('layout.main.head')
<body>
	<div id="corpo">
		<div class="width100 menu-logo">
			<img class="pull-left margin-left-20 margin-top-20" alt="Brasão da Prefeitura" src="{{ asset('/img/brasao_prefeitura.png')}}" style="width: 210px;">
			<img class="pull-right" alt="Banco de Oportunidades" src="{{ asset('/img/logo_banco.png')}}" style="width: 230px;">
		</div>
		<div id="conteudo">
			<div id="tudo">
				<div id="content">
					<div style="width: 100%;">
						<div class="div-icones-index">
							<i class="fa fa-building-o fa-4x" aria-hidden="true" title="Empresas Cadastradas"></i>
							{{-- {{  }} --}}
						</div>
						<div class="div-icones-index">
							<i class="fa fa-id-card-o fa-4x" aria-hidden="true" title="Total de curr�culos Cadastrados"></i>
						</div>
						<div class="div-icones-index">
							<a href="#vagas" class="link-default font-blue01"><i class="fa fa-users fa-4x" aria-hidden="true" title="Total de Vagas Cadastradas"></i></a>
						</div>
						<div class="div-icones-index">
							<i class="fa fa-eye fa-4x" aria-hidden="true" title="Visitas"></i>
						</div>
					</div>

					<div class="width100">
						<div class="btn-cadastro-index">
							<a href="./publico/visao/GuiCadCandidato.php" class="div-box div-box-hover link-default">
								<i class="fa fa-plus-circle fa-2x margin-right-5" aria-hidden="true"></i>
								Cadastre seu currículo
							</a>
						</div>
						<div class="btn-cadastro-index">
							<a href="./publico/visao/GuiCadEmpresa.php" class="div-box div-box-hover link-default">
								<i class="fa fa-plus-circle fa-2x margin-right-5" aria-hidden="true"></i>
								Cadastre sua empresa
							</a>
						</div>
					</div>

					<div class="login-index-area">
						<fieldset class="fieldset-index">
							<legend><i class="fa fa-user margin-right-5" aria-hidden="true"></i>LOGIN DE CANDIDATOS</legend>
							<form name="loginCandidato" id="loginCandidato" method="post" action="./publico/controle/ControleCandidato.php?op=logar" >
								<table class="table-login-index">
									<tr>
										<td>Login:</td>
										<td>
											<input name="login" type="text" maxlength="45" />
										</td>
									</tr>
									<tr>
										<td>Senha:</td>
										<td><input name="senha" type="password" maxlength="10"/></td>
									</tr>
									<tr>
										<td colspan="2">
											<button type="submit" class="div-box div-box-hover link-default pull-right">
												<i class="fa fa-sign-in margin-right-5" aria-hidden="true"></i>
												Entrar
											</button>
										</td>
									</tr>
									<tr>
										<td class="text-right" colspan="2">
											<br>
											<a href="./publico/visao/GuiLembrarSenhaCandidato.php" title="Clique aqui para receber uma nova senha.">Esqueceu a senha?</a>
										</td>
									</tr>
									<tr>
										<td class="text-right" colspan="2">
											<a href="./publico/visao/GuiAlterarSenhaCandidato.php" title="Clique para mudar sua senha.">Alterar Senha</a>
										</td>
									</tr>
								</table>
							</form>
						</fieldset>


					</div>

					<div class="login-index-area login-empresa">
						<fieldset class="fieldset-index">
							<legend><i class="fa fa-building margin-right-5" aria-hidden="true"></i>LOGIN DE EMPRESAS</legend>
							<form name="loginEmpresa" id="loginEmpresa" method="post" action="./publico/controle/ControleEmpresa.php?op=logar">
								<table class="table-login-index">
									<tr>
										<td>Login:</td>
										<td><input name="login" type="text" maxlength="40" /></td>
									</tr>
									<tr>
										<td>Senha:</td>
										<td><input name="senha" type="password" maxlength="12"/></td>
									</tr>
									<tr>
										<td colspan="2">
											<button type="submit" class="div-box div-box-hover link-default pull-right">
												<i class="fa fa-sign-in margin-right-5" aria-hidden="true"></i>
												Entrar
											</button>
										</td>
									</tr>
									<tr>
										<td class="text-right" colspan="2">
											<br>
											<a href="./publico/visao/GuiLembrarSenhaEmpresa.php" title="Clique aqui para receber uma nova senha.">Esqueceu a senha?</a>
										</td>
									</tr>
									<tr>
										<td class="text-right" colspan="2">
											<a href="./publico/visao/GuiAlterarSenhaEmpresa.php" title="Clique para mudar sua senha.">Alterar Senha</a>
										</td>
									</tr>
								</table>
							</form>
						</fieldset>
					</div>

					<a name="vagas"></a>
					<table class="table-header-vagas">
						<thead>
							<tr>
								<th colspan="3">
									<i class="fa fa-user-plus fa-2x" aria-hidden="true" title="Clique aqui para visualizar todas vagas cadastradas pelas empresas no Banco de Oportunidades de Canoas"></i>
									<label class="font16 margin-left-5">OPORTUNIDADES</label>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>VAGA</td>
								<td>QUANTIDADE</td>
								<td>SALÁRIO</td>
							</tr>
						</tbody>
					</table>

					<div id="scroll" style="height: 350px; overflow: scroll; overflow-x: hidden; border: 1px solid #CCC;" >
						<br><br><br><br><br><br><br><br><br><br>
						<div class="width100 text-center">
							<img alt="Banco de Oportunidades" src="./imagens/logo_banco.png" width="250">
						</div>
						<br><br><br><br><br><br><br><br>
						<table class="table-index table-striped table-index-vagas">
							<tbody>
							</tbody>
						</table>
						<br><br><br><br><br><br><br><br><br><br><br><br><br>
						<div class="width100 text-center">
							<img alt="Banco de Oportunidades" src="./imagens/logo_banco.png" width="250">
						</div>
					</div>

					<table class="table-footer-vagas">
						<tbody>
							<tr>
								<td>
									<i class="fa fa-user fa-2x" aria-hidden="true" title="Clique aqui para visualizar todas vagas cadastradas pelas empresas no Banco de Oportunidades de Canoas"></i>
									<label class="margin-left-5 font15"><b>MAIS RECENTE:</b></label>
									<label class="font15">
									</label>
								</td>
							</tr>
						</tbody>
					</table>

					<div class="btn-faleconosco-vermais-index">
						<a href="./publico/visao/GuiContato.php" class="div-box div-box-hover pull-left margin-top-5 link-default">
							<i class="fa fa-comments fa-2x margin-right-5" aria-hidden="true"></i>
							Fale conosco
						</a>
						<a href="publico/visao/GuiTodasVagas.php" class="div-box div-box-hover pull-right margin-top-5 link-default font-blue01" title="Clique aqui para visualizar todas vagas cadastradas pelas empresas no Banco de Oportunidades de Canoas">
							<i class="fa fa-arrow-circle-right fa-2x margin-right-5" aria-hidden="true"></i>
							Ver mais
						</a>
					</div>

					<div class="div-info-redesociais">
						<div class="pull-left">
							<a href="{{ route('manuals.faq')}}" class="div-box div-box-hover pull-left margin-top-5 link-default font-blue01">
								<i class="fa fa-question-circle fa-2x margin-right-5" aria-hidden="true"></i>
								Perguntas Frequentes
							</a>
						</div>
						<div class="pull-left">
							<a href="./publico/visao/GuiPoliticaPrivacidade.php" class="div-box div-box-hover pull-left margin-top-5 link-default font-blue01 margin-left-5">
								<i class="fa fa-lock fa-2x margin-right-5" aria-hidden="true"></i>
								Política de Privacidade
							</a>
						</div>
						<div class="pull-right div-rss">
							<a target="_blank" href="http://www.canoas.rs.gov.br/rss.xml" title="RSS" alt="RSS">
								<i class="fa fa-rss-square fa-3x" aria-hidden="true"></i>
							</a>
						</div>
						<div class="pull-right div-youtube">
							<a target="_blank" href="http://www.youtube.com/secomcanoas" title="Youtube" alt="Youtube">
								<i class="fa fa-youtube-square fa-3x pull-right" aria-hidden="true"></i>
							</a>
						</div>
						<div class="pull-right div-facebook">
							<a target="_blank" href="https://www.facebook.com/PrefeituradeCanoas" title="Facebook" alt="Facebook">
								<i class="fa fa-facebook-official fa-3x pull-right" aria-hidden="true"></i>
							</a>
						</div>
						<div class="pull-right div-twitter">
							<a target="_blank" href="http://www.twitter.com/prefcanoas" title="Twitter" alt="Twitter">
								<i class="fa fa-twitter-square fa-3x pull-right" aria-hidden="true"></i>
							</a>
						</div>
					</div>
					<br>
				</div>
			</div>
		</div>
	</div>
@extends('layout.main.footer')
