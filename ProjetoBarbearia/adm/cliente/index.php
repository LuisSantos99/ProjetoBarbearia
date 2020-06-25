<?php
require_once '../bd.php';

$pesquisa = filter_input(INPUT_POST, 'pesquisa', FILTER_DEFAULT);
$radio = filter_input(INPUT_POST, 'radio', FILTER_DEFAULT);

if ($radio == NULL)
  $radio = 'ativo';

if ($pesquisa == NULL) {

  if ($radio == 'ativo')
    $sql = "SELECT IDCLIENTE,NOME,DATE_FORMAT(DATANASC,'%d/%m/%Y') AS DATANASC,RG,CPF,TELEFONE 
            FROM CLIENTES WHERE ATIVO = 'on' ORDER BY NOME";
  else  if ($radio == 'inativo')
    $sql = "SELECT IDCLIENTE,NOME,DATE_FORMAT(DATANASC,'%d/%m/%Y') AS DATANASC,RG,CPF,TELEFONE  
            FROM CLIENTES WHERE ATIVO = '0' ORDER BY NOME";

  else
    $sql = "SELECT IDCLIENTE,NOME,DATE_FORMAT(DATANASC,'%d/%m/%Y') AS DATANASC,RG,CPF,TELEFONE 
    FROM CLIENTES ORDER BY NOME";
} else {

  if ($radio == 'ativo')
    $sql = "SELECT IDCLIENTE,NOME,DATE_FORMAT(DATANASC,'%d/%m/%Y') AS DATANASC,RG,CPF,TELEFONE 
            FROM CLIENTES WHERE NOME LIKE '%" . $pesquisa . "%' AND ATIVO = 'on' ORDER BY NOME";
  else if ($radio == 'inativo')
    $sql = "SELECT IDCLIENTE,NOME,DATE_FORMAT(DATANASC,'%d/%m/%Y') AS DATANASC,RG,CPF,TELEFONE  
            FROM CLIENTES WHERE NOME LIKE '%" . $pesquisa . "%' AND ATIVO = '0' ORDER BY NOME";
  else
    $sql = "SELECT IDCLIENTE,NOME,DATE_FORMAT(DATANASC,'%d/%m/%Y') AS DATANASC,RG,CPF,TELEFONE 
            FROM CLIENTES WHERE NOME LIKE '%" . $pesquisa . "%'  ORDER BY NOME";
}

$resultado = mysqli_query($banco, $sql);
$_POST['radio'] = $radio;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar Clientes</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/global.css">
  <link rel="stylesheet" href="../../css/paginaInicial.css">

  <script src="https://kit.fontawesome.com/3b5310efad.js" crossorigin="anonymous"></script>
</head>

<body>
  <header class="topo">
    <img src="../../img/logo.png" alt="Logo do site">
    <h1>Clientes<h1>
        <a class="botao" href="../../logout.php">Sair (X)</a>
  </header>

  <div class="container">
    <div class="form-row" style="margin-top:10px;">
      <div class="form-group col-md-11">
        <a href="../../paginaInicial.html">
          <label> Página Inicial </label>
        </a>
        <label>|</label>
        <label>Clientes</label>
      </div>
      <div class="form-group col-md">
        <a href="cadastro_cliente.php">
          <button class="btn btn-danger" id='btInserir' style="width:80px; height:30px;">
            <i class="fas fa-plus-circle service-icon" id="btInserir" style="font-size:2vw; margin-top :-6px;"></i>
          </button>
        </a>
      </div>
    </div>

    <form name="frmBusca" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?a=buscar">
      <div class="form-row" style="margin-top:10px; ">
        <br>
        <div class="form-group col-md-" style="padding-top: 5px;">
          <label for="cor1">Filtrar por:</label>
        </div>
        <div class="form-group col-md-" style="padding-top: 5px;">
          <input id="ativo" type="radio" name="radio" value="ativo" <?php echo ($radio == "ativo") ? "checked" : null; ?> />
          <label for="cor1">Ativos</label>
        </div>
        <div class="form-group col-md-" style="padding-top: 5px;">
          <input id="inativo" type="radio" name="radio" value="inativo" value="ativo" <?php echo ($radio == "inativo") ? "checked" : null; ?> />
          <label for="cor2">Inativos</label>
        </div>
        <div class="form-group col-md-" style="padding-top: 5px;">
          <input id="ambos" type="radio" name="radio" value="ambos" value="ativo" <?php echo ($radio == "ambos") ? "checked" : null; ?> />
          <label for="cor3">Ambos</label>
        </div>
        <div class="form-group col-md-" style="margin-left: 15px;">

        </div>
        <div class="form-group col-md-7">
          <input class="form-control mr-sm-" type="search" name="pesquisa" id="pesquisa" placeholder="Pesquisar" aria-label="Pesquisar">
        </div>
        <div class="form-group col-md-" id="btPesquisar">
          <button class="btn btn-info" id='btPesquisar' type="submit" style="width:120px; height:40px;">
            <i class="fas fa-search service-icon" id="btPesquisar" style="font-size:2vw;"></i>
          </button>
        </div>
      </div>
      <hr>
    </form>

    <table class="table table-bordered" style="background-color: white;">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Data de Nascimento</th>
          <th scope="col">CPF</th>
          <th scope="col">RG</th>
          <th scope="col">Telefone</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($clientes = mysqli_fetch_assoc($resultado)) :
        ?>

          <tr>
            <td><?= $clientes['NOME'] ?></td>
            <td><?= $clientes['DATANASC'] ?> </td>
            <td><?= $clientes['CPF'] ?></td>
            <td><?= $clientes['RG'] ?></td>
            <td><?= $clientes['TELEFONE'] ?></td>
            <td>
              <!-- COLOCAR ICONES -->
              <center>
                <a class="btn btn-success" href="editar.php?id=<?= $clientes['IDCLIENTE'] ?>" role="button" style="height:30px;">
                  <i class="fas fa-edit service-icon" id="btEditar" style="font-size:0.7vw; "></i>
                </a>

                <a class="btn btn-danger" href="excluir.php?id=<?= $clientes['IDCLIENTE'] ?>" role="button" style="height:30px;">
                  <i class="fas fa-trash service-icon" id="btExcluir" style="font-size:0.7vw; "></i>
                </a>
              </center>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

</body>

</html>