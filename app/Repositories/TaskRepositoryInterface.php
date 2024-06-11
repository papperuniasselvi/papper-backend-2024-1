<?php

namespace App\Repositories;

use App\Dtos\CreateTaskInputDto;
use App\Entities\TaskEntity;

interface TaskRepositoryInterface
{
    public function create(CreateTaskInputDto $createTaskInputDto): TaskEntity;
    public function update(TaskEntity $createTaskInputDto): TaskEntity;
}
