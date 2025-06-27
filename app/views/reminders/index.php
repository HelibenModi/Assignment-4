<?php require_once 'app/views/templates/header.php' ?>

<main role="main" class="container mt-4">
    <div class="page-header">
        <h1 class="mb-4">Reminders</h1>
        <p><a class="btn btn-primary" href="/reminders/create">➕ Create New Reminder</a></p>
    </div>
    <?php if (!empty($_SESSION['flash'])): ?>
        <div class="alert alert-success">
            <?= htmlspecialchars($_SESSION['flash']) ?>
            <?php unset($_SESSION['flash']); ?>
        </div>
    <?php endif; ?>


    <?php if (!empty($data['reminders'])): ?>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Created At</th>
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
                            <a href="/reminders/edit/<?= $reminder['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
    <div></div>
                            <form method="post" action="/reminders/complete/<?= $reminder['id'] ?>" style="display:inline;">
                                <label class="switch">
                                    <input type="checkbox" name="toggle" onchange="this.form.submit()" <?= $reminder['completed'] ? 'checked' : '' ?>>
                                    <span class="slider"></span>
                                </label>
                            </form>


                            
                            <button type="button" class="btn btn-sm btn-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-id="<?= $reminder['id'] ?>">
                                 Delete
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



<?php require_once 'app/views/templates/footer.php' ?>

