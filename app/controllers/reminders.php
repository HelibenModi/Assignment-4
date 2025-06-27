<?php
// File: app/controllers/reminders.php
class Reminders extends Controller {

    public function index() {
        $reminder = $this->model('Reminder');
        $list_of_reminders = $reminder->get_all_reminders();
        $this->view('reminders/index', ['reminders' => $list_of_reminders]);
    }

    public function create() {
        $reminder = $this->model('Reminder');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $subject = $_POST['subject'];
            $reminder->create_reminder($subject);
            header('Location: /reminders');
            exit;
        }

        $this->view('reminders/create');
    }

    public function edit($id) {
        $reminder = $this->model('Reminder');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $subject = $_POST['subject'];
            $reminder->update_reminders($id, $subject);
            header('Location: /reminders');
            exit;
        }

        $data = $reminder->get_reminder_by_id($id);
        $this->view('reminders/edit', ['reminder' => $data]);
    }

    public function delete($id) {
        $reminder = $this->model('Reminder');
        $reminder->delete_reminders($id);
        header('Location: /reminders');
        exit;
    }

    public function complete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $reminder = $this->model('Reminder');
            $reminder->toggle_completed($id);
            $_SESSION['flash'] = "Reminder status updated.";
        }

        header('Location: /reminders');
        exit;
    }


}