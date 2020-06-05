<?php 
    require_once '../bd.php';
    $sql = "SELECT IDCLIENTE,NOME,DATANASC,CPF,DDD,TELEFONE,RG,ATIVO 
    FROM clientes WHERE IDCLIENTE = 13"; //MEXI AQUI	
    $resultado = mysqli_query($banco,$sql);
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
            while($clientes = mysqli_fetch_assoc($resultado)):
      ?>

      <tr>
          <td><?= $clientes ['NOME']?></td>
          <td><?= $clientes ['DATANASC']?> </td>
          <td><?= $clientes ['CPF']?></td>
          <td><?= $clientes ['RG']?></td>
          <td><?= $clientes ['TELEFONE']?></td>
          <td> 
            <a class="btn btn-success" href ="editar.php?id=<?=$clientes['IDCLIENTE'] ?>"role="button"> Editar  </a>
            <a class="btn btn-danger" href ="excluir.php?id=<?=$clientes['IDCLIENTE'] ?>"role="button">  Excluir</a>
          </td>
      </tr>
            <?php endwhile; ?>
  </tbody>
</table>
    
</body>
</html>