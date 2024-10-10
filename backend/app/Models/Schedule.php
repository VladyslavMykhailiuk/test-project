<?php

include_once __DIR__ . '/../../core/Database.php';

class Schedule {
    public static function all() {
        $db = new Database();
        $stmt = $db->query("SELECT id,subject FROM schedule");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
