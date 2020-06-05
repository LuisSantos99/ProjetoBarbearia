<?php 
    require_once '../bd.php';
	$idcliente = filter_input(INPUT_GET,'idcliente',FILTER_DEFAULT);
    $idcliente=intval($idcliente);
    $sql = "SELECT IDCLIENTE,NOME,DATANASC,CPF,DDD,TELEFONE,RG,ATIVO 
    FROM clientes WHERE IDCLIENTE = 13"; //MEXI AQUI	
	$resultado = mysqli_query($banco,$sql);    
	$clientes = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar clientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/adm.css">
	<script src='../js/Funcoes.js'></script>
</head>
 <body >
 	<nav class="navbar navbar-dark" style="background-color:white;">
 		<img class="mr-3" src="../../img/LogoOficial.png" height='220px' width="220px" alt="Imagem de exemplo genérica">
 	<hr>
	 <h1>Editar Clientes</h1>
    <hr>
	</nav>
 	<div class="container bg-light">
 		<div class='form-container'>
 			<form method='post' action='editar_proc.php' method="post" enctype='multipart/form-data'> 				
 				<div class="form-row"> 					
 					<div class="form-group col-md-9">
 						<label for="LabelNome"> Nome <strong style="color:red;"> * </strong> </label> 
 						<input  type="text"  value="<?= $clientes['NOME'] ?>" class="form-control" id="nomeCliente" name="nomeCliente" placeholder="Nome Completo" required>
 					</div>
 					<div class="form-group col-md-3">
 						<label for="LabelData">Data de Nascimento </label>
 						<input value= "<?=$clientes['DATANASC']?>" type="date" class="form-control date-mask" id="NascCliente" name="NascCliente" placeholder="Ex.: 00/00/0000">
 					</div>
 				</div>
 				<div class="form-row"> 					
 					<div class="form-group col-md-1">
 						<label for="inputDDD">DDD</label>
 						<input value= "<?=$clientes['DDD']?>" oninput="mascaraTel(this)" type="text" maxlength="2" class="form-control" id="DDDTel"name="DDDTel" placeholder="Ex.:016">
 					</div>
 					<div class="form-group col-md-3">
 						<label for="inputTelFone">Telefone</label>
						 <input value= "<?=$clientes['TELEFONE']?>" oninput="mascaraCel(this)" type="text" class="form-control" id="TelFone" name="TelFone" maxlength="10" placeholder="Ex.: 00000-0000"   >
 					</div>
 					<div class="form-group col-md-4">
 						<label for="inputCPF">CPF</label>
 						<input value= "<?=$clientes['CPF']?>" oninput="mascaraCPF(this)" type="text" class="form-control cpf-mask" id="CPFCliente" name="CPFCliente" placeholder="Ex.: 000.000.000-00">
 					</div>
 					<div class="form-group col-md-4">
 						<label for="inputRG">RG</label>
 						<input value= "<?=$clientes['RG']?>"oninput="mascaraRG(this)" type="text" class="form-control" id="RGCliente" name="RGCliente" placeholder="Ex.: 00.000.000-0">
 					</div>
 				</div> 				
 				<div class="form-group">
 					<div class="form-check">
 						<input class="form-check-input" type="checkbox" id="AtivoCliente" checked="<?=$clientes['Ativo']?>" sname="AtivoCliente">
 						<label class="form-check-label" for="gridCheck">
 							Cliente Ativo
 						</label>
 					</div> 				
 				</div>
				 <div class="form-group">
    					<input type="hidden" name="idcliente"  id="IDCLIENTE" value="<?=$clientes['IDCLIENTE']?>" class="form-control"  aria-describedby="ID" placeholder="ID">
  				
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