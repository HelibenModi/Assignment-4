<?php

class Reminder {

    public $username;
    public $password;
    public $auth = false;

    public function __construct() {

    }

    public function get_all_reminders () {
      $db = db_connect();
      $statement = $db->prepare("select * from reminders;");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }
     public function update_reminders ($reminder_id) {
      $db = db_connect();
      
    }
}

