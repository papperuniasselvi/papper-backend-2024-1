<?php

namespace Tests\Feature\UseCases;

use App\Dtos\CreateTaskInputDto;
use App\Dtos\CreateTaskOutputDto;
use App\Entities\TaskEntity;
use App\Repositories\TaskRepositoryInterface;
use App\UseCases\CreateTask;
use DateTime;
use Mockery\MockInterface;
use Tests\TestCase;

class CreateTaskTest extends TestCase
{
    public function testShouldReturnOutputDtoWithCompleteData(): void
    {
        $createInputDto = new CreateTaskInputDto(
            "test description",
            new DateTime("2025-06-20 18:00:00"),
            "mail@mail.com",
            "in backlog"
        );

        /** @var TaskRepositoryInterface $taskRepositoryMock */
        $taskRepositoryMock = $this->mock(TaskRepositoryInterface::class, function (MockInterface $mock) use ($createInputDto) {
            $mock
                ->shouldReceive('create')
                ->once()
                ->with($createInputDto)
                ->andReturn(new TaskEntity(
                    random_int(1, 10000),
                    $createInputDto->description,
                    $createInputDto->expectedDate,
                    $createInputDto->responsible,
                    $createInputDto->status,
                    $createInputDto->board,
                    new DateTime(),
                    null,
                    null
                ))
            ;
        });

        $createTask = new CreateTask($taskRepositoryMock);
        $result = $createTask->execute($createInputDto);
        $this->assertInstanceOf(CreateTaskOutputDto::class, $result);
        $this->assertEquals($createInputDto->description, $result->description);
        $this->assertEquals($createInputDto->expectedDate, $result->expectedDate);
        $this->assertEquals($createInputDto->responsible, $result->responsible);
        $this->assertEquals($createInputDto->status, $result->status);
        $this->assertIsArray($result->toArray());
    }
}
