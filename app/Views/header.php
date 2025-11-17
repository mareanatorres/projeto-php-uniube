<!doctype html>
<html>
<head><meta charset="utf-8"><title>Meu App MVC</title>
<style>body{font-family:Arial;max-width:900px;margin:20px auto}nav a{margin-right:10px}</style>
</head>
<body>
<header>
  <h1>Meu primeiro App MVC</h1>
  <nav>
    <?php if(!empty($_SESSION['user_id'])): ?>
      Olá, <?=htmlspecialchars($_SESSION['user_name'])?> |
      <a href="/public/index.php">Dashboard</a>
      <a href="/public/index.php?c=cliente&a=index">Clientes</a>
      <a href="/public/index.php?c=auth&a=logout">Sair</a>
    <?php else: ?>
      <a href="/public/index.php?c=auth&a=login">Login</a>
      <a href="/public/index.php?c=auth&a=register">Registrar</a>
    <?php endif; ?>
  </nav>
</header>
<main>
