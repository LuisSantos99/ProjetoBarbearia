<?php
require_once("bd.php");
$xidcliente = filter_input(INPUT_POST,'idCliente',FILTER_DEFAULT); 
if ($xidcliente == NULL)
	header('location: PesquisaCliente.php');
//select no nome do cliente
$sql = "SELECT IDCLIENTE, NOME FROM CLIENTES WHERE IDCLIENTE = $xidcliente";
$resultado = mysqli_query($banco, $sql);
$cliente = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
 <html lang="pt-br">
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1">

 	<title> Inserir Atendimento </title>
 	<meta name="description" content="Verificar.com">
 	<meta name="author" content="BarbeariaMustache!">
 	<link href="../css/bootstrap.min.css" rel="stylesheet">
 	<link href="../css/PesquisaCliente.css" rel="stylesheet">
 	<script src='../../js/Funcoes.js'></script>
	<script src='../../js/InserirAtendimento.js'></script>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script src="dist/jquery.maskMoney.min.js" type="text/javascript"></script>  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>

 <body>
 	<nav></nav>
 	<div class="container bg-light">
 		<div class='form-container'>
			<br>		
	
 			<form method='post' action='InserirAtend_proc.php' method="post" enctype='multipart/form-data'>
 				<div class="form-row">
 					<div class="form-group col-md">
 						<label for="LabelCliente"> Cliente </label>
 						<input type="nomeCliente" class="form-control" value="<?= $cliente['NOME'] ?>" id="nomeCliente" name="nomeCliente" placeholder="Nome Cliente" disabled>
 					</div>
 				</div>
 				<div class="form-row">
 					<div class="form-group col-md-9">
 						<label for="TipoCorte">Serviço <strong style="color:red;"> * </strong> </label>
 						<select id="TipoCorte" name="TipoCorte" class="form-control">
 							<option value="Selecione"selected>Escolher...</option>
 							<option value="Corte Infantil">Corte Infantil</option>
 							<option value="Corte Adulto">Corte Adulto</option>
 						</select>
 					</div>
 					<div class="form-group col-md">
 						<label for="LabelCliente"> Valor (R$) <strong style="color:red;"> * </strong> </label>
 						<input type="text" class="form-control" id="valor" name="valor"  onkeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)"placeholder="R$" />						
					</div>
 				</div>
 				<div class="form-row" >
 					<div class="form-group col-md" style="float:right;">
 						<input type="text" id="valorTotal" name="valorTotal" class="form-control" onkeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)"placeholder="R$"  />
 					</div>				
 					<div class="form-group col-md" style="float:right;">
 						<button type="button" id="btAdicionar" class="btn btn-info">Adicionar</button>
 					</div>
 				</div>
 				<table id="tabelaServico" border="1" class="table">
 					<thead>
 						<!-- class="thead-dark"> -->
 						<tr>
 							<th>Serviço</th>
 							<th>Valor (R$)</th>
 							<th scope="col">Ação</th>
 						</tr>
 					</thead>
 				</table>
 				<div class="form-row"> <br><br><br>
					<input type="hidden" value="<?=$cliente['IDCLIENTE']?>" id="IDCLIENTE" name="IDCLIENTE"  > 
					<input type="hidden" id="itens" name="itens" />
					<input type="hidden" id="valorx" name="valorx" />
				</div>
 				<div class="form-row" style="float:right;">
 					<div class="form-group" >
 						<button type="reset" class="btn btn-danger">Cancelar</button>
 					</div>
				    <div class="form-group" style="margin-left:5px;"> 
 						<button type="submit" class="btn btn-success" id="btConfirmar" disabled="true">Cadastrar</button>
 					</div>
 				</div>
 			</form>
 		</div>
 	</div>
 	<script src="../js/jquery.min.js"></script>
 	<script src="../js/bootstrap.min.js"></script>
 	<script src="../js/scripts.js"></script>
 </body>

 </html>
