<?php


class ArquivoBean {
   
    private $id;
    private $codigo;
    private $nome;
    private $descricao;
    private $url;
    private $id_usuario;
    private $exibir;
    
    
    public function ArquivoBean(){}
    
    
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    
    public function getCodigo(){
        return $this->codigo;
    }
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    
    
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    
    
    public function getDescricao(){
        return $this->descricao;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    
    
    public function getUrl(){
        return $this->url;
    }
    public function setUrl($url){
        $this->url[] = $url;
    }
    
    
    public function getId_Usuario(){
        return $this->id_usuario;
    }
    public function setId_Usuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }
    
    public function getExibir(){
        return $this->exibir;
    }
    public function setExibir($exibir){
        $this->exibir = $exibir;
    }
    
}

?>
