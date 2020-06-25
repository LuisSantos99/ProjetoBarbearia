<?php
require_once '../bd.php';
$sql = "SELECT IDBARBEIRO,NOME,ESPECIALIZACAO,CPF
    FROM barbeiro ";
$resultado = mysqli_query($banco, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inserir Usuárioo</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="../../css/global.css">
	<link rel="stylesheet" href="../../css/paginaInicial.css">
	<script src="https://kit.fontawesome.com/3b5310efad.js" crossorigin="anonymous"></script>
</head>

<body>
	<header class="topo">
		<img src="../../img/logo.png" alt="Logo do site">
		<h1>Cadastrar Usuários<h1>
				<a class="botao" href="../../logout.php">Sair (X)</a>
	</header>
	<div class="container">
		<div class="form-row" style="margin-top:10px;">
			<div class="form-group col-md-11">
				<a href="../../paginaInicial.html">
					<label> Página Inicial </label>
				</a>
				<label>|</label>
				<a href="index.php">
				<label>Usuários</label></a>
				<label>|</label>
				<label>Inserir </label>
			</div>
			<div class="form-group col-md">
			</div>
		</div>

		<form action='inserir_proc.php' method="post" enctype='multipart/form-data'>
			<div class="form-row">
				<div class="form-group col-md-9">
					<label for="LabelLogin"> Usuário <strong style="color:red;"> * </strong> </label>
					<input type="text" class="form-control" id="Login" name="login" placeholder="Usuário" required>
				</div>
				<div class="form-group col-md-3">
					<label for="LabelSenha">Senha </label>
					<input type="password" class="form-control" id="Senha" name="senha" placeholder="Senha">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-3">
					<select id="IdBarbeiro" name="idbarbeiro" class="form-control" placeholder="Código Barbeiro">
						<option value="Selecione" selected>Escolher...</option>
						<?php
						while ($barbeiro = mysqli_fetch_assoc($resultado)) :
						?>
							<option value="<?= $barbeiro['IDBARBEIRO'] ?>"><?= $barbeiro['NOME'] ?></option>
						<?php endwhile; ?>
					</select>
				</div>
			</div>
			<div class="form-row" style="float:right;">
				<div class="form-group">
					<button type="submit" class="btn btn-success">Inserir</button>
				</div>
				<div class="form-group" style="margin-left:5px;">
					<button onclick="history.go(-1)" type="reset" class="btn btn-danger">Cancelar</button>
				</div>
				<br>
			</div>
		</form>
	</div>
	</div>
</body>

</html>