<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_employee_creation()
    {
        $department = Department::factory()->create();

        $response = $this->postJson('/api/employees', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'department_id' => $department->id
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('employees', ['email' => 'john@example.com']);
    }
}
