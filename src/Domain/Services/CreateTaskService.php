<?php

namespace Anglesson\Exemplo\Domain\Services;

use Anglesson\Exemplo\Domain\Entity\Task;
use Anglesson\Exemplo\Domain\Protocols\CreateTaskServiceInterface;
use Anglesson\Exemplo\Domain\Protocols\TaskRepositoryInterface;

class CreateTaskService implements CreateTaskServiceInterface
{
    private TaskRepositoryInterface $repository;

    public function __construct(TaskRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create(Task $task): Task
    {
        return $this->repository->save($task);
    }
}