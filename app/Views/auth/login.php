<?php require_once __DIR__ . '/../header.php'; ?>

<h2>Login</h2>

<?php if(!empty($error)): ?>
  <p style="color:red"><?=htmlspecialchars($error)?></p>
<?php endif; ?>

<form method="post" action="?c=auth&a=login">
  <label>Email:<br>
    <input type="email" name="email" required>
  </label><br><br>

  <label>Senha:<br>
    <input type="password" name="password" required>
  </label><br><br>

  <button type="submit">Entrar</button>
  <a href="?c=auth&a=register">Registrar</a>
</form>

</main>
</body>
