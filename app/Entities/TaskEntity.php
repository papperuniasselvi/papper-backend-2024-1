<?php

namespace App\Entities;

use DateTime;

class TaskEntity
{
    public function __construct(
        private readonly int       $id,
        private readonly string    $description,
        private readonly DateTime  $expectedDate,
        private readonly string    $responsible,
        private readonly string    $status,
        private readonly string    $board,
        private readonly DateTime  $createdAt,
        private readonly ?DateTime $updatedAt,
        private readonly ?DateTime $deletedAt
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getExpectedDate(): DateTime
    {
        return $this->expectedDate;
    }

    public function getResponsible(): string
    {
        return $this->responsible;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getBoard(): string
    {
        return $this->board;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function getDeletedAt(): ?DateTime
    {
        return $this->deletedAt;
    }
}
