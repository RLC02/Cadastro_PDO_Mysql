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
$nome = $_POST['nome'];
$endereco = $_POST['endere'];
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];


$_SESSION['nome'] = $nome;
$_SESSION['endere'] = $endereco;
$_SESSION['bairro'] = $bairro;
$_SESSION['cep'] = $cep;
$_SESSION['cidade'] = $cidade;
$_SESSION['estado'] = $estado;



    
$sql = "INSERT INTO clientes (nome, endereco, bairro, cep, cidade, estado)
VALUES (:nome, :endereco, :bairro, :cep, :cidade, :estado)";

$stmt = $PDO->prepare($sql);

$stmt->execute(['nome' => $nome, 'endereco' => $endereco,'bairro' => $bairro,'cep' => $cep,'cidade' => $cidade,'estado' => $estado]);

header("Location: index.php");
exit();
?>