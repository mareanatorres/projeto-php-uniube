<!doctype html>
<html>
<head><meta charset="utf-8"><title>Agenda de Eventos de TI</title>
<style>body{font-family:Arial;max-width:900px;margin:20px auto}nav a{margin-right:10px}</style>
</head>
<body>
<header>
  <h1>Agenda de Eventos de TI no Brasil 2025</h1>
  <nav>
    <?php if(!empty($_SESSION['user_id'])): ?>
      Olá, <?=htmlspecialchars($_SESSION['user_name'])?> |
      <a href="?c=dashboard&a=index">Dashboard</a>
      <a href="?c=event&a=index">Agenda de Eventos</a>
      <a href="?c=auth&a=logout">Sair</a>
    <?php else: ?>
      <a href="?c=auth&a=login">Login</a>
      <a href="?c=auth&a=register">Registrar</a>
    <?php endif; ?>
  </nav>
</header>
<main>
