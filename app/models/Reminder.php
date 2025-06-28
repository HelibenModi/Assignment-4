<?php

class Reminder {

    public function __construct() {}


    public function get_all_reminders() {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM reminders;");
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function create_reminder($subject) {
        $db = db_connect();
        $stmt = $db->prepare("INSERT INTO reminders (user_id, subject, created_at) VALUES (6, :subject, NOW())");
        $stmt->bindValue(':subject', $subject);
        return $stmt->execute();
    }
    public function get_reminder_by_id($id) {
        $db = db_connect();
        $stmt = $db->prepare("SELECT * FROM reminders WHERE id = :id AND user_id = 6");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function update_reminders($id, $subject) {
        $db = db_connect();
        $stmt = $db->prepare("UPDATE reminders SET subject = :subject WHERE id = :id AND user_id = 6");
        $stmt->bindValue(':subject', $subject);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function delete_reminders($id) {
        $db = db_connect();
        $stmt = $db->prepare("DELETE FROM reminders WHERE id = :id AND user_id = 6");
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

}