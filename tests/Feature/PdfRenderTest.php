<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Form;
use App\Models\User;

class PdfRenderTest extends TestCase
{
    use RefreshDatabase;

    public function test_pdf_preview_route_returns_200()
    {
        // Create a user and authenticate
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create a form with mock data
        $form = Form::factory()->create([
            'json_values' => json_encode([
                'cliente_smo' => 'SMA Test',
                'cliente_direccion' => 'Test Address',
                'cliente_localidad' => 'Test City',
            ]),
        ]);

        // Call the test-pdf route
        $response = $this->get(route('forms.test-pdf', ['form' => $form->id]));

        $response->assertStatus(200);
        $response->assertSee('PLANILLA SERVICIO TÉCNICO GRUPO ELECTRÓGENO');
    }
}

