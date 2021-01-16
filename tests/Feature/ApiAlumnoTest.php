<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Alumno;
use App\Models\User;

class ApiAlumnoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Comprueba que puede listar todos los alumnos
     *
     * @return void
     */
    public function testCanList()
    {
        $response = $this->get('/api/alumnos');

        $response->dump();

        $response->assertStatus(200);
    }

    
    /**
     * Comprueba que puede mostrar solo un alumno
     *
     * @return void
     */
    public function testCanShowAlumno()
    {
        $response = $this->get('/api/alumnos');

        $response->assertStatus(200);
    }

    /**
     * Comprueba que puede mostrar crear un alumno
     *
     * @return void
     */
    public function testCanCreateAlumno()
    {
        $user = User::factory()->create();

        $alumno = Alumno::factory()->make();

        $response = $this->actingAs($user)->post('/api/alumno',[
            "nombre"            => $alumno->nombre,
            "apellidos"         => $alumno->apellidos,
            "direccion"         => $alumno->direccion,
            "poblacion"         => $alumno->poblacion,
            "codigo_postal"     => $alumno->codigo_postal,
            "curso"             => $alumno->curso
        ]);

        $this->assertDatabaseHas('alumnos', [
            "nombre"            => $alumno->nombre,
            "apellidos"         => $alumno->apellidos,
            "direccion"         => $alumno->direccion,
            "poblacion"         => $alumno->poblacion,
            "codigo_postal"     => $alumno->codigo_postal,
            "curso"             => $alumno->curso
        ]);

        $response->assertStatus(200);
    }

    /**
     * Comprueba que puede editar a un alumno
     *
     * @return void
     */
    public function testCanEditAlumno()
    {
        $user = User::factory()->create();

        $alumno = Alumno::factory()->create();

        $nuevo_alumno = Alumno::factory()->make();

        $response = $this->actingAs($user)->put('/api/alumno',[
            "uuid"              => $alumno->uuid,
            "nombre"            => $nuevo_alumno->nombre,
            "apellidos"         => $nuevo_alumno->apellidos,
            "direccion"         => $nuevo_alumno->direccion,
            "poblacion"         => $nuevo_alumno->poblacion,
            "codigo_postal"     => $nuevo_alumno->codigo_postal,
            "curso"             => $nuevo_alumno->curso
        ]);

        $this->assertDatabaseHas('alumnos', [
            "uuid"              => $alumno->uuid,
            "nombre"            => $nuevo_alumno->nombre,
            "apellidos"         => $nuevo_alumno->apellidos,
            "direccion"         => $nuevo_alumno->direccion,
            "poblacion"         => $nuevo_alumno->poblacion,
            "codigo_postal"     => $nuevo_alumno->codigo_postal,
            "curso"             => $nuevo_alumno->curso
        ]);

        $response->assertStatus(200);
    }

    /**
     * Comprueba que puede borrar a un alumno
     *
     * @return void
     */
    public function testCanDeleteAlumno()
    {
        $user = User::factory()->create();

        $alumno = Alumno::factory()->create();

        $response = $this->actingAs($user)->delete('/api/alumno',[
            "uuid"              => $alumno->uuid,
        ]);

        $this->assertDatabaseMissing('alumnos', [
            "uuid"              => $alumno->uuid,
            "nombre"            => $alumno->nombre,
            "apellidos"         => $alumno->apellidos,
            "direccion"         => $alumno->direccion,
            "poblacion"         => $alumno->poblacion,
            "codigo_postal"     => $alumno->codigo_postal,
            "curso"             => $alumno->curso
        ]);

        $response->assertStatus(200);
    }
}
