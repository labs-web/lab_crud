<?php

namespace Tests\Feature\GestionTasks;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\GestionTasks\TaskRepository;
use App\Models\GestionTasks\Task;
use Tests\TestCase;
use App\Exceptions\GestionTasks\TaskAlreadyExistException;

/**
 * Classe de test pour tester les fonctionnalités du module de tasks.
*/
class projetTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Le référentiel de tasks utilisé pour les tests.
     *
     * @var TaskRepository
    */
    protected $taskRepository;

    /**
     * L'utilisateur utilisé pour les tests.
     *
     * @var User
    */
    protected $user;


    /**
     * Met en place les préconditions pour chaque test.
    */
    protected function setUp(): void
    {
        parent::setUp();
        $this->taskRepository = new TaskRepository(new Task);
        $this->user = User::factory()->create();
    }

    /**
     * Teste la pagination des tasks.
    */
    public function test_paginate()
    {
        $this->actingAs($this->user);
        $taskData = [
            'nom' => 'task create test',
            'description' => 'task create test',
            
        ];
        $task = $this->taskRepository->create($taskData);
        $tasks = $this->taskRepository->paginate();
        $this->assertNotNull($tasks);
    }


    /**
     * Teste la création d'un projet.
    */
    public function test_create()
    {
        $this->actingAs($this->user);
        $taskData = [
            'nom' => 'task create test',
            'description' => 'task create test',
            
        ];
        $task = $this->taskRepository->create($taskData);
        $this->assertEquals($taskData['nom'], $task->nom);
    }

    /**
     * Teste la création d'un projet déjà existant.
    */
    public function test_create_task_already_exist()
    {
        $this->actingAs($this->user);

        $task = Task::factory()->create();
        $taskData = [
            'nom' => $task->nom,
            'description' => 'task create test',
           
        ];

        try {
            $task = $this->taskRepository->create($taskData);
            $this->fail('Expected TaskException was not thrown');
        } catch (TaskAlreadyExistException $e) {
            $this->assertEquals(__('GestionTasks/projet/message.createTaskException'), $e->getMessage());
        } catch (\Exception $e) {
            $this->fail('Unexpected exception was thrown: ' . $e->getMessage());
        }
    }

    /**
     * Teste la mise à jour d'un projet.
    */
    public function test_update()
    {
        $this->actingAs($this->user);
        $task = Task::factory()->create();
        $taskData = [
            'nom' => 'task update test',
            'description' => 'task update test',
           
        ];
        $this->taskRepository->update($task->id, $taskData);
        $this->assertDatabaseHas('tasks', $taskData);
    }

    /**
     * Teste la suppression d'un projet.
    */
    public function test_delete_task()
    {
        $this->actingAs($this->user);
        $task = Task::factory()->create();
        $this->taskRepository->destroy($task->id);
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }

    /**
     * Teste la recherche de tasks.
    */
    public function test_task_search()
    {
        $this->actingAs($this->user);
        $taskData = [
            'nom' => 'tests',
            'description' => 'search task test',
            
        ];
        $this->taskRepository->create($taskData);
        $searchValue = 'tests';
        $searchResults = $this->taskRepository->searchData($searchValue);
        $this->assertTrue($searchResults->contains('nom', $searchValue));
    }

}