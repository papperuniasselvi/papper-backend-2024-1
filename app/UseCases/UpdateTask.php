<?php

namespace App\UseCases;

use App\Dtos\UpdateTaskInputDto;
use App\Dtos\UpdateTaskOutputDto;
use App\Entities\TaskEntity;
use App\Repositories\TaskRepositoryInterface;
use DateTime;
use Exception;

class UpdateTask
{
    public function __construct(protected TaskRepositoryInterface $taskRepository)
    {
    }

    /**
     * @throws Exception
     */
    public function execute(UpdateTaskInputDto $updateTaskInputDto): UpdateTaskOutputDto
    {
        $update = $this->taskRepository->update($updateTaskInputDto->toEntity());
        return UpdateTaskOutputDto::fromEntity($update);
    }
}
