<?php require_once __DIR__ . '/../header.php'; ?>

<h2>Registrar</h2>

<?php if(!empty($error)): ?>
  <p style="color:red"><?=htmlspecialchars($error)?></p>
<?php endif; ?>

<form method="post" action="?c=auth&a=register">
  <label>Nome:<br>
    <input type="text" name="name" required>
  </label><br><br>

  <label>Email:<br>
    <input type="email" name="email" required>
  </label><br><br>

  <label>Senha:<br>
    <input type="password" name="password" required>
  </label><br><br>

  <button type="submit">Registrar</button>
  <a href="?c=auth&a=login">Voltar ao login</a>
</form>

</main>
</body>
