<?php require_once __DIR__ . '/header.php'; ?>

<h2>Dashboard</h2>

<p><a href="?c=event&a=index">Ver Agenda de Eventos</a> | <a href="?c=event&a=create">Adicionar Evento</a></p>

<?php if (empty($tasks)): ?>
  <p>Você ainda não possui tarefas ou eventos.</p>
<?php else: ?>
  <table border="1" cellpadding="6" cellspacing="0">
    <tr>
      <th>Título</th>
      <th>Descrição</th>
      <th>Data</th>
      <th>Local</th>
      <th>Criado em</th>
      <th>Ações</th>
    </tr>
    <?php foreach ($tasks as $t): ?>
      <tr>
        <td><?= htmlspecialchars($t['title']) ?></td>
        <td><?= nl2br(htmlspecialchars($t['description'] ?? '')) ?></td>
        <td><?= htmlspecialchars($t['event_date'] ?? '') ?></td>
        <td><?= htmlspecialchars($t['location'] ?? '') ?></td>
        <td><?= htmlspecialchars($t['created_at'] ?? '') ?></td>
        <td>
          <a href="?c=event&a=edit&id=<?= $t['id'] ?>">Editar</a> |
          <a href="?c=event&a=delete&id=<?= $t['id'] ?>" onclick="return confirm('Remover?')">Remover</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
<?php endif; ?>

</main>
</body>
