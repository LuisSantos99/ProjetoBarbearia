<?php

require_once("../bd.php");
$pesquisa = filter_input(INPUT_POST, 'pesquisa', FILTER_DEFAULT);

if ($pesquisa == NULL) {
  $sql = "SELECT * FROM CLIENTES ORDER BY NOME";
} else {
  $sql = "SELECT * FROM CLIENTES WHERE NOME LIKE '%" . $pesquisa . "%' ORDER BY NOME";
}
$resultado = mysqli_query($banco, $sql);

/* FUNÇÃO EM PHP PARA CARREGAR NA TABELA DE ACORDO COM A PESQUISA 
   SE ESSE INPUT ESTIVER VAZIO PESQUISAR TODOS, SE CLICAR NO BOTAO PESQUISAR
   TRAZER DE ACORDO COM NOME
   (sys_class_name)  */
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> Clientes </title>
  <script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
  <meta name="description" content="Verificar.com">
  <meta name="author" content="BarbeariaMustache!">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="../css/style.css" rel="stylesheet"> -->
  <link href="../../css/PesquisaCliente.css" rel="stylesheet">
  <script src='../../js/Funcoes.js'></script>
</head>

<body>
  <div class="container">
    <br>
    <form name="frmBusca" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?a=buscar">
      <div class="form-row">
        <div class="form-group col-md-9">
          <input class="form-control mr-sm-2" type="search" name="pesquisa" id="pesquisa" placeholder="Pesquisar" aria-label="Pesquisar">
        </div>
        <div class="form-group col-md-3">
          <button class="btn btn-info" id='btPesquisar'  type="submit">Pesquisar</button>
        </div>
      </div>
    </form>
    <form method='post' action='InserirAtendimento.php' enctype='multipart/form-data'>
      <table class="table" id='minhaTabela'>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
          </tr>
        </thead>
        <?php
        while ($clientes = mysqli_fetch_assoc($resultado)) :
        ?>
          <tbody>
            <tr>
              <td> <?= $clientes['IDCLIENTE'] ?> </td>
              <td> <?= $clientes['NOME'] ?> </td>
              <td> <?= $clientes['CPF'] ?> </td>
              <td> <?= $clientes['DDD'] ?> <?= $clientes['TELEFONE'] ?> </td>
              </td>
            </tr>
          </tbody>
        <?php endwhile; ?>
      </table>
	  <?php 
		if (isset($_GET['erro'])){
			if($_GET['erro'] == 1){
				echo "<div class='alert alert-danger' role='alert'> Nenhum cliente selecionado!  </div>";
			}
		}
	  ?>
      <input type="hidden" name="idCliente" id="idCliente">
      <br>
      <div class="form-row">	    
        <button class="btn btn-success" id="IniciarAtend" name="IniciarAtend" type="submit">Iniciar atendimento</button>
      </div>
      <script>
        window.onload = function() {
          document.addEventListener('keypress', function(evento) {
            var origem = evento.target || evento.srcElement;
            var tecla = evento.which || evento.keyCode;

            switch (origem.id) {
              case 'Facul':
                if (tecla == 13) {
                  document.getElementById('btAdicionar').click();
                }
                break;
			  case 'pesquisa':
				if (tecla == 13){
					document.getElementById('btPesquisar').click();
				}
				break;
            }
          });
		  document.addEventListener('click', function(evento) {
			var selecionados = tabela.getElementsByClassName("selecionado");
			var origem = evento.target || evento.srcElement;
            switch(origem.id){
				case 'IniciarAtend':
					//Verificar se está selecionado			
					if (selecionados.length < 1) {
					//	document.write("<div class='alert alert-danger' role='alert'> Nenhum cliente selecionado!  </div>");			  
					return false;
					}else 
						document.getElementById("IniciarAtend").submit();				
					var dados = "";
					for (var i = 0; i < selecionados.length; i++) {
						var selecionado = selecionados[i];
						selecionado = selecionado.getElementsByTagName("td");
					}
				break;			
			}
          });
        };
      </script>
    </form>
  </div>
</body>
<script src='../js/PesquisaCliente.js'></script>

</html>
