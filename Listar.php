<?php
session_start();
include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>CRUD</title>
    </head>
    <body>
        <a href="Index.php">Cadastrar</a><br/>
        <a href="listar.php">Listar</a><br/>
        <h1>Listar Funcionario</h1>
        <?php
            if (isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            
            $stmt = "SELECT * FROM funcionarios" ;
            $resultSet = mysqli_query($conn, $stmt);
           
            while($row = mysqli_fetch_assoc($resultSet)){
                echo "ID: " . $row['Id'] . "<br/>";
                echo "NOME: " . $row['Nome'] . "<br/>";
                echo "EMAIL: " . $row['Email'] . "<br/>";
                echo "CPF: " . $row['Cpf'] . "<br/>";
                echo "DATA DE NASCIMENTO: " . $row['DataNascimento'] . "<br/>";
                echo "<a href='Editar.php?id=" . $row['Id'] . "'>Editar</a><br/>";
                echo "<a href='Remover.php?id=" . $row['Id'] . "'>Remover</a><br/><hr/>";
            }
            ?>
        
        
    </body>

</html>


