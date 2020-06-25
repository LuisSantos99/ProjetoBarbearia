<?php 
    require_once '../bd.php';
	$IDBARBEIRO = filter_input(INPUT_GET,'id',FILTER_DEFAULT);
    $IDBARBEIRO=intval($IDBARBEIRO);
    $sql = "SELECT *
    FROM barbeiro WHERE IDBARBEIRO = $IDBARBEIRO"; //MEXI AQUI	
	$resultado = mysqli_query($banco,$sql);    
	$barbeiro = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Barbeiros</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/global.css">
  <link rel="stylesheet" href="../../css/paginaInicial.css">
  <script src="https://kit.fontawesome.com/3b5310efad.js" crossorigin="anonymous"></script>
</head>


<body>
  <header class="topo">
    <img src="../../img/logo.png" alt="Logo do site">
    <h1>Editar Barbeiros<h1>
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
 						<input  type="text"  value="<?= $barbeiro['NOME'] ?>" class="form-control" id="Nome" name="Nome" placeholder="Nome" required>
 					</div>
 					<div class="form-group col-md-3">
 						<label for="LabelCPF">CPF</label>
 						<input value= "<?=$barbeiro['CPF']?>" oninput="mascaraCPF(this)" type="text" class="form-control cpf-mask" id="CPF" name="CPF" placeholder="Ex.: 000.000.000-00">
 					</div>
 				</div>
				 <div class="form-group">
    					<input type="hidden" name="IDBARBEIRO" id="IDBARBEIRO" value="<?=$barbeiro['IDBARBEIRO']?>" class="form-control"  aria-describedby="ID" placeholder="IDBARBEIRO">
  				</div>
				<div class="form-row" style="float:right;">
				    <div class="form-group"> 
			   	    <button type="submit" class="btn btn-success">Editar</button>
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