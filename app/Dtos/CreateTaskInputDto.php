<?php

namespace App\Dtos;

use DateTime;

class CreateTaskInputDto
{
    public function __construct(
        public string    $description,
        public ?DateTime $expectedDate,
        public string    $responsible,
        public string    $status,
        public string    $board = 'default'
    ) {
    }
}
