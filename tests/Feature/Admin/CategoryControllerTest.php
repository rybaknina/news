<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    public function test_categories_successful_page()
    {
        $response = $this->get(route('admin.categories.index'));

        $response->assertStatus(200);
    }

    public function test_categories_create_successful_page()
    {
        $response = $this->get(route('admin.categories.create'));

        $response->assertViewIs('admin.categories.create')
            ->assertStatus(200);
    }

    public function test_categories_create_return_json_page()
    {
        $title = fake()->jobTitle();
        $description = fake()->text(100);

        $data = [
            'title' => $title,
            'description' => $description
        ];

        $response = $this->post(route('admin.categories.store'), $data);

        $response->assertJson($data)
            ->assertStatus(200);
    }
}
