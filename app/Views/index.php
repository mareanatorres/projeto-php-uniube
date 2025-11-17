<h2>Clientes</h2>
<p><a href="/public/index.php?c=cliente&a=create">Adicionar cliente</a></p>
<?php foreach($clientes as $c): ?>
  <div style="border:1px solid #ddd;padding:8px;margin-bottom:8px">
    <strong><?=htmlspecialchars($c['nome'])?></strong> — <?=htmlspecialchars($c['email'])?>
    <div>
      <a href="/public/index.php?c=cliente&a=edit&id=<?= $c['id'] ?>">Editar</a>
      <form method="post" action="/public/index.php?c=cliente&a=delete" style="display:inline">
        <input type="hidden" name="id" value="<?= $c['id'] ?>">
        <button onclick="return confirm('Confirma?')">Remover</button>
      </form>
    </div>
  </div>
<?php endforeach; ?>
