<h2>Dashboard</h2>
<p><a href="/public/index.php?c=cliente&a=index">Ir para Clientes (CRUD)</a></p>
<?php if(empty($tasks)): ?>
  <p>Nenhuma tarefa.</p>
<?php else: ?>
  <?php foreach($tasks as $t): ?>
    <div style="border:1px solid #ddd;padding:8px;margin-bottom:8px">
      <strong><?=htmlspecialchars($t['title'])?></strong>
      <p><?=nl2br(htmlspecialchars($t['description']))?></p>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
