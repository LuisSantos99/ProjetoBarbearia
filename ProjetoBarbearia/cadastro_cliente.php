<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Barber Style</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<meta name="description" content="Verificar.com">
		<meta name="author" content="BarbeariaMustache!">
		<link href="css/bootstrap.css" rel="stylesheet">
		<script src='js/Funcoes.js'></script>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
    	<header class="topo">
        	<img src="img/logo.png" alt="Logo do site">
			<h1>Cadastro de Clientes</h1>
    	</header>
	</body>
	<body>
		<form method='post' action='' method="post" enctype='multipart/form-data'>

			<label for="LabelNome"> Nome <strong style="color:red;"> * </strong> </label>
			<input type="nomeCliente" class="form-control" id="nomeCliente" name="nomeCliente" placeholder="Nome Completo" required>

			<label for="LabelData">Data de Nascimento </label>
			<input type="date" class="form-control date-time-mask" id="NascCliente" name="NascCliente" placeholder="Ex.: 00/00/0000">


			<label for="inputDDD">DDD</label>
			<input oninput="mascaraDDD(this)"  type="text" class="form-control" id="DDDTel"name="DDDTel" placeholder="Ex.:16" maxlength="2">

			<label for="inputTelFone">Telefone</label>
			<input oninput="mascaraCel(this)" type="text" class="form-control" id="TelFone" name="TelFone" maxlength="10" placeholder="Ex.: 00000-0000"   >
						<!--pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$"-->

			<label for="inputPassword4">CPF</label>
			<input oninput="mascaraCPF(this)" type="text" class="form-control cpf-mask" id="CPFCliente" name="CPFCliente" placeholder="Ex.: 000.000.000-00">

			<label for="inputPassword4">RG</label>
			<input oninput="mascaraRG(this)" type="text" class="form-control" id="RGCliente" name="RGCliente" placeholder="Ex.: 00.000.000-0">

			<button type="submit" class="btn btn-success">Cadastrar</button>
			<button type="reset" class="btn btn-danger">Cancelar</button>
		</form>
    	<footer class="rodape">
        	<img src="img/logo.png" alt="Logo do site">
    	</footer>
	</body>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.mask.min.js"></script>
</html>