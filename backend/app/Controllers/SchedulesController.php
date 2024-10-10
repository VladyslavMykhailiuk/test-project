<?php

include_once __DIR__ . '/../Models/Schedule.php';

class SchedulesController {
    public function index() {
        $subjects = Schedule::all();
        echo json_encode($subjects);
    }
}
