<?php require_once 'app/views/templates/header.php' ?>

<main class="container mt-4">
    <h2>Create New Reminder</h2>

    <form method="post" action="/reminders/create">
        <div class="mb-3">
            <label for="subject" class="form-label">Reminder Subject</label>
            <input type="text" class="form-control" name="subject" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Reminder</button>
        <a href="/reminders" class="btn btn-secondary">Cancel</a>
    </form>
</main>

<?php require_once 'app/views/templates/footer.php' ?>
