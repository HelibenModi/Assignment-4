<?php require_once 'app/views/templates/header.php' ?>
<main class="container mt-4">
   
    <h2>Edit Reminder</h2>
    <form method="post" action="/reminders/edit/<?= $data['reminder']['id'] ?>">
        <div class="mb-3">
            <label for="subject" class="form-label">Reminder Subject</label>
            <input type="text" class="form-control" name="subject" value="<?= htmlspecialchars($data['reminder']['subject']) ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Update Reminder</button>
        <a href="/reminders" class="btn btn-secondary">Cancel</a>
    </form>
</main>
<?php require_once 'app/views/templates/footer.php' ?>
