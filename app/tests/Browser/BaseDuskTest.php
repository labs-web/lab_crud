<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class BaseDuskTest extends DuskTestCase
{

    protected static $migrationRun = false;

    protected function setUp(): void{
        parent::setUp();
        if (!static::$migrationRun) {
            $this->artisan('migrate:fresh');
            $this->artisan('db:seed', ['--class' => 'DatabaseSeeder']);
            static::$migrationRun = true;
        }
    }



    public function login_admin($browser):void
    {
        // Login
        $browser->visit('/login');
        $browser->type('email', 'admin@gmail.com');
        $browser->type('password', 'admin');
        $browser->press('Se connecter');
        // $browser->assertPathIs('/home');
    }

    public function login_membre($browser):void
    {
        // Login
        $browser->visit('/login');
        $browser->type('email', 'membre@gmail.com');
        $browser->type('password', 'membre');
        $browser->press('Se connecter');
        // $browser->assertPathIs('/');
    }



}
