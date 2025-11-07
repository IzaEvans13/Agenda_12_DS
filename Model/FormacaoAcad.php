<?php

class FormacaoAcad
{
    // 4.1. ATRIBUTOS PRIVADOS (Página 10)
    private $id;
    private $idusuario;
    private $inicio;
    private $fim;
    private $descricao;

    // 4.2. MÉTODOS GETTERS e SETTERS (Página 11)
    // ID
    public function setID($id) { $this->id = $id; }
    public function getID() { return $this->id; }

    // idusuario
    public function setIdUsuario($idusuario) { $this->idusuario = $idusuario; }
    public function getIdUsuario() { return $this->idusuario; }

    // inicio
    public function setInicio($inicio) { $this->inicio = $inicio; }
    public function getInicio() { return $this->inicio; }

    // fim
    public function setFim($fim) { $this->fim = $fim; }
    public function getFim() { return $this->fim; }

    // Descrição
    public function setDescricao($descricao) { $this->descricao = $descricao; }
    public function getDescricao() { return $this->descricao; }

    // 4.3. MÉTODO inserirBD() (Página 12)
    public function inserirBD()
    { 
        require_once 'ConexaoBD.php'; 
        $con = new ConexaoBD();
        $conn = $con->conectar();
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        // Sentença SQL [cite: 370]
        $sql = "INSERT INTO formacaoAcademica (idusuario, inicio, fim, descricao)VALUES ('".$this->idusuario."','".$this->inicio."','".$this->fim."','".$this->descricao."')";
        
        if ($conn->query($sql) === true) {
            $this->id = mysqli_insert_id($conn);
            $conn->close();
            return true; 
        } else  { 
            $conn->close();
            return false; 
        } 
    } 

    // 4.4. MÉTODO excluirBD($id) (Página 12)
    public function excluirBD($id) 
    { 
        require_once 'ConexaoBD.php'; 
        $con = new ConexaoBD();
        $conn = $con->conectar();
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        // Sentença SQL [cite: 375]
        $sql = "DELETE FROM formacaoAcademica WHERE idformacaoAcademica = '".$id  ."';";
        
        if ($conn->query($sql) === true) {
            $conn->close();
            return true; 
        } else  { 
            $conn->close();
            return false;
        } 
    } 

    // 4.5. MÉTODO listaFormacoes($idusuario) (Página 13)
    public function listaFormacoes($idusuario){
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        // Sentença SQL [cite: 380]
        $sql = "SELECT * FROM formacaoAcademica WHERE idusuario =  '".$idusuario."'"  ; 
        $re = $conn->query($sql);
        $conn->close();
        
        return $re; // Retorna um ou mais registros [cite: 381]
    } 
}
?>
