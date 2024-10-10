<?php

include_once __DIR__ . '/../../core/Database.php';

class TeachersSeeder {
    public function run() {
        $db = new Database();
        $db->query("INSERT INTO teachers (first_name, last_name) VALUES ('John', 'Doe')");
        $db->query("INSERT INTO teachers (first_name, last_name) VALUES ('Jane', 'Smith')");
        $db->query("INSERT INTO teachers (first_name, last_name) VALUES ('Jane', 'Reonte')");
        $db->query("INSERT INTO teachers (first_name, last_name) VALUES ('Tom', 'Williams')");
        $db->query("INSERT INTO teachers (first_name, last_name) VALUES ('Jack', 'Sparrow')");
        echo "Teachers seeded successfully.\n";
    }
}
