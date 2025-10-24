<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Currículo</title>
</head>
<body>
    <h1>Cadastro de Currículo</h1>
    <form action="salvar.php" method="post">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email"><br><br>

        <label>Telefone:</label><br>
        <input type="text" name="telefone"><br><br>

        <h3>Formações</h3>
        <div id="formacoes">
            <div>
                <input type="text" name="curso[]" placeholder="Curso">
                <input type="text" name="instituicao[]" placeholder="Instituição">
                <input type="text" name="ano[]" placeholder="Ano de Conclusão">
            </div>
        </div>
        <button type="button" onclick="adicionarFormacao()">Adicionar Formação</button><br><br>

        <h3>Experiências</h3>
        <div id="experiencias">
            <div>
                <input type="text" name="cargo[]" placeholder="Cargo">
                <input type="text" name="empresa[]" placeholder="Empresa">
                <input type="text" name="periodo[]" placeholder="Período">
            </div>
        </div>
        <button type="button" onclick="adicionarExperiencia()">Adicionar Experiência</button><br><br>

        <input type="submit" value="Salvar Currículo">
    </form>

    <script>
        function adicionarFormacao() {
            let div = document.createElement('div');
            div.innerHTML = '<input type="text" name="curso[]" placeholder="Curso"> ' +
                            '<input type="text" name="instituicao[]" placeholder="Instituição"> ' +
                            '<input type="text" name="ano[]" placeholder="Ano de Conclusão">';
            document.getElementById('formacoes').appendChild(div);
        }

        function adicionarExperiencia() {
            let div = document.createElement('div');
            div.innerHTML = '<input type="text" name="cargo[]" placeholder="Cargo"> ' +
                            '<input type="text" name="empresa[]" placeholder="Empresa"> ' +
                            '<input type="text" name="periodo[]" placeholder="Período">';
            document.getElementById('experiencias').appendChild(div);
        }
    </script>
</body>
</html>
