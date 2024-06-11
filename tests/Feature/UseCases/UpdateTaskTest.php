<?php

namespace Tests\Feature\UseCases;

use App\Dtos\UpdateTaskInputDto;
use App\Dtos\UpdateTaskOutputDto;
use App\Repositories\TaskRepositoryInterface;
use App\UseCases\UpdateTask;
use DateTime;
use Tests\TestCase;

class UpdateTaskTest extends TestCase
{
    public function testShouldUpdateTask()
    {
        $taskRepositoryMock = $this->mock(TaskRepositoryInterface::class);

        $updateDto = new UpdateTaskInputDto(
            1,
            'Update',
            new DateTime("2024-09-15 18:00:00"),
            'rogerio.lamarques@gmail.com',
            'In the future',
            'test',
            new DateTime("2024-05-10 09:00:00"),
            new DateTime(),
            null
        );
        $taskRepositoryMock->shouldReceive('update')
            ->with($this->equalTo($updateDto->toEntity()))
            ->once()
            ->andReturn($updateDto->toEntity());

        $usecase = new UpdateTask($taskRepositoryMock);

        $result = $usecase->execute($updateDto);

        $this->assertInstanceOf(UpdateTaskOutputDto::class, $result);

    }
}
