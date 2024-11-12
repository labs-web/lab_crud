<?php

namespace Tests\Feature\GestionProjets;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\GestionProjets\TagRepository;
use App\Models\GestionProjets\Tag;
use Tests\TestCase;
use App\Exceptions\GestionProjets\TagAlreadyExistException;

/**
 * Classe de test pour tester les fonctionnalités du module de tags.
*/
class tagTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Le référentiel de tags utilisé pour les tests.
     *
     * @var TagRepository
    */
    protected $tagRepository;

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
        $this->tagRepository = new TagRepository(new Tag);
        $this->user = User::factory()->create();
    }

    /**
     * Teste la pagination des projets.
    */
    public function test_paginate()
    {
        $this->actingAs($this->user);
        $tagData = [
            'nom' => 'test',
            'description' => 'test',
            
        ];
        $tag = $this->tagRepository->create($tagData);
        $tags = $this->tagRepository->paginate();
        $this->assertNotNull($tags);
    }


    /**
     * Teste la création d'un tag.
    */
    public function test_create()
    {
        $this->actingAs($this->user);
        $tagData = [
            'nom' => 'test',
            'description' => 'test',
            
        ];
        $tag = $this->tagRepository->create($tagData);
        $this->assertEquals($tagData['nom'], $tag->nom);
    }

    /**
     * Teste la création d'un projet déjà existant.
    */
    public function test_create_project_already_exist()
    {
        $this->actingAs($this->user);
        $tagData = [
            'nom' => 'test',
            'description' => 'test',
            
        ];
        $tag = $this->tagRepository->create($tagData);
        $tagData = [
            'nom' => $tag->nom,
            'description' => $tag->description,
        ];

        try {
            $tag = $this->tagRepository->create($tagData);
            $this->fail('Expected ProjectException was not thrown');
        } catch (TagAlreadyExistException $e) {
            $this->assertEquals(__('GestionProjets/tag/message.createTagException'), $e->getMessage());
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
        $tagData = [
            'nom' => 'test',
            'description' => 'test',
            
        ];
        $tag = $this->tagRepository->create($tagData);

        $tagDataUpdate = [
            'nom' => 'test1',
            'description' => 'test1',
            
        ];
        $this->tagRepository->update($tag->id, $tagDataUpdate);
        $this->assertDatabaseHas('tags', $tagDataUpdate);
    }

    /**
     * Teste la suppression d'un projet.
    */
    public function test_delete_project()
    {
        $this->actingAs($this->user);
        $tagData = [
            'nom' => 'test',
            'description' => 'test',
            
        ];
        $tag = $this->tagRepository->create($tagData);
        $this->tagRepository->destroy($tag->id);
        $this->assertDatabaseMissing('tags', ['id' => $tag->id]);
    }

    /**
     * Teste la recherche de projets.
    */
    public function test_project_search()
    {
        $this->actingAs($this->user);
        $this->actingAs($this->user);
        $tagData = [
            'nom' => 'test',
            'description' => 'test',
            
        ];
        $tag = $this->tagRepository->create($tagData);
        $searchValue = 'test';
        $searchResults = $this->tagRepository->searchData($searchValue);
        $this->assertTrue($searchResults->contains('nom', $searchValue));
    }

}