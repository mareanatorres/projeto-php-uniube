<?php

class ClienteDAO {
    private $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function create(Cliente $cliente): bool|string {
        $sql = "INSERT INTO clientes (nome, email, telefone, status) 
                VALUES (:nome, :email, :telefone, :status)";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':nome'      => $cliente->nome,
            ':email'     => $cliente->email,
            ':telefone'  => $cliente->telefone,
            ':status'    => $cliente->status
        ]);

        return $this->conn->lastInsertId();
    }

    public function read($id) {
        $sql = "SELECT * FROM clientes WHERE id = :id";
        $stmt = $this->conn->prepare($sql);

        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(Cliente $cliente): bool {
        $sql = "UPDATE clientes 
                SET nome = :nome, 
                    email = :email, 
                    telefone = :telefone, 
                    status = :status 
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':nome'      => $cliente->nome,
            ':email'     => $cliente->email,
            ':telefone'  => $cliente->telefone,
            ':status'    => $cliente->status,
            ':id'        => $cliente->id
        ]);
    }

    public function delete($id): bool {
        $sql = "DELETE FROM clientes WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    public function all() {
        $stmt = $this->conn->query("SELECT * FROM clientes ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
