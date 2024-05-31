<?php

namespace App\UseCases;

use App\Dtos\CreateTaskInputDto;
use App\Dtos\CreateTaskOutputDto;
use App\Repositories\TaskRepositoryInterface;

class CreateTask
{
    public function __construct(protected TaskRepositoryInterface $createTaskRepository)
    {
    }

    public function execute(CreateTaskInputDto $createTaskInputDto): CreateTaskOutputDto
    {
        $result = $this->createTaskRepository->create($createTaskInputDto);
        return new CreateTaskOutputDto(
            $result->getId(),
            $result->getDescription(),
            $result->getExpectedDate(),
            $result->getResponsible(),
            $result->getStatus(),
            $result->getBoard(),
            $result->getCreatedAt(),
            $result->getUpdatedAt(),
            $result->getDeletedAt()
        );
    }
}
