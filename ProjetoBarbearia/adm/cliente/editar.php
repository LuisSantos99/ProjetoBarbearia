<?php
require_once '../bd.php';
$idcliente = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
$idcliente = intval($idcliente);
$sql = "SELECT *
    FROM clientes WHERE IDCLIENTE = $idcliente"; //MEXI AQUI	
$resultado = mysqli_query($banco, $sql);
$clientes = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editar Clientes</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="../../css/global.css">
	<link rel="stylesheet" href="../../css/paginaInicial.css">
	<script src="https://kit.fontawesome.com/3b5310efad.js" crossorigin="anonymous"></script>
</head>


<body>
	<header class="topo">
		<img src="../../img/logo.png" alt="Logo do site">
		<h1>Editar Clientes<h1>
				<a class="botao" href="../../logout.php">Sair (X)</a>
	</header>
	<div class="container">
		<div class="form-row" style="margin-top:10px;">
			<div class="form-group col-md-11">
				<a href="../../paginaInicial.html">
					<label> Página Inicial </label>
				</a>
				<label>|</label>
				<label>Editar</label>
			</div>
		</div>
		<form method='post' action='editar_proc.php' method="post" enctype='multipart/form-data'>
			<div class="form-row">
				<div class="form-group col-md-9">
					<label for="LabelNome"> Nome <strong style="color:red;"> * </strong> </label>
					<input type="text" value="<?= $clientes['NOME'] ?>" class="form-control" id="nomeCliente" name="nomeCliente" placeholder="Nome Completo" required>
				</div>
				<div class="form-group col-md-3">
					<label for="LabelData">Data de Nascimento </label>
					<input value="<?= $clientes['DATANASC'] ?>" type="date" class="form-control date-mask" id="NascCliente" name="NascCliente" placeholder="Ex.: 00/00/0000">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="inputTelFone">Telefone</label>
					<input value="<?= $clientes['TELEFONE'] ?>" oninput="mascaraCel(this)" type="text" class="form-control" id="TelFone" name="TelFone" maxlength="10" placeholder="Ex.: 00000-0000">
				</div>
				<div class="form-group col-md-4">
					<label for="inputCPF">CPF</label>
					<input value="<?= $clientes['CPF'] ?>" oninput="mascaraCPF(this)" type="text" class="form-control cpf-mask" id="CPFCliente" name="CPFCliente" placeholder="Ex.: 000.000.000-00">
				</div>
				<div class="form-group col-md-4">
					<label for="inputRG">RG</label>
					<input value="<?= $clientes['RG'] ?>" oninput="mascaraRG(this)" type="text" class="form-control" id="RGCliente" name="RGCliente" placeholder="Ex.: 00.000.000-0">
				</div>
			</div>
			<div class="form-group">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" id="AtivoCliente" checked="<?= $clientes['Ativo'] ?>" sname="AtivoCliente">
					<label class="form-check-label" for="gridCheck">
						Cliente Ativo
					</label>
				</div>
			</div>
			<div class="form-group">
				<input type="hidden" name="idcliente" id="IDCLIENTE" value="<?= $clientes['IDCLIENTE'] ?>" class="form-control" aria-describedby="ID" placeholder="ID">

			</div>
			<div class="form-row" style="float:right;">
				<div class="form-group">
					<button onclick="history.go(-1)" type="reset" class="btn btn-danger">Cancelar</button>

				</div>
				<div class="form-group" style="margin-left:5px;">
					<button type="submit" class="btn btn-success">Editar</button>
				</div>
				<br>
			</div>
		</form>
	</div>
	</div>
</body>

</html>