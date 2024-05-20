<?php

namespace Tests\Feature\GestionTasks;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\GestionProjets\ProjetRepository;
use App\Models\GestionProjets\Projet;
use App\Models\GestionProjets\Tag;

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
        $tags = [];
        $tags[] = Tag::create([
            'nom' => 'Tag 1',
            'description' => 'Description for Tag 1'
        ]);
        $tags[] = Tag::create([
            'nom' => 'Tag 2',
            'description' => 'Description for Tag 2'
        ]);
        
        $tagIds = [];
        foreach ($tags as $tag) {
            $tagIds[] = $tag->id;
        }
        
        $projectData = [
            'nom' => 'project test',
            'description' => 'project test',
            'tags' => $tagIds,
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
        $tags = [];
        $tags[] = Tag::create([
            'nom' => 'Tag 1',
            'description' => 'Description for Tag 1'
        ]);
        $tags[] = Tag::create([
            'nom' => 'Tag 2',
            'description' => 'Description for Tag 2'
        ]);
        
        $tagIds = [];
        foreach ($tags as $tag) {
            $tagIds[] = $tag->id;
        }
        
        $projectData = [
            'nom' => 'project test',
            'description' => 'project test',
            'tags' => $tagIds,
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

        $tags = [];
        $tags[] = Tag::create([
            'nom' => 'Tag 1',
            'description' => 'Description for Tag 1'
        ]);
        $tags[] = Tag::create([
            'nom' => 'Tag 2',
            'description' => 'Description for Tag 2'
        ]);
        
        $tagIds = [];
        foreach ($tags as $tag) {
            $tagIds[] = $tag->id;
        }
        
        $projectData = [
            'nom' => 'project test',
            'description' => 'project test',
            'tags' => $tagIds,
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
    $project = Projet::factory()->create();
    
    $tags = [];
    $tags[] = Tag::create([
        'nom' => 'Tag 1',
        'description' => 'Description for Tag 1'
    ]);
    $tags[] = Tag::create([
        'nom' => 'Tag 2',
        'description' => 'Description for Tag 2'
    ]);
    
    $tagIds = [];
    foreach ($tags as $tag) {
        $tagIds[] = $tag->id;
    }
    
    $projectData = [
        'nom' => 'project update test',
        'description' => 'project update test',
        'tags' => $tagIds,
    ];
    
    $this->projectRepository->update($project->id, $projectData);
    
    $this->assertDatabaseHas('projets', [
        'id' => $project->id,
        'nom' => 'project update test',
        'description' => 'project update test',
    ]);
    
    foreach ($tags as $tag) {
        $this->assertDatabaseHas('projet_tags', [
            'projet_id' => $project->id,
            'tag_id' => $tag->id,
        ]);
    }
}

    /**
     * Teste la suppression d'un projet.
    */
    public function test_delete_task()
    {
        $this->actingAs($this->user);
        $tags = [];
        $tags[] = Tag::create([
            'nom' => 'Tag 1',
            'description' => 'Description for Tag 1'
        ]);
        $tags[] = Tag::create([
            'nom' => 'Tag 2',
            'description' => 'Description for Tag 2'
        ]);
        
        $tagIds = [];
        foreach ($tags as $tag) {
            $tagIds[] = $tag->id;
        }
        
        $projectData = [
            'nom' => 'project test',
            'description' => 'project test',
            'tags' => $tagIds,
        ];
        $project = $this->projectRepository->create($projectData);
        $this->projectRepository->destroy($project->id);
        $this->assertDatabaseMissing('projets', ['id' => $project->id]);
    }

    /**
     * Teste la recherche de tasks.
    */
    public function test_task_search()
    {
        $this->actingAs($this->user);
        $tags = [];
        $tags[] = Tag::create([
            'nom' => 'Tag 1',
            'description' => 'Description for Tag 1'
        ]);
        $tags[] = Tag::create([
            'nom' => 'Tag 2',
            'description' => 'Description for Tag 2'
        ]);
        
        $tagIds = [];
        foreach ($tags as $tag) {
            $tagIds[] = $tag->id;
        }
        
        $projectData = [
            'nom' => 'project test',
            'description' => 'project test',
            'tags' => $tagIds,
        ];
        $project = $this->projectRepository->create($projectData);
        $searchValue = 'tests';
        $searchResults = $this->taskRepository->searchData($searchValue);
        $this->assertTrue($searchResults->contains('nom', $searchValue));
    }

}