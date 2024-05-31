<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTasksRequest;
use App\Services\CreateTaskService;

/**
 * @OA\Info (
 *     version="1",
 *     title="Controler de Tarefas"
 * )
 * @OA\PathItem(path="/api/tasks")
 *
 */
class TaskController extends Controller
{

    public function __construct(
        protected readonly CreateTaskService $createTaskService
    ) {
    }

    /**
     * @OA\Post(
     *     path="/api/tasks",
     *     summary="Adicionad uma nova tarefa",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="description",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="responsible",
     *                     type="string"
     *                 ),
     *                 example={"description": "Criar uma nova tarefa", "responsible": "responsavel@projetopaper.dev"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             @OA\Schema(ref="#/CreateTaskOutputDto"),
     *             @OA\Examples(example="CreateTaskOutputDto", value={
     *     "id": 1,
     *     "description": "Criar nova tarefa",
     *     "expected_date": "2024-05-30 18:00:00",
     *     "responsible": "rogerio.lamarques@gmail.com",
     *     "status": "in backlog",
     *     "board": "default",
     *     "created_at": "2024-05-30 09:00:00",
     *     }, summary="Resultado esperado."),
     *         )
     *     )
     * )
     */
    public function create(CreateTasksRequest $request)
    {

        return response()->json(
            $this->createTaskService->handle($request->all())->toArray()
        );
    }
}
