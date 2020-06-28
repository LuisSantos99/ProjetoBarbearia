<?php
include_once("../bd.php");
date_default_timezone_set('America/Sao_Paulo');
$data =  date('Y-m-d H:i:s');
$sql = "SELECT A.IDAGENDA, A.IDCLIENTE, COALESCE(C.NOME,'Não Informado') AS NOME, A.IDBARBEIRO, 
CASE (DATAHORA < '$data' AND STATUS <> 'F' ) WHEN TRUE THEN '#FF0000' ELSE COLOR END AS COR, 
DATAHORA, DATAHORAFIM , ATN.STATUS FROM AGENDA A 
LEFT JOIN CLIENTES C ON C.IDCLIENTE = A.IDCLIENTE 
INNER JOIN ATENDIMENTO ATN ON ATN.IDAGENDA = A.IDAGENDA";
$resultado_agenda = mysqli_query($banco, $sql);


$xIDAgenda =  (filter_input(INPUT_GET, 'IDAGENDA', FILTER_DEFAULT));
/************* DADOS DA AGENDA *************/
if (($xIDAgenda != NULL) and empty($xIDAgenda)) {
	$SQL = "SELECT A.IDAGENDA,B.IDBARBEIRO, B.NOME,A.IDCLIENTE 
	FROM ATENDIMENTO T
	INNER JOIN AGENDA A ON A.IDAGENDA =  T.IDAGENDA
	INNER JOIN BARBEIRO B ON B.IDBARBEIRO = A.IDBARBEIRO
	LEFT JOIN CLIENTES C ON C.IDCLIENTE = A.IDCLIENTE
	WHERE A.IDAGENDA = $xIDAgenda";
	$resultado = mysqli_query($banco, $SQL);
	$agenda = mysqli_fetch_assoc($resultado);
	$xidcliente = $agenda['IDCLIENTE'];	
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset='utf-8' />
	<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
	<meta name="description" content="Verificar.com">
	<meta name="author" content="BarbeariaMustache!">
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href='../../css/fullcalendar.min.css' rel='stylesheet' />
	<link href='../../css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
	<link href="../../css/PesquisaCliente.css" rel="stylesheet">
	<link href='../../css/agenda.css' rel='stylesheet' />
	<script src='../../js/moment.min.js'></script>
	<script src='../../js/jquery.min.js'></script>
	<script src='../../js/InserirAtendimento.js'></script>
	<script src='../../js/main.js'></script>
	<script src='../../js/locales-all.js'></script>
	<script src='../../js/Funcoes.js'></script>
	<script src='../../js/fullcalendar.min.js'></script>
	<script src='../../locale/pt-br.js'></script>
	<script src="https://kit.fontawesome.com/3b5310efad.js" crossorigin="anonymous"></script>
	<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
	<script src="../../js/jquery-ui.min.js"></script>
	<script src="../../js/jquery.ui-contextmenu.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay,list'
				},
				defaultDate: Date(),
				navLinks: true, // pode clicar em nomes de dias / semanas para navegar pelas visualizações
				editable: false,
				eventLimit: true, // permitir link "mais" quando houver muitos eventos
				selectable: true,
				events: [
				<?php
				while ($row_agenda = mysqli_fetch_array($resultado_agenda)) {
					?> {
						id: '<?php echo $row_agenda['IDAGENDA']; ?>',
						title: '<?php echo $row_agenda['NOME']; ?>',
						start: '<?php echo $row_agenda['DATAHORA']; ?>',
						end: '<?php echo $row_agenda['DATAHORAFIM']; ?>',
						color: '<?php echo $row_agenda['COR']; ?>',
						groupId: '<?php echo $row_agenda['STATUS']; ?>',
					},
					<?php
				}
				?>
				],
				eventClick: function(info) {
					if (info.groupId == 'A') {
						document.getElementById("myCheck").click();
						let info_id = info.id;
						$.ajax({
							url: `pesquisaAgenda.php?id=${info_id}`,
							type: 'get'
						}).done((data) => {
							if (data) {
								let agenda = JSON.parse(data);
								//AGENDA
								$('#nomeClienteA').val(agenda.cliente.NOME)
								$('#idClienteA').val(agenda.cliente.IDCLIENTE)
								$('#BarbeiroA').val(agenda.barbeiro.NOME)
								$('#idBarbeiroA').val(agenda.barbeiro.IDBARBEIRO)
								$('#dtInicial').val(agenda.DATAHORA)
								$('#dtFinal').val(agenda.DATAHORAFIM)
								$('#idAgendaA').val(agenda.IDAGENDA)
								//ATENDIMENTO								
								$('#nomeClienteAT').val(agenda.cliente.NOME)
								$('#idClienteAT').val(agenda.cliente.IDCLIENTE)
								$('#BarbeiroAT').val(agenda.barbeiro.NOME)
								$('#idBarbeiroAT').val(agenda.barbeiro.IDBARBEIRO)
								$('#idAgendaAT').val(agenda.IDAGENDA)
							}
						}).fail((err) => {
							console.log(data);
						})
					}
				},
			})
			$(document).contextmenu({
				delegate: ".hasmenu",
				preventContextMenuForPopup: true,
				preventSelect: true,
				menu: [{
					title: "Cut",
					cmd: "cut",
					uiIcon: "ui-icon-scissors"
				},
				{
					title: "Copy",
					cmd: "copy",
					uiIcon: "ui-icon-copy"
				},
				{
					title: "Paste",
					cmd: "paste",
					uiIcon: "ui-icon-clipboard",
					disabled: true
				},
				],
				select: function(event, ui) {
					// Logic for handing the selected option
				},
				beforeOpen: function(event, ui) {
					ui.menu.zIndex($(event.target).zIndex() + 1);
				}

			});
		});
	</script>
	<header class="topo">
		<img src="../../img/LogoOficial.png" alt="Logo do site">
		<h1>Agenda</h1>
	</header>
