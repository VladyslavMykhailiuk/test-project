<?php

include_once __DIR__ . '/../../core/Database.php';

class CreateTeacherScheduleTable {
    public function up() {
        $db = new Database();
        $db->query("
            CREATE TABLE teacher_schedule (
                teacher_id INT,
                schedule_id INT,
                PRIMARY KEY (teacher_id, schedule_id),
                FOREIGN KEY (teacher_id) REFERENCES teachers(id),
                FOREIGN KEY (schedule_id) REFERENCES schedule(id)
            )
        ");
        echo "Table 'teacher_schedule' created successfully.\n";
    }

    public function down() {
        $db = new Database();
        $db->query("DROP TABLE IF EXISTS teacher_schedule");
        echo "Table 'teacher_schedule' dropped successfully.\n";
    }
}
