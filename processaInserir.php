<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$dataNascimento = filter_input(INPUT_POST, 'dataNascimento', FILTER_SANITIZE_STRING);

$checaCPF = $_POST['cpf'];
$sql = "SELECT * FROM funcionarios WHERE Cpf = '$checaCPF'";
$executeQuery = mysqli_query($conn, $sql);
$busca = mysqli_num_rows($executeQuery);


$cpf = preg_replace("/[^0-9]/", "", $cpf);

//echo "nome: $nome <br/>";
//echo "email: $email";

if($busca == '0'){
$stmt = "INSERT INTO funcionarios(Nome, Email, Cpf, DataNascimento) VALUES ('$nome', '$email', '$cpf', '$dataNascimento')";

$resultSet= mysqli_query($conn, $stmt);

if(mysqli_insert_id($conn)){
    $_SESSION['msg']  = "<p style='color:blue'>  Funcionario Cadastrado! </p>" ;
    header("Location: Index.php");
} else{
    $_SESSION['msg']  = "<p style='color:red'>  Erro ao cadastrar! </p>" ;
    header("Location: Index.php");
}

} else{
    $_SESSION['msg']  = "<p style='color:red'>  Cpf ja existente! </p>" ;
    header("Location: Index.php");
}


?>