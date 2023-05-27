<?php
session_start();
define('MYQL_HOST', 'localhost:3306' );
define('MYSQL_USER', 'root' );
define('MYSQL_PASSWORD', '');
define('MYSQL_DB_NAME', 'bd_sistema');

try
{
    $PDO = new PDO('mysql:host=' . MYQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD);        
}catch( PDOException $e )
{
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}

if(isset($_POST['edit'])){

  $id = $_GET['id'];

  $nome = $_POST['nome'];
  $endereco = $_POST['endere'];
  $bairro = $_POST['bairro'];
  $cidade = $_POST['cidade'];
  $estado = $_POST['estado'];
  $cep = $_POST['cep'];

 
  $sql = "UPDATE clientes SET nome='$nome', endereco='$endereco', bairro='$bairro', cidade='$cidade', estado='$estado', cep='$cep' WHERE id = $id";

  $result = $PDO->query($sql);

  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP -- Sistema de cadastro ao banco de dados</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg" id="navbar" >
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="cadastro.php">Cadastro</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Consultar</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container" id="container2">
<div class="formulario">
    <form  method="POST"> 
                <h2>Editar - Dados</h2>
                <div class="mb-4">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" name="nome" value="<?php echo $_GET['nome']; ?>" id="nome"  required></input>
                </div>
                <div class="mb-4">
                    <label for="endere" class="form-label">Endereço:</label>
                    <input type="text" class="form-control" name="endere" value="<?php echo $_GET['endereco']; ?>" id="endere" required></input>
                </div>
                <div class="mb-4">
                    <label for="bairro" class="form-label">Bairro:</label>
                    <input type="text" class="form-control" id="bairro"  value="<?php echo $_GET['bairro']; ?>" name="bairro" required></input>
                </div>
                <div class="mb-4">
                    <label for="cep" class="form-label">Cep</label>
                    <input type="number" class="form-control" id="cep" value="<?php echo $_GET['cep']; ?>" name="cep" required></input>
                </div>
                <div class="mb-4">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="cidade" value="<?php echo $_GET['cidade']; ?>" name="cidade" required></input>
                </div>
                <div class="mb-4">
                <label for="select" class="form-label">Estado</label>
                <select class="form-select" aria-label="select" name="estado" id="estado">
                <option selected="selected"><?php echo $_GET['estado']; ?></option>
                    <option value="Sp">SP</option>
                    <option value="Rj">RJ</option>
                </select>
                </div>
                <div class="mb-4">
                <input type="submit" value="Editar" name="edit" id="botãosub" class="btn btn-primary mb-3">
                </div> 
    </form>        
</div>            
</div>    

</body>
</html>