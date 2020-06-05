<?php 
    require_once '../bd.php';
	$IDBARBEIRO = filter_input(INPUT_GET,'IDBARBEIRO',FILTER_DEFAULT);
    $IDBARBEIRO=intval($IDBARBEIRO);
    $sql = "SELECT IDBARBEIRO,NOME,CPF
    FROM barbeiro WHERE IDBARBEIRO = 1"; //MEXI AQUI	
	$resultado = mysqli_query($banco,$sql);    
	$barbeiro = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Barbeiro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/adm.css">
	<script src='../../js/Funcoes.js'></script>
</head>
 <body >
 	<nav class="navbar navbar-dark" style="background-color:white;">
 		<img class="mr-3" src="../../img/LogoOficial.png" height='220px' width="220px" alt="Imagem de exemplo genérica">
 	<hr>
     <h1>Editar Barbeiro </h1>
    <hr>
	</nav>
 	<div class="container bg-light">
 		<div class='form-container'>
 			<form method='post' action='editar_proc.php' method="post" enctype='multipart/form-data'> 				
 				<div class="form-row"> 					
 					<div class="form-group col-md-9">
 						<label for="LabelNome"> Nome <strong style="color:red;"> * </strong> </label> 
 						<input  type="text"  value="<?= $barbeiro['NOME'] ?>" class="form-control" id="Nome" name="Nome" placeholder="Nome" required>
 					</div>
 					<div class="form-group col-md-3">
 						<label for="LabelCPF">CPF</label>
 						<input value= "<?=$barbeiro['CPF']?>" oninput="mascaraCPF(this)" type="text" class="form-control cpf-mask" id="CPF" name="CPF" placeholder="Ex.: 000.000.000-00">
 					</div>
 				</div>
				 <div class="form-group">
    					<input type="text" name="IDBARBEIRO" id="IDBARBEIRO" value="<?=$barbeiro['IDBARBEIRO']?>" class="form-control"  aria-describedby="ID" placeholder="IDBARBEIRO">
  				</div>
				<div class="form-row" style="float:right;">
				    <div class="form-group"> 
			   	    <button type="submit" class="btn btn-success">Editar</button>
					</div>
					<div class="form-group" style="margin-left:5px;">
					<button type="reset" class="btn btn-danger">Cancelar</button>
					</div>
					<br>
				</div>
 			</form>
 		</div>
 	</div>
 </body>

 </html>