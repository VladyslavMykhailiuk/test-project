<?php

include_once __DIR__ . '/migrations/2024_10_01_002_create_teachers_table.php';
include_once __DIR__ . '/migrations/2024_10_01_001_create_schedule_table.php';
include_once __DIR__ . '/migrations/2024_10_01_003_create_teacher_schedule_table.php';

(new CreateTeachersTable())->up();
(new CreateScheduleTable())->up();
(new CreateTeacherScheduleTable())->up();
