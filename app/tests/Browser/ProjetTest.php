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
            $browser->assertSee('Le projet a été ajouté avec succès.');

        });
    }

    private function searchProject($searchValue): void
    {
        $this->browse(function (Browser $browser) use ($searchValue) {
            $browser->visit('/projets');
            $browser->type('table_search', $searchValue);
            $browser->waitForText($searchValue);
        });
    }

    public function testDetailsProject(): void
    {
        $this->browse(function (Browser $browser) {

            $this->SearchProject('nom test');
            $browser->click('.btn.btn-default.btn-sm i.far.fa-eye');
            $browser->assertSee('Detail');
        });
    }

    public function testEditProject(): void
    {
        $this->browse(function (Browser $browser) {
            $this->SearchProject('nom test');
            $browser->click('.btn.btn-sm.btn-default i.fas.fa-pen-square');
            $browser->clear('nom')->type('nom', 'edit test');
            $browser->clear('.ck-content p')->type('.ck-content p', 'edit description test');
            $browser->press('Modifier');
            // $browser->waitForLocation('/projets');
            // $browser->assertPathIs('/projets');
            $browser->assertSee('Le projet a été modifier avec succès.');

        });
    }


    public function testDeleteProject(): void
    {
        $this->browse(function (Browser $browser) {
            $this->SearchProject('edit test');
            $browser->click('.btn.btn-sm.btn-danger i.fas.fa-trash');

            $browser->acceptDialog();

        });

    }


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
            $browser->assertSee('Projet est déjà existant');
            $browser->waitForLocation('/projets/create');
            $browser->assertPathIs('/projets/create');

        });

    }





    // protected function tearDown(): void
    // {
    //     parent::tearDown();
    // }

}
