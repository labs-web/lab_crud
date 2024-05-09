<?php

namespace Tests\Feature\GestionProjets;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\GestionProjets\ProjetRepository;
use App\Models\GestionProjets\Projet;
use Tests\TestCase;
use App\Exceptions\GestionProjets\ProjectAlreadyExistException;

/**
 * Classe de test pour tester les fonctionnalités du module de projets.
*/
class projetTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Le référentiel de projets utilisé pour les tests.
     *
     * @var ProjetRepository
    */
    protected $projectRepository;

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
        $this->projectRepository = new ProjetRepository(new Projet);
        $this->user = User::factory()->create();
    }

    /**
     * Teste la pagination des projets.
    */
    public function test_paginate()
    {
        $this->actingAs($this->user);
        $projectData = [
            'nom' => 'project create test',
            'description' => 'project create test',
            
        ];
        $project = $this->projectRepository->create($projectData);
        $projects = $this->projectRepository->paginate();
        $this->assertNotNull($projects);
    }


    /**
     * Teste la création d'un projet.
    */
    public function test_create()
    {
        $this->actingAs($this->user);
        $projectData = [
            'nom' => 'project create test',
            'description' => 'project create test',
            
        ];
        $project = $this->projectRepository->create($projectData);
        $this->assertEquals($projectData['nom'], $project->nom);
    }

    /**
     * Teste la création d'un projet déjà existant.
    */
    public function test_create_project_already_exist()
    {
        $this->actingAs($this->user);

        $project = Projet::factory()->create();
        $projectData = [
            'nom' => $project->nom,
            'description' => 'project create test',
           
        ];

        try {
            $project = $this->projectRepository->create($projectData);
            $this->fail('Expected ProjectException was not thrown');
        } catch (ProjectAlreadyExistException $e) {
            $this->assertEquals(__('GestionProjets/projet/message.createProjectException'), $e->getMessage());
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
        $projectData = [
            'nom' => 'project update test',
            'description' => 'project update test',
           
        ];
        $this->projectRepository->update($project->id, $projectData);
        $this->assertDatabaseHas('projets', $projectData);
    }

    /**
     * Teste la suppression d'un projet.
    */
    public function test_delete_project()
    {
        $this->actingAs($this->user);
        $project = Projet::factory()->create();
        $this->projectRepository->destroy($project->id);
        $this->assertDatabaseMissing('projets', ['id' => $project->id]);
    }

    /**
     * Teste la recherche de projets.
    */
    public function test_project_search()
    {
        $this->actingAs($this->user);
        $projectData = [
            'nom' => 'tests',
            'description' => 'search project test',
            
        ];
        $this->projectRepository->create($projectData);
        $searchValue = 'tests';
        $searchResults = $this->projectRepository->searchData($searchValue);
        $this->assertTrue($searchResults->contains('nom', $searchValue));
    }

}