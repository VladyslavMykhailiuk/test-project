<?php

include_once __DIR__ . '/../../core/Database.php';

class TeacherSchedule {
    public static function all() {
        $db = new Database();
        $stmt = $db->query("SELECT ts.teacher_id,ts.schedule_id, t.first_name, t.last_name, s.subject as subject_name
                                    FROM teacher_schedule ts
                                    JOIN teachers t ON ts.teacher_id = t.id
                                    JOIN schedule s ON ts.schedule_id = s.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = new Database();
        $stmt = $db->query("INSERT INTO teacher_schedule (teacher_id, schedule_id) VALUES (?, ?)", [
            $data['teacher_id'],
            $data['schedule_id']
        ]);
    }

    public static function exists($teacher_id, $schedule_id) {
        $db = new Database();
        $stmt = $db->query("SELECT COUNT(*) FROM teacher_schedule WHERE teacher_id = ? AND schedule_id = ?", [
            $teacher_id,
            $schedule_id
        ]);
        return $stmt->fetchColumn() > 0;
    }
}
