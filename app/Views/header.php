<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Eventos de TI no Brasil 2025</title>
    <style>
<?php include __DIR__ . '/../../public/css/style.css'; ?>
    </style>">
</head>
<body>
<header>
    <div class="header-container">
        <div class="logo">Agenda de Eventos de TI no Brasil 2025</div>
        <nav>
            <?php if(!empty($_SESSION['user_id'])): ?>
                <span style="color: #e0e7ff; margin-right: auto;">Olá, <?=htmlspecialchars($_SESSION['user_name'])?></span>
                <a href="?c=dashboard&a=index">Dashboard</a>
                <a href="?c=event&a=index">Agenda de Eventos</a>
                <a href="?c=auth&a=logout" class="logout-btn">Sair</a>
            <?php else: ?>
                <a href="?c=auth&a=login">Login</a>
                <a href="?c=auth&a=register">Registrar</a>
            <?php endif; ?>
        </nav>
    </div>
</header>
<main class="container">
