<?php
require_once '../bd.php';

$pesquisa = filter_input(INPUT_POST, 'pesquisa', FILTER_DEFAULT);
$radio = filter_input(INPUT_POST, 'radio', FILTER_DEFAULT);

if ($radio == NULL)
  $radio = 'ativo';

if ($pesquisa == NULL) {

  if ($radio == 'ativo')
    $sql = "SELECT * FROM CLIENTES WHERE ATIVO = 'on' ORDER BY NOME";
  else  if ($radio == 'inativo')
    $sql = "SELECT * FROM CLIENTES WHERE ATIVO = '0' ORDER BY NOME";

  else
    $sql = "SELECT * FROM CLIENTES ORDER BY NOME";
} else {

  if ($radio == 'ativo')
    $sql = "SELECT * FROM CLIENTES WHERE NOME LIKE '%" . $pesquisa . "%' AND ATIVO = 'on' ORDER BY NOME";
  else if ($radio == 'inativo')
    $sql = "SELECT * FROM CLIENTES WHERE NOME LIKE '%" . $pesquisa . "%' AND ATIVO = '0' ORDER BY NOME";
  else
    $sql = "SELECT * FROM CLIENTES WHERE NOME LIKE '%" . $pesquisa . "%'  ORDER BY NOME";
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
  <link rel="stylesheet" href="../../css/adm.css">
</head>

<body>

  <h1>Listar Clientes</h1>
  <hr>
  <form name="frmBusca" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?a=buscar">
    <div class="form-row">
      <div class="form-group col-md-">
        <label for="cor1">Filtrar por:</label>
      </div>
      <div class="form-group col-md-">
        <input id="ativo" type="radio" name="radio" value="ativo" <?php echo ($radio == "ativo") ? "checked" : null; ?> />
        <label for="cor1">Ativos</label>
      </div>
      <div class="form-group col-md-">
        <input id="inativo" type="radio" name="radio" value="inativo" value="ativo" <?php echo ($radio == "inativo") ? "checked" : null; ?> />
        <label for="cor2">Inativos</label>
      </div>
      <div class="form-group col-md-">
        <input id="ambos" type="radio" name="radio" value="ambos" value="ativo" <?php echo ($radio == "ambos") ? "checked" : null; ?> />
        <label for="cor3">Ambos</label>
      </div>
      <div class="form-group col-md-7">
        <input class="form-control mr-sm-2" type="search" name="pesquisa" id="pesquisa" placeholder="Pesquisar" aria-label="Pesquisar">

      </div>
      <div class="form-group col-md-2">
        <button class="btn btn-info" id='btPesquisar' type="submit">Pesquisar</button>
        <img scr="../../img/pesquisar.png">
      </div>
    </div>
  </form>

  <table class="table table-borderless table-dark">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Data de Nascimento</th>
        <th scope="col">CPF</th>
        <th scope="col">RG</th>
        <th scope="col">Telefone</th>
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
            <a class="btn btn-success" href="editar.php?id=<?= $clientes['IDCLIENTE'] ?>" role="button"> Editar </a>
            <a class="btn btn-danger" href="excluir.php?id=<?= $clientes['IDCLIENTE'] ?>" role="button"> Excluir</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

</body>

</html>