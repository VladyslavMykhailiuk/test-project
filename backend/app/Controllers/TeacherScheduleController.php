<?php

include_once __DIR__ . '/../Models/TeacherSchedule.php';

class TeacherScheduleController {

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $teacher_id = $_POST['teacher_id'] ?? null;
            $schedule_id = $_POST['schedule_id'] ?? null;

            if (empty($teacher_id) || empty($schedule_id)) {
                http_response_code(400);
                echo json_encode([
                    'error' => 'Fields cannot be empty.',
                ]);
                return;
            }

            if (TeacherSchedule::exists($teacher_id, $schedule_id)) {
                http_response_code(409);
                echo json_encode([
                    'error' => 'Duplicate entry: This teacher already has this schedule.',
                ]);
                return;
            }

            TeacherSchedule::create(['teacher_id' => $teacher_id, 'schedule_id' => $schedule_id]);

            http_response_code(201);
            echo json_encode([
                'message' => 'Created successfully!',
            ]);
        } else {
            http_response_code(405);
            echo json_encode([
                'error' => 'Invalid request method. Please use POST.',
            ]);
        }
    }

    public function index() {
        $assignments = TeacherSchedule::all();
        echo json_encode($assignments);
    }
}