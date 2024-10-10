<?php

include_once __DIR__ . '/../../core/Database.php';

class CreateScheduleTable {
    public function up() {
        $db = new Database();
        $db->query("
            CREATE TABLE schedule (
                id INT AUTO_INCREMENT PRIMARY KEY,
                day VARCHAR(255),
                subject VARCHAR(255)
            )
        ");
        echo "Table 'schedule' created successfully.\n";
    }

    public function down() {
        $db = new Database();
        $db->query("DROP TABLE IF EXISTS schedule");
        echo "Table 'schedule' dropped successfully.\n";
    }
}
