<?php

include_once __DIR__ . '/../../core/Database.php';

class Schedule {
    public static function all() {
        $db = new Database();
        $stmt = $db->query("SELECT id,subject,day FROM schedule");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = new Database();
        $stmt = $db->query("INSERT INTO schedule (day, subject) VALUES (?, ?)", [
            $data['day'],
            $data['subject']
        ]);
    }
}
