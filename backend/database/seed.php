<?php

include_once __DIR__ . '/seeders/TeachersSeeder.php';
include_once __DIR__ . '/seeders/ScheduleSeeder.php';

(new TeachersSeeder())->run();
(new ScheduleSeeder())->run();
