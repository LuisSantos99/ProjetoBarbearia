<?php
require_once '../bd.php';
$sql = "SELECT *
    FROM usuarios U INNER JOIN BARBEIRO B WHERE B.IDBARBEIRO = U.IDBARBEIRO"; //MEXI AQUI	
$resultado = mysqli_query($banco, $sql);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar Usuários</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/global.css">
  <link rel="stylesheet" href="../../css/paginaInicial.css">
  <script src="https://kit.fontawesome.com/3b5310efad.js" crossorigin="anonymous"></script>
</head>

<body>
  <header class="topo">
    <img src="../../img/logo.png" alt="Logo do site">
    <h1>Usuários<h1>
        <a class="botao" href="../../logout.php">Sair (X)</a>
  </header>
  <div class="container">
    <div class="form-row" style="margin-top:10px;">
      <div class="form-group col-md-11">
        <a href="../../paginaInicial.html">
          <label> Página Inicial </label>
        </a>
        <label>|</label>
        <label>Usuários</label>
      </div>
      <div class="form-group col-md">
        <a href="inserir.php">
          <button class="btn btn-danger" id='btInserir' style="width:80px; height:30px;">
            <i class="fas fa-plus-circle service-icon" id="btInserir" style="font-size:2vw; margin-top :-6px;"></i>
          </button>
        </a>
      </div>
    </div>

    <table class="table table-bordered" style="background-color: white;">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Login</th>
          <th scope="col">Nome do Barbeiro</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($usuario = mysqli_fetch_assoc($resultado)) :
        ?>

          <tr>
            <td><?= $usuario['IDUSUARIO'] ?></td>
            <td><?= $usuario['LOGIN'] ?> </td>
            <td><?= $usuario['NOME'] ?></td>
            <td>
              <a class="btn btn-success" href="editar.php?id=<?= $usuario['IDUSUARIO'] ?>" role="button">
                <i class="fas fa-edit service-icon" id="btEditar" style="font-size:0.7vw; "></i> </a>
              <a class="btn btn-danger" href="excluir.php?id=<?= $usuario['IDUSUARIO'] ?>" role="button">
                <i class="fas fa-trash service-icon" id="btExcluir" style="font-size:0.7vw; "></i></a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>

</html>