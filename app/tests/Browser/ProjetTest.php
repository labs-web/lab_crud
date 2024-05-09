<?php

namespace Tests\Browser;

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
            // $innerText = $browser->element('.ck-content p')->getText();
            // $innerText = 'description test';
            $browser->press('Ajouter');
            $browser->assertPathIs('/projets');
            $browser->assertSee('Le projet a été ajouté avec succès.');

        });
    }

    public function testCreateProjectAlreadyExist(): void
    {

        $this->browse(function (Browser $browser) {
            $this->login_admin($browser);

        });

    }


}
