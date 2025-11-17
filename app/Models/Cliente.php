<?php
class Cliente {
    public $id;
    public $nome;
    public $email;
    public $telefone;
    public $status;

    public function __construct($data = []) {
        $this->id = $data['id'] ?? null;
        $this->nome = $data['nome'] ?? null;
        $this->email = $data['email'] ?? null;
        $this->telefone = $data['telefone'] ?? null;
        $this->status = $data['status'] ?? 1;
    }
}
