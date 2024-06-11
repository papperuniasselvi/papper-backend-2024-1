<?php

namespace App\Dtos;

use App\Entities\TaskEntity;
use DateTime;

class UpdateTaskOutputDto
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

    public static function fromEntity(TaskEntity $data): self
    {
        return new UpdateTaskOutputDto(
            $data->getId(),
            $data->getDescription(),
            $data->getExpectedDate(),
            $data->getResponsible(),
            $data->getStatus(),
            $data->getBoard(),
            $data->getCreatedAt(),
            $data->getUpdatedAt(),
            $data->getDeletedAt()
        );
    }
}
