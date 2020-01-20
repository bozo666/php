<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$dataNascimento = filter_input(INPUT_POST, 'dataNascimento', FILTER_SANITIZE_STRING);


$stmt = "UPDATE funcionarios SET Nome ='$nome', Email='$email', Cpf='$cpf', DataNascimento='$dataNascimento' WHERE Id ='$id'";
$resultSet= mysqli_query($conn, $stmt);

if(mysqli_affected_rows($conn)){
    $_SESSION['msg']  = "<p style='color:blue'>  Funcionario editado! </p>" ;
    header("Location: Listar.php");
} else{
    $_SESSION['msg']  = "<p style='color:red'>  Erro ao tentar editar! </p>" ;
    header("Location: Editar.php?id=$id");
}

?>