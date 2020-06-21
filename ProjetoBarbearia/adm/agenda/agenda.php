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

//pesquisa('<script> document.write(variavel)</script>');

$xIDAgenda=  (filter_input(INPUT_GET, 'IDAGENDA', FILTER_DEFAULT));
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
	/************* SELECT NO ID CLIENTE, NOME *******************/
	$xidcliente = filter_input(INPUT_POST, 'idCliente', FILTER_DEFAULT);			
	$sql = "SELECT IDCLIENTE, NOME FROM CLIENTES WHERE IDCLIENTE = $xidcliente";
	$resultado = mysqli_query($banco, $sql);
	$cliente = mysqli_fetch_assoc($resultado);
	$_GET['IDAGENDA'] = 0;
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
	<link href='../../css/agenda.css' rel='stylesheet' />
	<script src='../../js/moment.min.js'></script>
	<script src='../../js/jquery.min.js'></script>
	<script src='../../js/InserirAtendimento.js'></script>
	<script src='../../js/main.js'></script>
	<script src='../../js/locales-all.js'></script>
	<script src='../../js/fullcalendar.min.js'></script>
	<script src='../../locale/pt-br.js'></script>
	<script src="https://kit.fontawesome.com/3b5310efad.js" crossorigin="anonymous"></script>
	<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
	<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>  -->
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
				editable: true,
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
					if (info.groupId == 'A'){										
						//window.location = '../Atendimento/InserirAtendimento.php?IDAGENDA=' + info.id;
						document.getElementById("myCheck").click();
						document.getElementById("IDAGENDA").value = info.id;
						//AQUI EU PASSO O ID, TAVA FAZENDO O SELECT EM PHP AQUI TAMBÉM
				
					}	
				},				
				// eventRender: function (event, element) {
				// 	var originalClass = element[0].className;
				// 	element[0].className = originalClass + ' hasmenu';
				// },
				// dayRender: function (day, cell) {
				// 	var originalClass = cell[0].className;
				// 	cell[0].className = originalClass + ' hasmenu';
				// }
			})
			$(document).contextmenu({
				delegate: ".hasmenu",
				preventContextMenuForPopup: true,
				preventSelect: true,
				menu: [
				{ title: "Cut", cmd: "cut", uiIcon: "ui-icon-scissors" },
				{ title: "Copy", cmd: "copy", uiIcon: "ui-icon-copy" },
				{ title: "Paste", cmd: "paste", uiIcon: "ui-icon-clipboard", disabled: true },
				],
				select: function (event, ui) {
                    // Logic for handing the selected option
                },
                beforeOpen: function (event, ui) {
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
		<!-- <input type="button" value="Voltar" onClick="history.go(-1)"> 
			<input type="button" value="Avançar" onCLick="history.forward()"> -->
			<input type="button" value="Atualizar" onClick="history.go(0)"> 
			<button type="hidden" id="myCheck"class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" >Modal grande</button> 
			<a href="../../paginaInicial.html">
				<label> Página Inicial </label>
			</a>
			<label>|</label>
			<label>Agenda</label>		
			<!-- Legenda: <br /> -->
			<div class="agendar"style="margin-left: 20px;margin-top: 5%;">
				<a href="../../adm/agenda/PesquisaCliente.php" >
					<i class="fas fa-calendar-alt service-icon" > 
						<label class="agendar-name"> Agendar </label>
					</i>			
				</a>
			</div>		
			<!-- MENU LATERAL -->
			<div class="form-row legenda" style="margin-top: 55px;">			
				<div class="form-group col-md-1" id="legenda" style="background-color: #32CD32; height: 20px; margin-left: 10px;">
				</div>		
				<label for="label" class="label"> Agendado </label>
				<div class="form-group col-md-1" id="legenda" style="background-color: #00CED1; height: 20px; margin-left: 10px;">
				</div>
				<label for="label" class="label"> Finalizado </label>
				<div class="form-group col-md-1" id="legenda" style="background-color: red; height: 20px; margin-left: 10px;">
				</div>
				<label for="label" class="label"> Atrasado </label>
			</div>							
			<br />
			<input type="text" class ="form-control" id="IDAGENDA" name="IDAGENDA" value="0">      			
		</div>
		<div id="conteudo" style="width: 80%; float: right; ">
			<div id='calendar'>
				<!-- CALENDÁRIO -->
			</div>
		</div>
		<div class="modal fade bd-example-modal-lg" id ="ModalLongoExemplo"tabindex="-1" role="dialog" aria-labelledby="ModalLongoExemplo" aria-hidden="true">
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
								<p>In hac habitasse platea dictumst. In laoreet justo quis magna porta, a tristique ligula maximus. Sed dignissim, tellus eu lobortis aliquet, lacus felis semper ipsum, eu vulputate sapien velit in augue. Fusce pharetra elit ut tristique congue. Praesent arcu diam, convallis a purus vitae, tempor volutpat est. Sed quis nulla odio. Cras turpis lectus, convallis non nibh at, venenatis efficitur risus. Praesent sed pharetra quam. Morbi sagittis ex eget dolor faucibus, vel vulputate velit molestie. Etiam laoreet malesuada consectetur. Ut quis iaculis diam, ullamcorper malesuada metus. Mauris euismod purus et odio egestas aliquam. Fusce mattis est sit amet leo luctus hendrerit. Pellentesque eleifend laoreet magna, ac fermentum felis condimentum et. Sed sem nisl, aliquet at sem at, ornare vehicula urna. </p>
							</div>
							<input type="radio" name="tabs" class="tabs" id="tab2">
							<label for="tab2"> Finalizar Atendimento </label>
							<div>
								<p>
									<form method='post' action='InserirAtend_proc.php' method="post" enctype='multipart/form-data'>
										<div class="form-row">
											<div class="form-group col-md-15">
												<label for="LabelCliente"> Cliente </label>
												<input type="text" class="form-control" value="<?= $cliente['NOME'] ?>" id="nomeCliente" name="nomeCliente" placeholder="Nome Cliente" disabled>
											</div>
											<div class="form-group col-md-">
												<label for="LabelCliente"> Barbeiro </label>
												<input type="text" class="form-control" value="<?= $agenda['NOME'] ?>" id="Barbeiro" name="Barbeiro" placeholder="Barbeiro" disabled>           
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-9">
												<label for="TipoCorte">Serviço <strong style="color:red;"> * </strong> </label>
												<select id="TipoCorte" name="TipoCorte" class="form-control">
													<option value="Selecione" selected>Escolher...</option>
													<option value="Corte Infantil">Corte Infantil</option>
													<option value="Corte Adulto">Corte Adulto</option>
												</select>
											</div>
											<div class="form-group col-md">
												<label for="LabelCliente"> Valor (R$) <strong style="color:red;"> * </strong> </label>
												<input type="text" class="form-control" id="valor" name="valor" onkeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)" placeholder="R$" />
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md" style="float:right;">
												<input type="text" id="valorTotal" name="valorTotal" class="form-control" onkeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)" placeholder="R$" readonly="true" />
											</div>

											<div class="form-group col-md" id="btAdicionar" style="float:right;"> 
												<div class="service">       
													<i class="fas fa-plus service-icon" id="btAdicionar"></i>                 
												</div>                      
											</div>
										</div>
										<table id="tabelaServico" border="1" class="table">
											<thead>
												<!-- class="thead-dark"> -->
												<tr>
													<th>Serviço</th>
													<th>Valor (R$)</th>
													<th scope="col">Ação</th>
												</tr>
											</thead>
										</table>
										<div class="form-row"> <br><br><br>
											<input type="hidden" value="<?= $cliente['IDCLIENTE'] ?>" id="IDCLIENTE" name="IDCLIENTE">
											<!-- <input type="hidden" value="<?= $agenda['IDAGENDA'] ?>" id="IDAGENDA" name="IDAGENDA"> -->
											<input type="hidden" value="<?= $agenda['IDBARBEIRO'] ?>" id="IDBARBEIRO" name="IDBARBEIRO" >
											<input type="hidden" id="itens" name="itens" />
											<input type="hidden" id="valorx" name="valorx" />
										</div>
										<div class="form-row" style="float:right;">
											<div class="form-group">
												<button type="reset" class="btn btn-danger">Cancelar</button>
											</div>
											<div class="form-group" style="margin-left:5px;">
												<button type="submit" class="btn btn-success" id="btConfirmar" disabled="true">Finalizar Atendimento</button>
											</div>
										</div>
									</form>                    
								</p>
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