 <!DOCTYPE html>
 <html lang="pt-br">

 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1">

 	<title>Cadastro de Cliente</title>
 	<meta name="description" content="Verificar.com">
 	<meta name="author" content="BarbeariaMustache!">
 	<link href="../../css/bootstrap.min.css" rel="stylesheet"> 	
 	<script src='../../js/Funcoes.js'></script>

 </head>

 <body >
 	<nav class="navbar navbar-dark" style="background-color:white;">
 		<img class="mr-3" src="../Image/LogoOficial.png" height='220px' width="220px" alt="Imagem de exemplo genérica">
 	<hr>
	</nav>
 	
 	<div class="container bg-light">
 		<div class='form-container'>
 			<form method='post' action='CadastroCliente_proc.php' method="post" enctype='multipart/form-data'> 				
 				<div class="form-row"> 					
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
 					<div class="form-group col-md-1">
 						<label for="inputDDD">DDD</label>
 						<input oninput="mascaraDDD(this)"  type="text" class="form-control" id="DDDTel"name="DDDTel" placeholder="Ex.:16" maxlength="2"> 
 					</div>
 					<div class="form-group col-md-3">
 						<label for="inputTelFone">Telefone</label>
						 <input oninput="mascaraCel(this)" type="text" class="form-control" id="TelFone" name="TelFone" maxlength="10" placeholder="Ex.: 00000-0000"   >
						 <!--pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$"-->
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
			   	    <button type="submit" class="btn btn-success">Cadastrar</button>
					</div>
					<div class="form-group" style="margin-left:5px;">
					<button type="reset" class="btn btn-danger">Cancelar</button>
					</div>
					<br>
				</div>
 			</form>
 		</div>
 	</div>
 	<script src="../js/jquery.min.js"></script>
 	<script src="../js/bootstrap.min.js"></script>
 	<script src="../js/scripts.js"></script>
 </body>

 </html>