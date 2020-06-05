<!DOCTYPE html>
<html lang="pt-br"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Barbeiros </title>
    <link rel="stylesheet" href="../../css/adm.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
   <h1>Cadastro de Barbeiros</h1> 
   <hr>
   <div class="container">
    <form action="inserir_proc.php" method="post">
        <label for="NOME"> Nome Barbeiro</label><br>
        <input type="text"  class ="form-control" id="NOME" name="NOME" required><br>
        <label for="CPF"> CPF</label><br>
        <input type="text"  class ="form-control" id="cpf" name="cpf" required><br>
        <!-- <input type="text" class="form-control cpf-mask" placeholder="Ex.: 000.000.000-00"> -->
        <!-- <input type="text" class="form-control" onkeypress="$(this).mask('000.000.000-00');"> -->
        <button type="reset"  class="btn btn-danger"  name="btcancelar" id="btcancelar" >Cancelar</button> <!--volta para a ela de lstagem de babeiros -->
       
        <!-- <button type="submit">Limpar</button> -->
        <button type="reset"  class="btn btn-warning"  name="btLimpar" id="btLimpar" >Limpar</button>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
    </div>
   </hr>
</body>
</html>
