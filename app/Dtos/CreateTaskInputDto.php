<?php

namespace App\Dtos;

use DateTime;
use Exception;

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

    /**
     * @throws Exception
     */
    public static function makeFromArray(array $data): self
    {
        return new self(
            data_get($data, 'description'),
            new DateTime(data_get($data, 'expected_date')),
            data_get($data, 'responsible'),
            data_get($data, 'status'),
            data_get($data, 'board', 'default'),
        );
    }
}
