<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title>Barber Style</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<meta name="description" content="Verificar.com">
	<meta name="author" content="BarbeariaMustache!">
	<link href="../../css/bootstrap.css" rel="stylesheet">
	<script src='../../js/Funcoes.js'></script>
	<link href="../../css/cliente.css" rel="stylesheet">
</head>

<body>
	<header class="topo">
		<img src="../../img/logo.png" alt="Logo do site">
		<h1>Cadastro de Clientes</h1>
	</header>
</body>

<body>
	<div class="container bg-light">
		<div class='form-container'>
			<div class="form-row" style="margin-top:10px;">
				<div class="form-group col-md-11">
					<a href="../../paginaInicial.html">
						<label> Página Inicial </label>
					</a>
					<label>|</label>
					<a href="index.php">
						<label>Clientes</label>
					</a>
					<label>|</label>
					<label>Cadastro de Cliente</label>
				</div>
			</div>

			<form method='post' action='CadastroCliente_proc.php' method="post" enctype='multipart/form-data'>
				<div class="form-row" style="margin-top :10px;">
					<div class="form-group col-md-9">
						<label for="LabelNome"> Nome <strong style="color:red;"> * </strong> </label>
						<input type="nomeCliente" class="form-control" id="nomeCliente" name="nomeCliente" placeholder="Nome Completo" required>
					</div>
					<div class="form-group col-md-3">
						<label for="LabelData">Data de Nascimento </label>
						<input type="date" class="form-control date-time-mask" id="NascCliente" name="NascCliente" placeholder="Ex.: 00/00/0000">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="inputTelFone">Telefone</label>
						<input oninput="mascaraCel(this)" type="text" class="form-control" id="TelFone" name="TelFone" maxlength="19" placeholder="Ex.: +55 (16) 00000-0000">
					</div>
					<div class="form-group col-md-4">
						<label for="inputPassword4">CPF</label>
						<input oninput="mascaraCPF(this)" type="text" class="form-control cpf-mask" id="CPFCliente" name="CPFCliente" placeholder="Ex.: 000.000.000-00">
					</div>
					<div class="form-group col-md-4">
						<label for="inputPassword4">RG</label>
						<input oninput="mascaraRG(this)" type="text" class="form-control" id="RGCliente" name="RGCliente" placeholder="Ex.: 00.000.000-0">
					</div>
				</div>
				<div class="form-group">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="AtivoCliente" checked="true" name="AtivoCliente">
						<label class="form-check-label" for="gridCheck">
							Cliente Ativo
						</label>
					</div>
				</div>
				<div class="form-row" style="float:right;">
					<div class="form-group">
						<button type="reset" class="btn btn-danger">Cancelar</button>

					</div>
					<div class="form-group" style="margin-left:5px;">
						<button type="submit" class="btn btn-success">Cadastrar</button>
					</div>
					<br>
				</div>
			</form>
		</div>
	</div>

	<footer class="rodape">
		<img src="../../img/logo.png" alt="Logo do site">
	</footer>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.mask.min.js"></script>

</html>