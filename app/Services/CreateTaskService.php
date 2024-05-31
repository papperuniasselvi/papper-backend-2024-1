<?php

namespace App\Services;

use App\Dtos\CreateTaskInputDto;
use App\Dtos\CreateTaskOutputDto;
use App\UseCases\CreateTask;

readonly class CreateTaskService
{

    public function __construct(protected CreateTask $createTask)
    {
    }

    /**
     * @throws \Exception
     */
    public function handle(array $requestData): CreateTaskOutputDto
    {
        $requestDataDto = CreateTaskInputDto::makeFromArray($requestData);
        return $this->createTask->execute($requestDataDto);
    }

}
