<h2>Login</h2>
<?php if (!empty($error)): ?><p style="color:red"><?=htmlspecialchars($error)?></p><?php endif; ?>
<form method="post">
  <label>Email: <input type="email" name="email" required></label><br><br>
  <label>Senha: <input type="password" name="password" required></label><br><br>
  <button>Entrar</button>
</form>
