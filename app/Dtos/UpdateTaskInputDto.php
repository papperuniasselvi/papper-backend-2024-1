<?php

namespace App\Dtos;

use App\Entities\TaskEntity;
use DateTime;
use Exception;

class UpdateTaskInputDto
{
    public function __construct(
        public int $id,
        public string $description,
        public DateTime $expectedDate,
        public string $responsible,
        public string $status,
        public string $board,
        public DateTime $createdAt,
        public DateTime $updatedAt,
        public ?DateTime $deletedAt
    )
    {
    }

    /**
     * @throws Exception
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['description'],
            new DateTime($data['expected_date']),
            $data['responsible'],
            $data['status'],
            $data['board'],
            new DateTime($data['created_at']),
            new DateTime($data['updated_at']),
            (! empty($data['deleted_at'])) ? new DateTime($data['deleted_at']) : null
        );
    }

    public function toEntity(): TaskEntity
    {
        return new TaskEntity(
            $this->id,
            $this->description,
            $this->expectedDate,
            $this->responsible,
            $this->status,
            $this->board,
            $this->createdAt,
            $this->updatedAt,
            $this->deletedAt
        );
    }
}
