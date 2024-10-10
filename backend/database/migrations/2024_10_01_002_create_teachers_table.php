<?php

include_once __DIR__ . '/../../core/Database.php';

class CreateTeachersTable {
    public function up() {
        $db = new Database();
        $db->query("
            CREATE TABLE teachers (
                id INT AUTO_INCREMENT PRIMARY KEY,
                first_name VARCHAR(255),
                last_name VARCHAR(255)
            )
        ");
        echo "Table 'teachers' created successfully.\n";
    }

    public function down() {
        $db = new Database();
        $db->query("DROP TABLE IF EXISTS teachers");
        echo "Table 'teachers' dropped successfully.\n";
    }
}
