<?php

include_once("../bd.php");
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Relatórios</title>
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <script src='../../js/bootstrap.js'></script>
  <link rel="stylesheet" href="../../css/global.css">
  <link rel="stylesheet" href="../../css/paginaInicial.css">
  <link rel="stylesheet" href="../../css/style.css">
  <script src="https://kit.fontawesome.com/3b5310efad.js" crossorigin="anonymous"></script>
</head>

<body>

  <header class="topo">
    <img src="../../img/logo.png" alt="Logo do site">
    <h1>Relatórios<h1>
  </header>

  <div class="container">
    <br />
    <a href="../../paginaInicial.html">
				<label>Página Inicial</label>
			</a>
			<label> | </label>
			<label>Relatórios</label>	
    <table class="table table-borderless table-dark">
      <thead>
        <tr>
          <th scope="col">
            <center>Relatórios</center>
          </th>
        </tr>
      </thead>
    </table>
    <div class="list-group">
      <a href="relatorioGeralDiario.php" target="_blank" class="list-group-item list-group-item-action ">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">Relatório Geral Diário</h5>
          <small><?php echo strftime('%A, %d de %B de %Y', strtotime('today')); ?></small>
        </div>
        <p class="mb-1">Relatório Diário de Quantidade de Atendimentos e Lucro por Barbeiro.</p>
        <!-- <small>Donec id elit non mi porta.</small> -->
      </a>
      <a href="relatorioMensal.php" target="_blank" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">Relatório Geral Mensal</h5>
          <small class="text-muted"><?php echo strftime('%B', strtotime('today')); ?></small>
        </div>
        <p class="mb-1">Relatório Mensal de Quantidade de Atendimentos e Lucro por Barbeiro.</p>
        <!-- <small class="text-muted">Donec id elit non mi porta.</small> -->
      </a>
      <a href="relatorioGeralDiario.php" target="_blank" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">Relatório Geral Anual</h5>
          <small class="text-muted"><?php echo strftime('%Y', strtotime('today')); ?></small>
        </div>
        <p class="mb-1">Relatório Anual de Quantidade de Atendimentos e Lucro por Barbeiro.</p>
        <!-- <small class="text-muted">Donec id elit non mi porta.</small> -->
      </a>
    </div>
  </div>
</body>

</html>