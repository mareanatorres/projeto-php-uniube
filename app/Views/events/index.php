<?php require_once __DIR__ . '/../header.php'; ?>

  <div class="dashboard-header">
    <div class="dashboard-title">Agenda de Eventos de TI no Brasil 2025</div>
    <div class="dashboard-subtitle">Confira todos os eventos cadastrados na plataforma</div>
  </div>

  <div style="margin-bottom: 2rem;">
    <a href="?c=event&a=create" class="btn btn-primary" style="max-width: 300px;">Adicionar Novo Evento</a>
  </div>

  <?php if (empty($events)): ?>
    <div class="card">
      <div class="empty-state">
        <div class="empty-state-icon"></div>
        <div class="empty-state-text">Nenhum evento cadastrado ainda</div>
        <a href="?c=event&a=create" class="btn btn-primary" style="max-width: 300px;">Seja o primeiro a criar um evento</a>
      </div>
    </div>
  <?php else: ?>
    <div class="event-grid">
      <?php foreach($events as $e): ?>
        <div class="event-card">
          <div class="event-date"><?= date('d/m/Y', strtotime($e['event_date'] ?? '')) ?></div>
          <div class="event-title"><?= htmlspecialchars($e['title']) ?></div>
          <div class="event-location"><?= htmlspecialchars($e['location'] ?? 'Local não informado') ?></div>
          <div class="event-description"><?= htmlspecialchars(substr($e['description'] ?? '', 0, 100)) ?>...</div>
          <div class="event-actions">
            <a href="?c=event&a=edit&id=<?= $e['id'] ?>" class="edit">Editar</a>
            <a href="?c=event&a=delete&id=<?= $e['id'] ?>" class="delete" onclick="return confirm('Tem certeza que deseja remover este evento?')">Remover</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

</main>
</body>
</html>
