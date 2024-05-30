<?php
namespace App\Dtos;

use DateTime;

class CreateTaskOutputDto
{
    const DATE_FORMAT = 'Y-m-d H:i:s';
    public function __construct(
        public int $id,
        public string $description,
        public ?DateTime $expectedDate,
        public string $responsible,
        public string $status,
        public string $board,
        public DateTime $createdAt,
        public ?DateTime $updatedAt,
        public ?DateTime $deletedAt,
    ) {
    }

    /**
     * @OA\Schema(
     *  schema="CreateTaskOutputDto",
     *  title="Retorno da api em caso de sucesso",
     *  @OA\Property(
     *      property="id",
     *      type="integer",
     *      description="ID da tarefa"
     *  ),
     *  @OA\Property(
     *      property="description",
     *      type="string",
     *      description="Descrição da tarefa"
     *  ),
     *  @OA\Property(
     *      property="expected_date",
     *      type="string",
     *      format="date-time",
     *      description="Data esperada para conclusão"
     *  ),
     *  @OA\Property(
     *      property="responsible",
     *      type="string",
     *      description="Responsável pela tarefa"
     *  ),
     *  @OA\Property(
     *      property="status",
     *      type="string",
     *      description="Status da tarefa"
     *  ),
     *  @OA\Property(
     *      property="board",
     *      type="string",
     *      description="Quadro ao qual a tarefa pertence"
     *  ),
     *  @OA\Property(
     *      property="created_at",
     *      type="string",
     *      format="date-time",
     *      description="Data de criação da tarefa"
     *  ),
     *  @OA\Property(
     *      property="updated_at",
     *      type="string",
     *      format="date-time",
     *      description="Data de atualização da tarefa",
     *      nullable=true
     *  ),
     *  @OA\Property(
     *      property="deleted_at",
     *      type="string",
     *      format="date-time",
     *      description="Data de exclusão da tarefa",
     *      nullable=true
     *  )
     * )
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'expected_date' => $this->expectedDate?->format(self::DATE_FORMAT),
            'responsible' => $this->responsible,
            'status' => $this->status,
            'board' => $this->board,
            'created_at' => $this->createdAt->format(self::DATE_FORMAT),
            'updated_at' => $this->updatedAt?->format(self::DATE_FORMAT),
            'deleted_at' => $this->deletedAt?->format(self::DATE_FORMAT),
        ];
    }
}
