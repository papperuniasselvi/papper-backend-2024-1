<?php

namespace App\Infraestrutura;

use App\Dtos\CreateTaskInputDto;
use App\Entities\TaskEntity;
use App\Models\TaskModel;
use App\Repositories\TaskRepositoryInterface;
use DateTime;
use Exception;
use Laravel\Octane\Exceptions\DdException;

class TaskRepository implements TaskRepositoryInterface
{

    /**
     * @throws DdException
     * @throws Exception
     */
    public function create(CreateTaskInputDto $createTaskInputDto): TaskEntity
    {
        $task = new TaskModel();
        $task->description = $createTaskInputDto->description;
        $task->expected_date = $createTaskInputDto->expectedDate;
        $task->responsible = $createTaskInputDto->responsible;
        $task->status = $createTaskInputDto->status;
        $task->board = $createTaskInputDto->board;

        $task->save();
        $task->refresh();

        return new TaskEntity(
            $task->id,
            $task->description,
            new DateTime($task->expected_date),
            $task->responsible,
            $task->status,
            $task->board,
            $task->created_at,
            $task->updated_at,
            $task->deleted_at
        );
    }
}
