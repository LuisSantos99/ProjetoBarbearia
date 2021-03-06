<?php

require_once("../bd.php");
$idcliente = filter_input(INPUT_POST, 'idCliente', FILTER_DEFAULT);

//CARREGA O CLIENTE SE SELECIONADO
if (!empty($idcliente)) {
	$sqlcliente = "SELECT IDCLIENTE,NOME FROM CLIENTES WHERE IDCLIENTE = $idcliente ";
	$cliente = mysqli_query($banco, $sqlcliente);
	$cliente = mysqli_fetch_assoc($cliente);
} else {
	header('location: PesquisaCliente.php');
}

//CARREGA BARBEIRO
$sqlbarbeiro = "SELECT IDBARBEIRO,NOME FROM BARBEIRO ORDER BY NOME";
$barbeiros = mysqli_query($banco, $sqlbarbeiro);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inserir agenda</title>
	<!-- <link rel="stylesheet" href="../../css/adm.css"> -->
	<link href="../../css/PesquisaCliente.css" rel="stylesheet">
	<script src='../../js/Funcoes.js'></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="../../css/global.css">
	<link rel="stylesheet" href="../../css/paginaInicial.css">
	<script src="https://kit.fontawesome.com/3b5310efad.js" crossorigin="anonymous"></script>
</head>
<body>
	<header class="topo">
		<img src="../../img/logo.png" alt="Logo do site">
		<h1>Agendar Horário<h1>
				<a class="botao" href="logout.php">Sair (X)</a>
	</header>
	<div class="container">
		<hr>
		<div class="form-row" style="margin-top:10px;">
			<div class="form-group col-md-11">
				<a href="../../paginaInicial.html">
					<label> Página Inicial </label>
				</a>
				<label>|</label>
				<a href="agenda.php">
					<label> Agenda </label>
				</a>
				<label>|</label>
				<label>Agendar Horário </label>
			</div>
		</div>
		<form action="CadastroAgenda_proc.php" method="post">
			<div class="form-row">
				<div class="form-group col-md">
					<label for="label"> Cliente </label><br>
					<input type="text" class="form-control" id="cliente" name="cliente" value="<?= $cliente['NOME'] ?>" disabled=true>
					<input type="hidden" class="form-control" id="idcliente" name="idcliente" value="<?= $cliente['IDCLIENTE'] ?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md">
					<label for="label"> Data e Hora Inicial do Atendimento </label><br>
					<input type="datetime-local" class="form-control" id="dtInicial" name="dtInicial" required="">
				</div>
				<div class="form-group col-md">
					<label for="label"> Data e Hora Final do Atendimento </label><br>
					<input type="datetime-local" class="form-control" id="dtFinal" name="dtFinal" required="">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md">
					<label for="lbbarbeiro"> Barbeiro <strong style="color:red;"> * </strong> </label>
					<select id="Barbeiro" name="Barbeiro" class="form-control" required>
						<option value="Selecione"> Escolher... </option>
						<?php while ($row_barbeiros = mysqli_fetch_assoc($barbeiros)) : 	?>
							<option value="<?= $row_barbeiros['IDBARBEIRO'] ?>">
								<?= $row_barbeiros['NOME'] ?>
							</option>
						<?php endwhile; ?>
					</select>

					<input type="hidden" class="form-control" id="erro" name="erro" value="">
					<?php
					if (isset($_GET['erro'])) {
						if ($_GET['erro'] == '1') {
							echo ' <div id="alert"><script>alert("Usuario Nao Cadastrado!!")</script></div>';
						}
					}
					?>
				</div>
			</div>
			<button type="reset" class="btn btn-danger" name="btcancelar" id="btcancelar" onClick="history.go(-2)">Cancelar</button>
			<!-- <button type="reset"  class="btn btn-warning"  name="btLimpar" id="btLimpar" >Limpar</button> -->
			<button type="submit" class="btn btn-success" name="inserir" id="inserir"> Inserir </button>

			<script>
				window.onload = function() {
					document.addEventListener('keypress', function(evento) {
						var origem = evento.target || evento.srcElement;
						var tecla = evento.which || evento.keyCode;

						switch (origem.id) {
							case 'Facul':
								if (tecla == 13) {
									document.getElementById('btAdicionar').click();
								}
						}
					});
					document.addEventListener('click', function(evento) {
						var Barbeiro = document.getElementById("Barbeiro").value;
						var origem = evento.target || evento.srcElement;
						switch (origem.id) {
							case 'inserir':
								//Verificar se está selecionado			
								if (Barbeiro == 'Selecione') {

								} else
									document.getElementById("inserir").type = "submit";
								break;
						}
					});
				};
			</script>
		</form>
	</div>
	</hr>
</body>

</html>