<?php
// dados de conexão
$servername = "localhost";   // geralmente localhost
$username = "root";          // seu usuário do MySQL
$password = "";              // sua senha do MySQL
$dbname = "cadastro_curriculos"; // nome do banco que criamos

// criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// checando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// echo "Conexão realizada com sucesso!"; // só para teste
?>
