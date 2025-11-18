<?php

require_once __DIR__ . '/../app/Config/Database.php';

$name = 'Usuário Teste';
$email = 'teste@example.com';
$plainPassword = 'Test@1234';

try {
    $db = Database::getInstance()->getConnection();

    $stmt = $db->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
    $stmt->execute([$email]);
    $exists = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($exists) {
        echo "Usuário já existe (id: {$exists['id']}).\n";
        exit(0);
    }

    $hash = password_hash($plainPassword, PASSWORD_BCRYPT);

    $stmt = $db->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
    $stmt->execute([$name, $email, $hash]);

    $id = $db->lastInsertId();
    echo "Usuário de teste criado com id: $id\n";
    echo "Email: $email\nSenha: $plainPassword\n";
    echo "Hash inserido: $hash\n";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage() . "\n";
    exit(1);
}
