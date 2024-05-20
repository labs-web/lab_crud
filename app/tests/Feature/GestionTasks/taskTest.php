<?php

namespace Tests\Feature\GestionTasks;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Exceptions\GestionTasks\TaskAlreadyExistException;
use App\Models\GestionProjets\Projet;
use App\Models\GestionTasks\Task;
use App\Repositories\GestionTasks\TaskRepository;

class TaskTest extends TestCase
{
    use DatabaseTransactions;

    protected $taskRepository;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->taskRepository = new TaskRepository(new Task);
        $this->user = User::factory()->create();
    }

    public function test_paginate()
    {
        $this->actingAs($this->user);
        $project = Projet::factory()->create();
        $taskData = [
            'nom' => 'task create test',
            'description' => 'task create test',
            'project_id' => $project->id,
        ];
        $task = $this->taskRepository->create($taskData);
        $tasks = $this->taskRepository->paginate();
        $this->assertNotNull($tasks);
    }
    
    public function test_create()
    {
        $this->actingAs($this->user);
        $project = Projet::factory()->create();
        $taskData = [
            'nom' => 'task create test',
            'description' => 'task create test',
            'project_id' => $project->id,
        ];
        $task = $this->taskRepository->create($taskData);
        $this->assertEquals($taskData['nom'], $task->nom);
        $this->assertEquals($taskData['project_id'], $task->project_id);
    }

    public function test_create_task_already_exist()
    {
        $this->actingAs($this->user);
        $project = Projet::factory()->create();
        $task = Task::factory()->create(['project_id' => $project->id]);
        $taskData = [
            'nom' => $task->nom,
            'description' => 'task create test',
            'project_id' => $project->id,
        ];
    
        try {
            $task = $this->taskRepository->create($taskData);
            $this->fail('Expected TaskAlreadyExistException was not thrown');
        } catch (TaskAlreadyExistException $e) {
            $this->assertEquals(__('GestionTasks/task/message.createTaskException'), $e->getMessage());
        } catch (\Exception $e) {
            $this->fail('Unexpected exception was thrown: ' . $e->getMessage());
        }
    }
    
    public function test_update()
    {
        $this->actingAs($this->user);
        $project = Projet::factory()->create();
        $task = Task::factory()->create(['project_id' => $project->id]);
        $taskData = [
            'nom' => 'task update test',
            'description' => 'task update test',
            'project_id' => $project->id,
        ];
        $this->taskRepository->update($task->id, $taskData);
        $this->assertDatabaseHas('tasks', $taskData);
    }
    
    public function test_delete_task()
    {
        $this->actingAs($this->user);
        $project = Projet::factory()->create();
        $task = Task::factory()->create(['project_id' => $project->id]);
        $this->taskRepository->destroy($task->id);
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
    public function test_task_search()
    {
        $this->actingAs($this->user);
        $project = Projet::factory()->create();
        $taskData = [
            'nom' => 'tests',
            'description' => 'search task test',
            'project_id' => $project->id,
        ];
        $this->taskRepository->create($taskData);
        $searchValue = 'tests';
        $searchResults = $this->taskRepository->searchData($searchValue);
        $this->assertTrue($searchResults->contains('nom', $searchValue));
    }
}