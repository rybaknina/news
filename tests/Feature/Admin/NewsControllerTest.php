<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    public function test_news_index_successful_page(): void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertViewIs('admin.news.index')
            ->assertStatus(200);
    }

    public function test_news_create_successful_page(): void
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertViewIs('admin.news.create')
            ->assertStatus(200);
    }

    public function test_news_create_return_json_page(): void
    {
        $author = fake()->userName();
        $title = fake()->jobTitle();
        $description = fake()->text(100);

        $data = [
            'author' => $author,
            'title' => $title,
            'description' => $description
        ];

        $response = $this->post(route('admin.news.store'), $data);

        $response->assertJson($data)
            ->assertStatus(200);
    }

}
