<?php
include 'conexao.php';

// dados principais
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

// inserindo currículo
$sql = "INSERT INTO curriculos (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')";
if ($conn->query($sql) === TRUE) {
    $id_curriculo = $conn->insert_id;

    // inserindo formações
    $cursos = $_POST['curso'];
    $instituicoes = $_POST['instituicao'];
    $anos = $_POST['ano'];

    for ($i=0; $i < count($cursos); $i++) {
        if(!empty($cursos[$i])){
            $sql_f = "INSERT INTO formacoes (id_curriculo, curso, instituicao, ano_conclusao) VALUES ('$id_curriculo', '".$cursos[$i]."', '".$instituicoes[$i]."', '".$anos[$i]."')";
            $conn->query($sql_f);
        }
    }

    // inserindo experiências
    $cargos = $_POST['cargo'];
    $empresas = $_POST['empresa'];
    $periodos = $_POST['periodo'];

    for ($i=0; $i < count($cargos); $i++) {
        if(!empty($cargos[$i])){
            $sql_e = "INSERT INTO experiencias (id_curriculo, cargo, empresa, periodo) VALUES ('$id_curriculo', '".$cargos[$i]."', '".$empresas[$i]."', '".$periodos[$i]."')";
            $conn->query($sql_e);
        }
    }

    echo "Currículo cadastrado com sucesso! <a href='curriculos.php'>Ver todos os currículos</a>";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>
