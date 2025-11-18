<?php require_once __DIR__ . '/header.php'; ?>

  <div class="dashboard-header">
    <div class="dashboard-title">Seu Dashboard</div>
    <div class="dashboard-subtitle">Gerencie seus eventos e tarefas</div>
  </div>

  <div class="action-buttons">
    <a href="?c=event&a=index" class="btn btn-secondary">Ver Agenda de Eventos</a>
    <a href="?c=event&a=create" class="btn btn-primary">Adicionar Novo Evento</a>
  </div>

  <?php if (empty($tasks)): ?>
    <div class="card">
      <div class="empty-state">
        <div class="empty-state-icon"></div>
        <div class="empty-state-text">Você ainda não possui eventos criados</div>
        <a href="?c=event&a=create" class="btn btn-primary" style="max-width: 300px;">Criar seu primeiro evento</a>
      </div>
    </div>
  <?php else: ?>
    <div class="card">
      <div class="card-title">Seus Eventos</div>
      <div class="table-responsive">
        <table>
          <thead>
            <tr>
              <th>Título</th>
              <th>Descrição</th>
              <th>Data</th>
              <th>Local</th>
              <th>Criado em</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($tasks as $t): ?>
              <tr>
                <td><strong><?= htmlspecialchars($t['title']) ?></strong></td>
                <td><?= substr(htmlspecialchars($t['description'] ?? ''), 0, 50) ?>...</td>
                <td><?= htmlspecialchars($t['event_date'] ?? '') ?></td>
                <td><?= htmlspecialchars($t['location'] ?? '') ?></td>
                <td><?= htmlspecialchars($t['created_at'] ?? '') ?></td>
                <td>
                  <div class="action-links">
                    <a href="?c=event&a=edit&id=<?= $t['id'] ?>" class="edit">Editar</a>
                    <a href="?c=event&a=delete&id=<?= $t['id'] ?>" class="delete" onclick="return confirm('Tem certeza que deseja remover este evento?')">Remover</a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  <?php endif; ?>

</main>
</body>
</html>
