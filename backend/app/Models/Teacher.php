<?php

include_once __DIR__ . '/../../core/Database.php';

class Teacher {
    public static function all() {
        $db = new Database();
        $stmt = $db->query("SELECT * FROM teachers");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = new Database();
        $stmt = $db->query("INSERT INTO teachers (first_name, last_name) VALUES (?, ?)", [
            $data['first_name'],
            $data['last_name']
        ]);
    }
}
