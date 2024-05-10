<?php

namespace Tests\Browser;

use App\Models\GestionProjets\Projet;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProjetTest extends BaseDuskTest
{
    /**
     * @group gestionProjet
     * Test case for creating a new project.
     */
    public function testCreateProjet(): void
    {
        $this->browse(function (Browser $browser) {
            $this->login_admin($browser);
            $browser->assertSee('Statistiques');
            $browser->visit('/projets');
            $browser->visit('/projets/create');
            $browser->type('nom', 'nom test');
            $browser->type('.ck-content p', 'description test');
            $browser->press('Ajouter');
            $browser->waitForLocation('/projets');
            $browser->assertPathIs('/projets');
            $browser->assertSee('Projet a été ajouté avec succès.');
        });
    }

    /**
     * Helper method to search for a project using the search input.
     *
     * @param string $searchValue The value to search for.
     */
    private function searchProject($searchValue): void
    {
        $this->browse(function (Browser $browser) use ($searchValue) {
            $browser->visit('/projets');
            $browser->type('table_search', $searchValue);
            $browser->waitForText($searchValue);
        });
    }

    /**
     * Test case for viewing project details.
     */
    public function testDetailsProject(): void
    {
        $this->browse(function (Browser $browser) {
            $this->SearchProject('nom test');
            $browser->click('.btn.btn-default.btn-sm i.far.fa-eye');
            $browser->assertSee('Détail');
        });
    }

    /**
     * Test case for editing a project.
     */
    public function testEditProject(): void
    {
        $this->browse(function (Browser $browser) {
            $this->SearchProject('nom test');
            $browser->click('.btn.btn-sm.btn-default i.fas.fa-pen-square');
            $browser->clear('nom')->type('nom', 'edit test');
            $browser->clear('.ck-content p')->type('.ck-content p', 'edit description test');
            $browser->press('Modifier');
            $browser->waitForLocation('/projets');
            $browser->assertPathIs('/projets');
            $browser->assertSee('Projet a été mis à jour avec succès.');
        });
    }

    /**
     * Test case for deleting a project.
     */
    public function testDeleteProject(): void
    {
        $this->browse(function (Browser $browser) {
            $this->SearchProject('edit test');
            $browser->click('.btn.btn-sm.btn-danger i.fas.fa-trash');
            $browser->assertDialogOpened('Êtes-vous sûr de vouloir supprimer ce projet ?')->acceptDialog();
            $browser->waitForLocation('/projets');
            $browser->assertPathIs('/projets');
            // $browser->assertSee('Le projet a été supprimer avec succés.');
        });
    }

    /**
     * Test case for creating a project that already exists.
     */
    public function testCreateProjectAlreadyExist(): void
    {
        $this->browse(function (Browser $browser) {
            $existingProject = Projet::factory()->create([
                'nom' => 'project test',
                'description' => 'project description test',
            ]);
            $browser->visit('/projets');
            $browser->visit('/projets/create');
            $browser->type('nom', $existingProject->nom);
            $browser->type('.ck-content p', $existingProject->description);
            $browser->press('Ajouter');
            // $browser->assertSee('Projet est déjà existant');
            $browser->waitForLocation('/projets/create');
            $browser->assertPathIs('/projets/create');
        });
    }


    // protected function tearDown(): void
    // {
    //     parent::tearDown();
    // }

}
