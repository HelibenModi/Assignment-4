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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['reminders'] as $index => $reminder): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($reminder['subject']) ?></td>
                        <td><?= htmlspecialchars($reminder['created_at']) ?></td>
                        <td>
                            <a href="/reminders/update/<?= $reminder['id'] ?>" class="btn btn-sm btn-warning"> Update</a>
                            <a href="/reminders/delete/<?= $reminder['id'] ?>"  class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-muted">You don’t have any reminders yet.</p>
    <?php endif; ?>
</main>
<?php require_once 'app/views/templates/footer.php' ?>
