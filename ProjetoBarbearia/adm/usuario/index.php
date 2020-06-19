<?php 
    require_once '../bd.php';
    $sql = "SELECT *
    FROM usuarios WHERE IDUSUARIO"; //MEXI AQUI	
    $resultado = mysqli_query($banco,$sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/adm.css">
</head>
<body>

    <h1>Listar Usuários</h1>
    <a class="botao" href="inserir.php">Inserir Usuário</a>
    <hr>
    <table class="table table-borderless table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Login</th>
      <th scope="col">Senha</th>
      <th scope="col">Nome do Barbeiro</th>
    </tr>
  </thead>
  <tbody>
  <?php 
            while($usuario = mysqli_fetch_assoc($resultado)):
      ?>

      <tr>
          <td><?= $usuario ['IDUSUARIO']?></td>
          <td><?= $usuario ['LOGIN']?> </td>
          <td><?= $usuario ['SENHA']?></td>
          <td><?= $usuario ['IDBARBEIRO']?></td>
          <td> 
            <a class="btn btn-success" href ="editar.php?id=<?=$usuario['IDUSUARIO'] ?>"role="button"> Editar  </a>
            <a class="btn btn-danger" href ="excluir.php?id=<?=$usuario['IDUSUARIO'] ?>"role="button">  Excluir</a>
          </td>
      </tr>
            <?php endwhile; ?>
  </tbody>
</table>
    
</body>
</html>
