<?php require_once __DIR__ . '/../header.php'; ?>

<h2>Agenda de Eventos de TI no Brasil 2025</h2>

<p><a href="?c=event&a=create">Adicionar novo evento</a></p>

<?php if (empty($events)): ?>
  <p>Nenhum evento cadastrado.</p>
<?php else: ?>
  <table border="1" cellpadding="6" cellspacing="0">
    <tr><th>Título</th><th>Data</th><th>Local</th><th>Ações</th></tr>
    <?php foreach($events as $e): ?>
      <tr>
        <td><?=htmlspecialchars($e['title'])?></td>
        <td><?=htmlspecialchars($e['event_date'] ?? '')?></td>
        <td><?=htmlspecialchars($e['location'] ?? '')?></td>
        <td>
          <a href="?c=event&a=edit&id=<?=$e['id']?>">Editar</a> |
          <a href="?c=event&a=delete&id=<?=$e['id']?>" onclick="return confirm('Remover evento?')">Remover</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
<?php endif; ?>

</main>
</body>
