<?php require_once __DIR__ . '/../header.php'; ?>
</main>

<div class="auth-container">
  <div class="auth-box">
    <div class="auth-title">Registrar</div>
    <div class="auth-subtitle">Crie sua nova conta</div>

    <?php if(!empty($error)): ?>
      <div class="error-message"><?=htmlspecialchars($error)?></div>
    <?php endif; ?>

    <form method="post" action="?c=auth&a=register">
      <div class="form-group">
        <label for="name">Nome Completo</label>
        <input type="text" id="name" name="name" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" id="password" name="password" required>
      </div>

      <button type="submit" class="btn btn-primary">Registrar</button>
    </form>

    <div class="text-center">
      <p class="text-muted">Já tem conta? <a href="?c=auth&a=login" class="btn-link">Faça login aqui</a></p>
    </div>
  </div>
</div>

</body>
</html>
