<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BackEndTest extends TestCase
{
    /**
     * Add project.
     *
     * @return void
     */
    public function testAddProject()
    {
        $projData = [
            "name" => "Unit Test",
            "description" => "Unit Test Description"
        ];

        $this->json('POST', 'api/projects', $projData, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure([
                "projects" => [
                    'id',
                    'name',
                    'description',
                    'status',
                    'created_at',
                    'updated_at',
                ],
                "access_token",
                "message"
            ]);
    }
}
