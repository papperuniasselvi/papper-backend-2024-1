<?php

namespace Tests\Feature\UseCases;

use App\Dtos\UpdateTaskInputDto;
use App\Dtos\UpdateTaskOutputDto;
use App\Repositories\TaskRepositoryInterface;
use App\UseCases\UpdateTask;
use DateTime;
use Exception;
use Mockery\MockInterface;
use Tests\TestCase;

class UpdateTaskTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testShouldUpdateTask()
    {
        /** @var TaskRepositoryInterface | MockInterface $taskRepositoryMock */
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

        $useCase = new UpdateTask($taskRepositoryMock);

        $result = $useCase->execute($updateDto);

        $this->assertInstanceOf(UpdateTaskOutputDto::class, $result);

    }
}
