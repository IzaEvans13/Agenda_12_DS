<?php

class Usuario
{
    // 3.1. ATRIBUTOS PRIVADOS (Página 5)
    private $id;
    private $nome;
    private $cpf;
    private $email;
    private $dataNascimento;
    private $senha;

    // 3.2. MÉTODOS GETTERS e SETTERS (Página 6)
    // ID
    public function setID($id) { $this->id = $id; }
    public function getID() { return $this->id; }

    // Nome
    public function setNome($nome) { $this->nome = $nome; }
    public function getNome() { return $this->nome; }

    // CPF
    public function setCPF($cpf) { $this->cpf = $cpf; }
    public function getCPF() { return $this->cpf; }

    // Email
    public function setEmail($email) { $this->email = $email; }
    public function getEmail() { return $this->email; }

    // Data de nascimento
    public function setDataNascimento($dataNascimento) { $this->dataNascimento = $dataNascimento; }
    public function getDataNascimento() { return $this->dataNascimento; }

    // Senha
    public function setSenha($senha) { $this->senha = $senha; }
    public function getSenha() { return $this->senha; }

    // 3.3. MÉTODO inserirBD() (Página 7)
    public function inserirBD()
    {
        // Inclui a classe de conexão e conecta ao BD [cite: 205, 206]
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Sentença SQL para inserção (apenas nome, cpf, email, senha no 1º momento) [cite: 211, 212]
        $sql = "INSERT INTO usuario (nome, cpf, email, senha) VALUES ('".$this->nome."', '".$this->cpf."' , '".$this->email."','".$this->senha."')";

        if ($conn->query($sql) === TRUE) {
            $this->id = mysqli_insert_id($conn); // Obtém o ID gerado no BD [cite: 214]
            $conn->close();
            return TRUE;
        } else {
            $conn->close();
            return FALSE;
        }
    }

    // 3.4. MÉTODO carregarUsuario($cpf) (Página 8)
    public function carregarUsuario($cpf)
    {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM usuario WHERE cpf = ".$cpf; // Confecção da sentença SQL [cite: 253]
        $re = $conn->query($sql);
        $r = $re->fetch_object(); // Obtém os dados como objeto [cite: 255]

        if($r != null) {
            // Popula os atributos da classe com os dados do BD [cite: 257-262]
            $this->id = $r->idusuario;
            $this->nome = $r->nome;
            $this->email = $r->email;
            $this->cpf = $r->cpf;
            $this->dataNascimento = $r->dataNascimento;
            $this->senha = $r->senha;
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    // 3.5. MÉTODO atualizarBD() (Página 9)
    public function atualizarBD()
    {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Sentença SQL para atualização de dados [cite: 301]
        $sql = "UPDATE usuario SET nome =  '".$this->nome."' , cpf='".$this->cpf."', dataNascimento = '".$this->dataNascimento."', email = '".$this->email."' WHERE idusuario = ".$this->id. "";
        
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return TRUE;
        } else {
            $conn->close();
            return FALSE;
        }
    }
}
?>