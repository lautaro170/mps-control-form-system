<?php

namespace Tests\Feature;

use App\Enums\FormStatusEnum;
use App\Enums\FormTypeEnum;
use App\Models\Client;
use App\Models\FormTemplate;
use App\Models\User;
use App\Services\FormService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FormServiceTest extends TestCase
{
    use RefreshDatabase;
    public function test_create_form_successfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $client = Client::factory()->create();
        $template = FormTemplate::factory()->create();

        $service = new FormService();
        $data = [
            'client_id' => $client->id,
            'form_type' => $template->type->value, // Use the raw value, not $template->type->value
            'description' => 'Test description',
        ];

        $form = $service->create($data);

        $this->assertNotNull($form);
        $this->assertEquals($client->id, $form->client_id);
        $this->assertEquals(FormStatusEnum::PENDING, $form->status);
        $this->assertEquals('Test description', $form->description);
    }

    public function test_create_form_fails_with_invalid_data()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $service = new FormService();
        $data = [
            'client_id' => 9999, // Non-existent client
            'form_type' => 'invalid_type',
        ];

        $this->expectException(\Illuminate\Validation\ValidationException::class);
        $service->create($data);
    }

    public function test_create_form_fails_without_template()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $client = Client::factory()->create();
        $service = new FormService();
        $data = [
            'client_id' => $client->id,
            'form_type' => FormTypeEnum::cases()[0]->value,
        ];

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('No form template found for the specified type.');
        $service->create($data);
    }

    public function test_unauthorized_user_cannot_create_form()
    {
        // Not logged in
        $client = Client::factory()->create();
        $template = FormTemplate::factory()->create();
        $service = new FormService();
        $data = [
            'client_id' => $client->id,
            'form_type' => $template->type->value,
            'description' => 'Test description',
        ];
        $this->expectException(\Exception::class);
        $service->create($data);
    }

    public function test_missing_required_fields_fails_validation()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $service = new FormService();
        $data = [
            // Missing client_id and form_type
            'description' => 'Test description',
        ];
        $this->expectException(\Illuminate\Validation\ValidationException::class);
        $service->create($data);
    }

    public function test_invalid_client_id_type_fails_validation()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $service = new FormService();
        $data = [
            'client_id' => 'not-an-integer',
            'form_type' => FormTypeEnum::QUALITY->value,
            'description' => 'Test description',
        ];
        $this->expectException(\Illuminate\Validation\ValidationException::class);
        $service->create($data);
    }

    public function test_form_template_soft_deleted_is_not_used()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $client = Client::factory()->create();
        $template = FormTemplate::factory()->create();
        $template->delete(); // Soft delete
        $service = new FormService();
        $data = [
            'client_id' => $client->id,
            'form_type' => $template->type->value,
            'description' => 'Test description',
        ];
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('No form template found for the specified type.');
        $service->create($data);
    }

    public function test_form_is_persisted_and_linked_correctly()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $client = Client::factory()->create();
        $template = FormTemplate::factory()->create();
        $service = new FormService();
        $data = [
            'client_id' => $client->id,
            'form_type' => $template->type->value,
            'description' => 'Test description',
        ];
        $form = $service->create($data);
        $this->assertDatabaseHas('forms', [
            'id' => $form->id,
            'client_id' => $client->id,
            'form_template_id' => $template->id,
            'description' => 'Test description',
        ]);
    }

    public function test_complete_form_successfully()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        $client = \App\Models\Client::factory()->create();
        $template = \App\Models\FormTemplate::factory()->create();
        $form = \App\Models\Form::factory()->create([
            'client_id' => $client->id,
            'form_template_id' => $template->id,
            'user_id' => $user->id,
            'created_by' => $user->id,
            'status' => \App\Enums\FormStatusEnum::PENDING,
        ]);
        $service = new \App\Services\FormService();
        $json_values = json_encode(['foo' => 'bar', 'baz' => 123]);
        $completedForm = $service->completeForm($form, $json_values);
        $this->assertEquals(\App\Enums\FormStatusEnum::COMPLETED_NOT_SENT, $completedForm->status);
        $this->assertEquals($json_values, $completedForm->json_values);
        $this->assertNotNull($completedForm->completed_at);
        $this->assertDatabaseHas('forms', [
            'id' => $form->id,
            'status' => \App\Enums\FormStatusEnum::COMPLETED_NOT_SENT,
            'json_values' => $json_values,
        ]);
    }

    public function test_complete_form_overwrites_previous_values()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        $client = \App\Models\Client::factory()->create();
        $template = \App\Models\FormTemplate::factory()->create();
        $form = \App\Models\Form::factory()->create([
            'client_id' => $client->id,
            'form_template_id' => $template->id,
            'user_id' => $user->id,
            'created_by' => $user->id,
            'status' => \App\Enums\FormStatusEnum::PENDING,
            'json_values' => json_encode(['old' => 'value']),
        ]);
        $service = new \App\Services\FormService();
        $new_json_values = json_encode(['new' => 'value']);
        $completedForm = $service->completeForm($form, $new_json_values);
        $this->assertEquals($new_json_values, $completedForm->json_values);
        $this->assertNotEquals(json_encode(['old' => 'value']), $completedForm->json_values);
    }
}
