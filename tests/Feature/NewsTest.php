<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_news_list_status()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
    }

    public function test_news_show_status()
    {
        $id = mt_rand(1, 5);
        $response = $this->get('/news/' . $id);

        $response->assertStatus(200);
    }

    public function test_index_json()
    {
        $response = $this->get('/');

        $response->assertJson([
            'title' => 'laravel',
            'description' => 'framework'
        ]);
    }

    public function test_structure_json()
    {
        $response = $this->get('/');

        $response->assertJsonStructure([
            'title',
            'description'
        ]);
    }

    public function test_unknown_routing()
    {

        $response = $this->get('/story/');

        $response->assertNotFound();
    }

    public function test_welcome_view()
    {
        $view = $this->view('welcome');

        $view->assertSee('Laravel');
    }

    public function test_incompleted_form_admin_err()
    {
        $view = $this->withViewErrors([
            'title' => ['The title field is required.']
        ])->view('admin.news.create');

        $view->assertSee('The title field is required.');
    }

    public function test_incompleted_form_request_err()
    {
        $view = $this->withViewErrors([
            'request' => ['The request field is required.'],
        ])->view('news.contact');

        $view->assertSee('The request field is required.');
    }

    public function test_incompleted_form_name_err()
    {
        $view = $this->withViewErrors([
            'name' => ['The name field is required.'],
        ])->view('news.contact');

        $view->assertSee('The name field is required.');
    }
    public function test_text()
    {
        $response = $this->get('/news/Moscow/2');
        $value = "Arbat street is 520 years making it one of the oldest streets in Moscow.";

        $response->assertSeeText($value, $escaped = true);
    }

    public function test_session_has_no_errors()
    {
        $response = $this->get('/news/');

        $response->assertSessionHasNoErrors();
    }

    public function test_interacting_with_headers()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Control panel',
        ])->post('/admin');

        $response->assertStatus(405);
    }
}
