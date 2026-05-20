<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserCrudTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Helper para crear un usuario administrador
     */
    protected function createAdmin()
    {
        return User::factory()->create([
            'rol' => 'admin',
            'email' => 'admin@tenderete.com',
            'fecha_nacimiento' => '1990-01-01',
        ]);
    }

    public function test_users_can_be_listed()
    {
        $admin = $this->createAdmin();

        $response = $this->actingAs($admin)->get('/usuarios');

        $response->assertStatus(200);
    }

    public function test_user_can_be_created()
    {
        $admin = $this->createAdmin();

        $response = $this->actingAs($admin)
            ->from('/usuarios')
            ->post('/usuarios', [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => 'password',
                'fecha_nacimiento' => '1990-01-01',
                'genero' => 'hombre',
                'numero_telefono' => '123456789',
            ]);

        $response->assertRedirect('/usuarios');
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'genero' => 'hombre',
        ]);
    }

    public function test_user_can_be_updated()
    {
        $admin = $this->createAdmin();
        $user = User::factory()->create();

        $response = $this->actingAs($admin)->put("/usuarios/{$user->id}", [
            'name' => 'Updated User',
            'email' => 'updated@example.com',
            'fecha_nacimiento' => '1992-02-02',
            'genero' => 'mujer',
            'numero_telefono' => '987654321',
        ]);

        $response->assertRedirect('/usuarios');
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => 'updated@example.com',
            'genero' => 'mujer',
        ]);
    }

    public function test_user_can_be_deleted()
    {
        $admin = $this->createAdmin();
        $user = User::factory()->create();

        $response = $this->actingAs($admin)->delete("/usuarios/{$user->id}");

        $response->assertRedirect('/usuarios');
        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }
}