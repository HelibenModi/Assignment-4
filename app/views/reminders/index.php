<?php require_once 'app/views/templates/header.php' ?>
<main role="main" class="container mt-4">
    <div class="page-header">
        <h1 class="mb-4">Reminders</h1>
        <p><a class="btn btn-primary" href="/reminders/create">➕ Create New Reminder</a></p>
    </div>

    <?php if (!empty($data['reminders'])): ?>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Subject</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['reminders'] as $index => $reminder): ?>
                    <tr class="<?= $reminder['completed'] ? 'table-success' : '' ?>">
                        <td><?= $index + 1 ?></td>
                        <td><?= $reminder['completed'] ? '<del>' . htmlspecialchars($reminder['subject']) . '</del>' : htmlspecialchars($reminder['subject']) ?></td>
                        <td><?= htmlspecialchars($reminder['created_at']) ?></td>
                        <td>
                            <?php if ($reminder['completed']): ?>
                                <span class="badge bg-success">Completed</span>
                            <?php else: ?>
                                <span class="badge bg-warning text-dark">Pending</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="/reminders/edit/<?= $reminder['id'] ?>" class="btn btn-sm btn-warning">✏️ Edit</a>
                            <a href="/reminders/complete/<?= $reminder['id'] ?>" class="btn btn-sm btn-success">
                                <?= $reminder['completed'] ? '↩️ Undo' : '✅ Complete' ?>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-id="<?= $reminder['id'] ?>">
                                🗑️ Delete
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-muted">You don’t have any reminders yet.</p>
    <?php endif; ?>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Reminder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this reminder?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteModal = document.getElementById('deleteModal');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

    deleteModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const reminderId = button.getAttribute('data-id');
        confirmDeleteBtn.href = '/reminders/delete/' + reminderId;
    });
});
</script>

<?php require_once 'app/views/templates/footer.php' ?>
