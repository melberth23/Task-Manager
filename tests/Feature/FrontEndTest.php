<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FrontEndTest extends TestCase
{
    /**
     * Fetch projects.
     *
     * @return void
     */
    public function testGetProjects()
    {
        $this->json('GET', 'api/projects', [], ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "projects" => [
                    "name" => "Retrieve Unit Test",
                    "description" => "Retrieve Unit Test Description",
                    "status" => "Active"
                ],
                "message" => "Retrieved successfully"
            ]);
    }
}
