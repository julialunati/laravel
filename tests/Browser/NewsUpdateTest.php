<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsUpdateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    
    public function testNewsUpdate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/13/edit')
                // ->select('category_id', '7')
                ->type('title', 'some new title')
                ->press('save')
                ->assertPathIs('/admin/news/');
        });
    }
}
