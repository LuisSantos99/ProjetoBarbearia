<?php //http://localhost/ProjetoBarbearia/adm/agenda/d/index.php
include_once("../bd.php");
$sql = "SELECT A.IDAGENDA, A.IDCLIENTE, COALESCE(C.NOME,'Não Informado') AS NOME, IDBARBEIRO, COLOR, DATAHORA,DATAHORAFIM FROM AGENDA A LEFT JOIN CLIENTES C ON C.IDCLIENTE = A.IDCLIENTE";
$resultado_agenda = mysqli_query($banco, $sql);
$cor = filter_input(INPUT_POST, 'favcolor', FILTER_DEFAULT);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset='utf-8' />
			<link href='../../css/fullcalendar.min.css' rel='stylesheet' />
			<link href='../../css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
			<link href='../../css/agenda.css' rel='stylesheet' />
			<script src='../../js/moment.min.js'></script>
			<script src='../../js/jquery.min.js'></script>
			<script src='../../js/fullcalendar.min.js'></script>
			<script src='../../locale/pt-br.js'></script>
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
					events: [
						<?php
							while($row_agenda = mysqli_fetch_array($resultado_agenda)){
								?>
								{
								id: '<?php echo $row_agenda['IDAGENDA']; ?>',
								title: '<?php echo $row_agenda['NOME']; ?>',
								start: '<?php echo $row_agenda['DATAHORA']; ?>',
								end: '<?php echo $row_agenda['DATAHORAFIM']; ?>',
								url: 'http://localhost/ProjetoBarbearia/adm/cliente/CadastroCliente.php',
								color: '<?php echo $row_agenda['COLOR']; ?>',
								},<?php
							}
						?>
					]
				});
			});
		</script>
	</head>
	<body>

		<div id='calendar'></div>
<input type="color" id="cores" name="ArcoIris" list="arcoIris" value="#FF0000">
<datalist id="arcoIris">
	<option value="#FF0000">Vermelho</option>
	<option value="#FFA500">Laranja</option>
	<option value="#FFFF00">Amarelo</option>
	<option value="#008000">Verde</option>
	<option value="#0000FF">Azul</option>
	<option value="#4B0082">Indigo</option>
	<option value="#EE82EE">Violeta</option>
</datalist>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
   <input type="color" name="favcolor" id="favcolor" >
   <input type="text" value="<?= $cor ?>">
   <button type="submit" >envia </button>
</form> 
	</body>
</html>
