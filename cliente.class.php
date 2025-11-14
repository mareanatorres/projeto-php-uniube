<?php 

  Class Cliente{

    public $nome;
    public $email;
    public $telefone;

    public function __construct($nome, $email, $telefone) {

      $this->nome = $nome;
      $this->email = $email;
      $this->telefone = $telefone;

    }

    public function mostrar(): void{
      echo "nome é: " . $this->nome . "<br>"; 
      echo "email é: " . $this->email . "<br>";
      echo "telefone é: " . $this->telefone . "<br>";
    }
  }

?>