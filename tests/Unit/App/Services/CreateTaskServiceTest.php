<?php

namespace App\Services;

use App\Dtos\CreateTaskInputDto;
use App\Dtos\CreateTaskOutputDto;
use App\UseCases\CreateTask;
use DateTime;
use Exception;
use Mockery;
use Random\RandomException;
use Tests\TestCase;

class CreateTaskServiceTest extends TestCase
{
    /**
     * @throws RandomException
     * @throws Exception
     */
    public function testShouldExecuteCreateTaskWithDto(): void
    {
        $data = [
            'description' => "test description",
            'expected_date' => "2025-06-20 18:00:00",
            'responsible' => "mail@mail.com",
            'status' => "in backlog",
        ];

        $createTaskDtoResult = CreateTaskInputDto::makeFromArray($data);

        $useCaseMock = $this->mock(CreateTask::class);
        $useCaseMock->shouldReceive('execute')
            ->once()
            ->with(Mockery::type(CreateTaskInputDto::class))
            ->andReturn(
                new CreateTaskOutputDto(
                    random_int(1, 10000),
                    $createTaskDtoResult->description,
                    $createTaskDtoResult->expectedDate,
                    $createTaskDtoResult->responsible,
                    $createTaskDtoResult->status,
                    $createTaskDtoResult->board,
                    new DateTime(),
                    null,
                    null
                )
            );

        $application = new CreateTaskService($useCaseMock);
        $application->handle($data);
    }
}
