<?php

namespace Anglesson\Exemplo\Infrastructure\Repositories;

use Anglesson\Exemplo\Domain\Entity\Task;
use Anglesson\Exemplo\Domain\Protocols\TaskRepositoryInterface;
use Anglesson\Exemplo\Infrastructure\Protocols\UuidGeneratorInterface;

class MockRepository implements TaskRepositoryInterface {
  private array $tasks = [];
  private UuidGeneratorInterface $generatorId;
  
  public function __construct(UuidGeneratorInterface $generatorId) {
    $this->generatorId = $generatorId;
  }
  
  public function save(Task $tarefa): Task
  {
    $tarefa->id = $this->generatorId->generateId();
    $this->tasks[] = $tarefa;
    return $tarefa;
  }
}