<?php
require_once '../bd.php';
$IDUSUARIO = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
$IDUSUARIO = intval($IDUSUARIO);
$sql = "SELECT *
    FROM usuarios WHERE IDUSUARIO = $IDUSUARIO"; //MEXI AQUI	
$resultado = mysqli_query($banco, $sql);
$usuarios = mysqli_fetch_assoc($resultado);

$sql = "SELECT IDBARBEIRO,NOME,ESPECIALIZACAO,CPF
    FROM barbeiro ";
$ResultB = mysqli_query($banco, $sql);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editar Usuários</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="../../css/global.css">
	<link rel="stylesheet" href="../../css/paginaInicial.css">
	<script src="https://kit.fontawesome.com/3b5310efad.js" crossorigin="anonymous"></script>
</head>


<body>
	<header class="topo">
		<img src="../../img/logo.png" alt="Logo do site">
		<h1>Editar Usuários<h1>
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
				<label>Editar</label>
			</div>
		</div>
		<form method='post' action='editar_proc.php' method="post" enctype='multipart/form-data'>
			<div class="form-row">
				<div class="form-group col-md-9">
					<label for="LabelLogin"> Usuário <strong style="color:red;"> * </strong> </label>
					<input type="text" value="<?= $usuarios['LOGIN'] ?>" class="form-control" id="Login" name="Login" placeholder="Usuário" required>
				</div>
				<div class="form-group col-md-3">
					<label for="LabelSenha">Senha </label>
					<input type="password" class="form-control date-mask" id="Senha" name="Senha" placeholder="Senha">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-3">
					<select id="IdBarbeiro" name="IdBarbeiro" class="form-control" placeholder="Código Barbeiro">
						<option value="Selecione" selected>Escolher...</option>
						<?php
						while ($barbeiro = mysqli_fetch_assoc($ResultB)) :
						?>
							<option value="<?= $barbeiro['IDBARBEIRO'] ?>"><?= $barbeiro['NOME'] ?></option>
						<?php endwhile; ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<input type="hidden" name="IdUsuario" id="IDUSUARIO" value="<?= $usuarios['IDUSUARIO'] ?>" class="form-control" aria-describedby="IDUSUARIO" placeholder="ID">
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