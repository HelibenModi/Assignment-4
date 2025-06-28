<?php require_once 'app/views/templates/header.php'; ?>

<main role="main" class="container mt-4">
    <h1 class="mb-4">Reminders</h1>
    <p><a class="btn btn-primary" href="/reminders/create">Create New Reminder</a></p>

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
                    <tr class="<?= $reminder['completed'] ? 'table-success' : '' ?>">
                        <td><?= $index + 1 ?></td>
                        <td><?= $reminder['completed'] ? '<del>' . htmlspecialchars($reminder['subject']) . '</del>' : htmlspecialchars($reminder['subject']) ?></td>
                        <td><?= htmlspecialchars($reminder['created_at']) ?></td>
                        <td>
                            <a href="/reminders/edit/<?= $reminder['id'] ?>" class="btn btn-sm btn-warning">Edit</a>

                            

                            <form method="post" action="/reminders/delete/<?= $reminder['id'] ?>" style="display:inline;">
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-muted">You don’t have any reminders yet.</p>
    <?php endif; ?>
</main>
<div class="row">
    <div class="col-lg-12">
        <p> <a href="/logout">Click here to logout</a></p>
    </div>
</div>
<?php require_once 'app/views/templates/footer.php'; ?>
