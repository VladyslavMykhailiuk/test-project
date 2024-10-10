<?php

include_once __DIR__ . '/../../core/Database.php';

class ScheduleSeeder {
    public function run() {
        $db = new Database();
        $db->query("INSERT INTO schedule (day, subject) VALUES ('Monday', 'Physics')");
        $db->query("INSERT INTO schedule (day, subject) VALUES ('Tuesday', 'Chemistry')");
        $db->query("INSERT INTO schedule (day, subject) VALUES ('Wednesday', 'Geometry')");
        echo "Schedule seeded successfully.\n";
    }
}
