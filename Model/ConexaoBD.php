<?php
class ConexaoBD
{
    // ATRIBUTOS PRIVADOS (Mude os valores conforme seu BD)
    private $serverName = "localhost"; // Exemplo do PDF [cite: 520]
    private $userName = "root";       // Exemplo do PDF [cite: 527]
    private $password = "";       // Exemplo do PDF [cite: 528]
    private $dbName = "projeto_final"; // Nome da base de dados [cite: 529]

    // MÉTODO CONECTAR()
    public function conectar()
    {
        // Cria uma nova conexão mysqli
        $conn = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
        // Retorna o objeto de conexão [cite: 536]
        return $conn;
    }
}
?>