</head>

<body>
	<div id="menuLateral" style="width: 20%;height: 100%; float: left; padding: 3px; ">		
		<button type="hidden" id="myCheck" class="btn btn-primary text-hide" data-toggle="modal" data-target=".bd-example-modal-lg">Modal grande</button>

		<a href="../../paginaInicial.html">
			<label> Página Inicial </label>
		</a>
		<label>|</label>
		<label>Agenda</label>

		<div class="atualizar" style="margin-top: 0px; margin-left: 20px;" onClick="history.go(0)">		
			<i class="fa fa-refresh">
				<label class="atualizar-name"> Atualizar </label>
			</i>
		</div>

		<div class="agendar" style="margin-left: 20px;margin-top: 5%;">
			<a href="../../adm/agenda/PesquisaCliente.php">
				<i class="fas fa-calendar-alt service-icon">
					<label class="agendar-name"> Agendar </label>
				</i>
			</a>
		</div>
		<!-- MENU LATERAL -->
		<div class="form-group" style="float: bottom;margin-top:50%; ">
			<div class="form-row legenda" style="margin-top: 55px; margin-left:10%;">
				<label for="label" class="label"> Legenda: </label>
			</div>
			<div class="form-row legenda" style="margin-top: 0px; margin-left:10%;">
				<div class="form-group col-md-1" id="legenda" style="background-color: #32CD32; height: 20px; margin-left: 5px;">
				</div>
				<label for="label" class="label"> Agendado </label>
			</div>
			<div class="form-row legenda" style="margin-top: 0px; margin-left:10%;">
				<div class="form-group col-md-1" id="legenda" style="background-color: #00CED1; height: 20px; margin-left: 5px;">
				</div>
				<label for="label" class="label"> Finalizado </label>
			</div>
			<div class="form-row legenda" style="margin-top: 0px;; margin-left:10%;">
				<div class="form-group col-md-1" id="legenda" style="background-color: red; height: 20px; margin-left: 5px;">
				</div>
				<label for="label" class="label"> Atrasado </label>
			</div>
		</div>

	</div>
	<div id="conteudo" style="width: 80%; float: right; ">
		<div id='calendar'>
			<!-- CALENDÁRIO -->
		</div>
	</div>
	<div class="modal fade bd-example-modal-lg" id="ModalLongoExemplo" tabindex="-1" role="dialog" aria-labelledby="ModalLongoExemplo" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<!-- Cabeçalho do modal -->
				<div class="modal-header">
					<!-- <h4 class="modal-title">Título do modal</h4> -->
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- Corpo do modal -->
				<div class="modal-body">
					<div class="tabs-container">
						<input type="radio" name="tabs" class="tabs" id="tab1" checked>
						<label for="tab1"> Editar Agenda </label>
						<div>
							<form method='post' action='editar_proc.php' method="post" enctype='multipart/form-data'>
								<div class="form-row">
									<div class="form-group col-lg-6">
										<label for="LabelCliente"> Cliente </label>
										<input type="text" class="form-control" id="nomeClienteA" name="nomeClienteA" placeholder="Nome Cliente" readonly />
									</div>
									<input style="display: none" id="idClienteA" name="IDCLIENTE" />
									<input style="display: none" id="idBarbeiroA" name="IDBARBEIRO" />
									<input style="display: none" id="idAgendaA" name="IDAGENDA" />
									<div class="form-group col-lg-6">
										<label for="LabelCliente"> Barbeiro </label>
										<input type="text" class="form-control" value="" id="BarbeiroA" name="BarbeiroA" placeholder="Barbeiro" readonly>
									</div>
								</div>	
								<div class="form-row">
									<div class="form-group col-lg-6">
										<label for="labelstInicial"> Data e Hora Inicial do Atendimento </label><br>
										<input type="datetime-local" class="form-control" id="dtInicial" name="dtInicial" required="">
									</div>
									<div class="form-group col-lg-6">
										<label for="labeldtFinal"> Data e Hora Final do Atendimento </label><br>
										<input type="datetime-local" class="form-control" id="dtFinal" name="dtFinal" required="">
									</div>
								</div>	
								<div class="form-row">
									<div class="form-group">										
										<button type="button" class="btn btn-danger" data-dismiss="modal">&times;Cancelar</button>
									</div>
									<div class="form-group" style="margin-left:5px;">
										<button type="submit" class="btn btn-success" id="btEditar">Editar Agenda</button>
									</div>
								</div>	
						</form>
					</div>
					<input type="radio" name="tabs" class="tabs" id="tab2">
					<label for="tab2"> Finalizar Atendimento </label>
					<div>
						<form method='post' action='../Atendimento/InserirAtend_proc.php' enctype='multipart/form-data'>
							<div class="form-row">
								<div class="form-group col-lg-6">
									<label for="LabelCliente"> Cliente </label>
									<input type="text" class="form-control" id="nomeClienteAT" name="nomeClienteAT" placeholder="Nome Cliente" readonly>
								</div>
								<input style="display: none" id="idClienteAT" name="IDCLIENTE" />
								<input style="display: none" id="idBarbeiroAT" name="IDBARBEIRO" />
								<input style="display: none" id="idAgendaAT" name="IDAGENDA" />
								<div class="form-group col-lg-6">
									<label for="LabelCliente"> Barbeiro </label>
									<input type="text" class="form-control" value="" id="BarbeiroAT" name="BarbeiroAT" placeholder="Barbeiro" readonly>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-8">
									<label for="TipoCorte">Serviço <strong style="color:red;"> * </strong> </label>
									<select id="TipoCorte" name="TipoCorte" class="form-control">
										<option value="Selecione" selected>Escolher...</option>
										<option value="Corte Infantil">Corte Infantil</option>
										<option value="Corte Adulto">Corte Adulto</option>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label for="LabelCliente"> Valor (R$) <strong style="color:red;"> * </strong> </label>
									<input type="text" class="form-control" id="valor" name="valor" onkeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)" placeholder="R$" />
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6" style="float:right;">
									<input type="text" id="valorTotal" name="valorTotal" class="form-control" onkeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)" placeholder="R$" readonly="true" />
								</div>

								<div class="form-group col-md-6" id="btAdicionar" style="float:right;">
									<div class="service">
										<i class="fas fa-plus service-icon" id="btAdicionar"></i>
									</div>
								</div>
							</div>
							<table id="tabelaServico" border="1" class="table">
								<thead>
									<tr>
										<th>Serviço</th>
										<th>Valor (R$)</th>
										<th scope="col">Ação</th>										
									</tr>
								</thead>
							</table>
							<div class="form-row">
								<input type="hidden" id="itens" name="itens" />
								<input type="hidden" id="valorx" name="valorx" />
							</div>
							<div class="form-row" style="float:right;">
								<div class="form-group">
									<button type="button" class="btn btn-danger" data-dismiss="modal">&times;Cancelar</button>
								</div>
								<div class="form-group" style="margin-left:5px;">
									<button type="submit" class="btn btn-success" id="btConfirmar">Finalizar Atendimento</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<!--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>