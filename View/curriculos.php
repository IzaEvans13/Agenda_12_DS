<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Projeto</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
        /* A cor de fundo geral da imagem (cinza bem claro) */
        .w3-light-gray-background {
            background-color: #f1f1f1 !important; 
        }

        /* O azul ciano forte que domina a imagem e os botões de ação */
        .w3-cyan-strong {
            background-color: #00A9E0 !important; /* Ex: #00A9E0 */
            color: white !important;
        }

        /* Cor de texto para títulos e destaques */
        .w3-text-cyan-strong {
            color: #00A9E0 !important;
        }
        
        /* Ajuste a fonte para ser mais simples e limpa, como no W3.CSS */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 15px; /* Tamanho padrão W3.CSS */
        }

        /* Estilo para os cards de conteúdo */
        .w3-card-custom {
            /* w3-card-4 para sombra e w3-white para o fundo */
            box-shadow: 0 4px 10px 0 rgba(0,0,0,0.2), 0 4px 20px 0 rgba(0,0,0,0.19);
            border-radius: 8px; /* Borda arredondada suave */
        }
    </style>
</head>
<body class="w3-light-gray-background">
    
<?php
// ... Inclua o HTML do Passo 1 (<html>, <head>, <body>)
include 'conexao.php';

$sql = "SELECT * FROM curriculos";
$result = $conn->query($sql);
?>

<div class="w3-content w3-margin-top w3-padding-large" style="max-width:900px;">

    <h1 class="w3-text-cyan-strong w3-large w3-border-bottom w3-border-cyan-strong w3-padding-16">
        <i class="fa fa-list-alt"></i> Listagem de Currículos
    </h1>

    <p>
        <a href="index.php" class="w3-button w3-round w3-cyan-strong w3-hover-blue w3-padding">
            <i class="fa fa-arrow-left"></i> Voltar / Novo Cadastro
        </a>
    </p>

<?php
if ($result->num_rows > 0) {
    while ($curriculo = $result->fetch_assoc()) {
        
        // Cada currículo como um "card" com estilo da imagem (w3-card-custom e fundo branco)
        echo "<div class='w3-card-custom w3-white w3-margin-bottom w3-padding'>"; 
        
        // Nome em destaque
        echo "<h2 class='w3-text-cyan-strong'>" . $curriculo['nome'] . "</h2>";
        echo "<p><i class='fa fa-envelope w3-text-gray'></i> Email: " . $curriculo['email'] . "</p>";
        echo "<p><i class='fa fa-phone w3-text-gray'></i> Telefone: " . $curriculo['telefone'] . "</p>";

        echo "<hr class='w3-border-light-gray'>"; // Divisor visual

        // Estruturas de Formações e Experiências (Listas limpas)
        
        // Formações
        $id = $curriculo['id'];
        $res_formacoes = $conn->query("SELECT * FROM formacoes WHERE id_curriculo = $id");
        if ($res_formacoes->num_rows > 0) {
            echo "<h4><i class='fa fa-graduation-cap w3-text-cyan-strong'></i> Formações:</h4>";
            echo "<ul class='w3-ul w3-hoverable'>"; // Lista clean
            while ($f = $res_formacoes->fetch_assoc()) {
                echo "<li>" . $f['curso'] . " - " . $f['instituicao'] . " (" . $f['ano_conclusao'] . ")</li>";
            }
            echo "</ul>";
        }
        
        // Experiências
        $res_exp = $conn->query("SELECT * FROM experiencias WHERE id_curriculo = $id");
        if ($res_exp->num_rows > 0) {
            echo "<h4><i class='fa fa-briefcase w3-text-cyan-strong'></i> Experiências:</h4>";
            echo "<ul class='w3-ul w3-hoverable'>";
            while ($e = $res_exp->fetch_assoc()) {
                echo "<li>" . $e['cargo'] . " - " . $e['empresa'] . " (" . $e['periodo'] . ")</li>";
            }
            echo "</ul>";
        }

        echo "</div>"; // Fecha o w3-card-custom
    }
} else {
    // Mensagem de erro estilizada com a cor do site
    echo "<div class='w3-panel w3-cyan-strong w3-round'>";
    echo "<p><i class='fa fa-exclamation-triangle'></i> Nenhum currículo cadastrado.</p>";
    echo "</div>";
}

$conn->close();
?>
</div> 
</body>
</html>