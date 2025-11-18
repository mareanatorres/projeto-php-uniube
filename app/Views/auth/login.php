<?php require_once __DIR__ . '/../header.php'; ?>
</main>

<div class="auth-container">
  <div class="auth-box">
    <div class="auth-title">Login</div>
    <div class="auth-subtitle">Acesse sua conta</div>

    <?php if(!empty($error)): ?>
      <div class="error-message"><?=htmlspecialchars($error)?></div>
    <?php endif; ?>

    <form method="post" action="?c=auth&a=login">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" id="password" name="password" required>
      </div>

      <button type="submit" class="btn btn-primary">Entrar</button>
    </form>

    <div class="text-center">
      <p class="text-muted">Não tem conta? <a href="?c=auth&a=register" class="btn-link">Registre-se aqui</a></p>
    </div>
  </div>
</div>

</body>
</html>
