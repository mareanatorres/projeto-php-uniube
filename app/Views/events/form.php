<?php require_once __DIR__ . '/../header.php'; ?>

  <?php $isEdit = !empty($event); ?>
  
  <div class="form-container">
    <div class="form-title"><?= $isEdit ? 'Editar Evento' : 'Adicionar Novo Evento' ?></div>

    <form method="post" action="?c=event&a=<?= $isEdit ? 'update' : 'store' ?>">
      <?php if ($isEdit): ?>
        <input type="hidden" name="id" value="<?=htmlspecialchars($event['id'])?>">
      <?php endif; ?>

      <div class="form-group">
        <label for="title">Título do Evento</label>
        <input type="text" id="title" name="title" value="<?=htmlspecialchars($event['title'] ?? '')?>" required placeholder="Ex: Conferência de Tecnologia 2025">
      </div>

      <div class="form-group form-row full">
        <label for="description">Descrição Detalhada</label>
        <textarea id="description" name="description" placeholder="Descreva os detalhes do evento..." required><?=htmlspecialchars($event['description'] ?? '')?></textarea>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="event_date">Data e Hora</label>
          <input type="datetime-local" id="event_date" name="event_date" value="<?php if(!empty($event['event_date'])) echo date('Y-m-d\TH:i', strtotime($event['event_date'])); ?>" required>
        </div>

        <div class="form-group">
          <label for="location">Local do Evento</label>
          <input type="text" id="location" name="location" value="<?=htmlspecialchars($event['location'] ?? '')?>" required placeholder="Ex: São Paulo - SP">
        </div>
      </div>

      <div class="form-actions">
        <button type="submit" class="btn btn-primary"><?= $isEdit ? 'Salvar Alterações' : 'Criar Evento' ?></button>
        <a href="?c=event&a=index" class="btn btn-secondary" style="text-decoration: none;">Cancelar</a>
      </div>
    </form>
  </div>

</main>
</body>
</html>
