<?php

include_once __DIR__ . '/../Models/Schedule.php';

class SchedulesController {
    public function index() {
        $subjects = Schedule::all();
        echo json_encode($subjects);
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $day = $_POST['day'] ?? null;
            $subject = $_POST['subject'] ?? null;

            if (empty($day) || empty($subject)) {
                http_response_code(400);
                echo json_encode([
                    'error' => 'cannot be empty.',
                ]);
                return;
            }

            Schedule::create(['day' => $day, 'subject' => $subject]);

            http_response_code(201);
            echo json_encode([
                'message' => 'Schedule created successfully!',
            ]);
        } else {
            http_response_code(405);
            echo json_encode([
                'error' => 'Invalid request method. Please use POST.',
            ]);
        }
    }
}
