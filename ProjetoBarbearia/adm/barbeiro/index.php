<?php 
    require_once '../bd.php';
    $sql = "SELECT *
    FROM barbeiro WHERE IDBARBEIRO"; //MEXI AQUI
    $resultado = mysqli_query($banco,$sql);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Barbeiros</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/adm.css">
</head>
<body>

    <h1>Listar Barbeiros</h1>
    <a href="inserir_barbeiro.php">Inserir Barbeiro</a>
    <hr>
    <table class="table table-borderless table-dark">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
    </tr>
  </thead>
  <tbody>
  <?php 
            while($barbeiro = mysqli_fetch_assoc($resultado)):
      ?>

      <tr>
          <td><?= $barbeiro ['NOME']?></td>
          <td><?= $barbeiro ['CPF']?></td>
          <td> 
            <a class="btn btn-success" href ="editar.php?id=<?=$barbeiro['IDBARBEIRO'] ?>"role="button"> Editar  </a>
            <a class="btn btn-danger" href ="excluir.php?id=<?=$barbeiro['IDBARBEIRO'] ?>"role="button">  Excluir</a>
          </td>
      </tr>
            <?php endwhile; ?>
  </tbody>
</table>
    
</body>
</html>
