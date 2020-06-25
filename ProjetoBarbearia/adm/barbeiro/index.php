<?php
require_once '../bd.php';
$pesquisa = filter_input(INPUT_POST, 'pesquisa', FILTER_DEFAULT);

if ($pesquisa == NULL) {
  $sql = "SELECT IDBARBEIRO,NOME,CPF
        FROM Barbeiro ORDER BY NOME";
} else {
  $sql = "SELECT IDBARBEIRO,NOME,CPF
                FROM Barbeiro WHERE NOME LIKE '%" . $pesquisa . "%'  ORDER BY NOME";
}
$resultado = mysqli_query($banco, $sql);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar Barbeiros</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/global.css">
  <link rel="stylesheet" href="../../css/paginaInicial.css">

  <script src="https://kit.fontawesome.com/3b5310efad.js" crossorigin="anonymous"></script>
</head>

<body>
  <header class="topo">
    <img src="../../img/logo.png" alt="Logo do site">
    <h1>Barbeiros<h1>
        <a class="botao" href="../../logout.php">Sair (X)</a>
  </header>

  <div class="container">
    <div class="form-row" style="margin-top:10px;">
      <div class="form-group col-md-11">
        <a href="../../paginaInicial.html">
          <label> Página Inicial </label>
        </a>
        <label>|</label>
        <label>Barbeiros</label>
      </div>
      <div class="form-group col-md">
        <a href="inserir_barbeiro.php">
          <button class="btn btn-danger" id='btInserir' style="width:80px; height:30px;">
            <i class="fas fa-plus-circle service-icon" id="btInserir" style="font-size:2vw; margin-top :-6px;"></i>
          </button>
        </a>
      </div>
    </div>
    <form name="frmBusca" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?a=buscar">
      <div class="form-row" style="margin-top:10px;">
        <div class="form-group col-md-10">
          <input class="form-control mr-sm-" type="search" name="pesquisa" id="pesquisa" placeholder="Pesquisar" aria-label="Pesquisar">
        </div>
        <div class="form-group col-md-1" id="btPesquisar">
          <button class="btn btn-info" id='btPesquisar' type="submit" style="width:120px; height:40px;">
            <i class="fas fa-search service-icon" id="btPesquisar" style="font-size:2vw;"></i>
          </button>
        </div>
      </div>
    </form>
    <table class="table table-bordered" style="background-color: white;">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">CPF</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($barbeiro = mysqli_fetch_assoc($resultado)) :
        ?>

          <tr>
            <td><?= $barbeiro['NOME'] ?></td>
            <td><?= $barbeiro['CPF'] ?></td>
            <td>
              <a class="btn btn-success" href="editar.php?id=<?= $barbeiro['IDBARBEIRO'] ?>" role="button">
                <i class="fas fa-edit service-icon" id="btEditar" style="font-size:0.7vw; "></i>
              </a>
              <a class="btn btn-danger" href="excluir.php?id=<?= $barbeiro['IDBARBEIRO'] ?>" role="button">
                <i class="fas fa-trash service-icon" id="btExcluir" style="font-size:0.7vw; "></i>
              </a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

</body>

</html>