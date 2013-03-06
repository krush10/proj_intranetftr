<?php


class UsuarioBean {
    private $id;
    private $nome_usuario;
    private $logo_img;
    private $usuario;
    private $senha;
    private $perfil;
    private $exibir;
    
    
    
    public function UsuarioBean(){
    }
    
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    
    public function getNome_Usuario(){
        return $this->nome_usuario;
    }
    public function setNome_Usuario($nome_usuario){
        $this->nome_usuario = $nome_usuario;
    }
    
    
    public function getLogo_Img(){
        return $this->logo_img;
    }
    public function setLogo_Img($logo_img){
        $this->logo_img[] = $logo_img;
    }
    
    
    public function getUsuario(){
        return $this->usuario;
    }
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    
    
    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    
    
    public function getPerfil(){
        return $this->perfil;
    }
    public function setPerfil($perfil){
        $this->perfil = $perfil;
    }
    
    
    public function getExibir(){
        return $this->exibir;
    }
    public function setExibir($exibir){
        $this->exibir = $exibir;
    }
    
}

?>
