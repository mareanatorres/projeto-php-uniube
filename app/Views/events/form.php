<?php require_once __DIR__ . '/../header.php'; ?>

<?php $isEdit = !empty($event); ?>
<h2><?= $isEdit ? 'Editar Evento' : 'Adicionar Evento' ?></h2>

<form method="post" action="?c=event&a=<?= $isEdit ? 'update' : 'store' ?>">
  <?php if ($isEdit): ?>
    <input type="hidden" name="id" value="<?=htmlspecialchars($event['id'])?>">
  <?php endif; ?>

  <label>Título:<br>
    <input type="text" name="title" value="<?=htmlspecialchars($event['title'] ?? '')?>" required>
  </label><br><br>

  <label>Descrição:<br>
    <textarea name="description"><?=htmlspecialchars($event['description'] ?? '')?></textarea>
  </label><br><br>

  <label>Data e hora do evento:<br>
    <input type="datetime-local" name="event_date" value="<?php if(!empty($event['event_date'])) echo date('Y-m-d\TH:i', strtotime($event['event_date'])); ?>">
  </label><br><br>

  <label>Local:<br>
    <input type="text" name="location" value="<?=htmlspecialchars($event['location'] ?? '')?>">
  </label><br><br>

  <button type="submit"><?= $isEdit ? 'Salvar alterações' : 'Criar evento' ?></button>
  <a href="?c=event&a=index">Cancelar</a>
</form>

</main>
</body>
