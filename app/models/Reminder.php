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

    public function add_reminder($subject) {
        $db = db_connect();
        $stmt = $db->prepare("INSERT INTO reminders (user_id, subject, created_at, completed) VALUES (1, :subject, NOW(), 0)");
        $stmt->bindValue(':subject', $subject);
        return $stmt->execute();
    }

    public function update_reminders($id, $subject) {
        $db = db_connect();
        $stmt = $db->prepare("UPDATE reminders SET subject = :subject WHERE id = :id");
        $stmt->bindValue(':subject', $subject);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function delete_reminders($id) {
        $db = db_connect();
        $stmt = $db->prepare("DELETE FROM reminders WHERE id = :id");
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

        public function toggle_completed($id) {
            $db = db_connect();
            $stmt = $db->prepare("UPDATE reminders SET completed = NOT completed WHERE id = :id");
            $stmt->bindValue(':id', $id);
            return $stmt->execute();
        }
    }

