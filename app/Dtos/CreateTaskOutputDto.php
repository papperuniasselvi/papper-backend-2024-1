<?php

namespace App\Dtos;

use DateTime;

class CreateTaskOutputDto
{
    public function __construct(
        public int $id,
        public string    $description,
        public ?DateTime $expectedDate,
        public string    $responsible,
        public string    $status,
        public string    $board,
        public DateTime $createdAt,
        public ?DateTime $updatedAt,
        public ?DateTime $deletedAt,
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'expected_date' => $this->expectedDate->format('Y-m-d H:i:s'),
            'responsible' => $this->responsible,
            'status' => $this->status,
            'board' => $this->board,
            'created_at' => $this->createdAt->format('Y-m-d H:i:s'),
        ];
    }
}
