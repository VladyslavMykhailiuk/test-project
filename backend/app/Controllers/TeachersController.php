<?php

include_once __DIR__ . '/../Models/Teacher.php';

class TeachersController {
    public function index() {
        $teachers = Teacher::all();
        echo json_encode($teachers);
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $first_name = $_POST['first_name'] ?? null;
            $last_name = $_POST['last_name'] ?? null;

            if (empty($first_name) || empty($last_name)) {
                http_response_code(400);
                echo json_encode([
                    'error' => 'First name and last name cannot be empty.',
                ]);
                return;
            }

            Teacher::create(['first_name' => $first_name, 'last_name' => $last_name]);

            http_response_code(201);
            echo json_encode([
                'message' => 'Teacher created successfully!',
            ]);
        } else {
            http_response_code(405);
            echo json_encode([
                'error' => 'Invalid request method. Please use POST.',
            ]);
        }
    }


}
