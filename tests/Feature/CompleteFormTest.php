<?php

namespace Tests\Feature;

use App\Enums\FormStatusEnum;
use App\Models\Form;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompleteFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_form_status_changes_to_completed_not_sent_when_completed()
    {
        // Create a fake user and authenticate
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create a form
        $form = Form::factory()->create([
            'status' => FormStatusEnum::PENDING,
            'user_id' => $user->id,
            'created_by' => $user->id,
        ]);

        // Simulate API call to complete the form
        $response = $this->patchJson(route('forms.complete-form', $form), [
            'json_value' => json_encode(['field' => 'value'])
        ]);

        $response->assertStatus(200);

        // Refresh form and assert status
        $form->refresh();
        $this->assertEquals(FormStatusEnum::COMPLETED_NOT_SENT, $form->status);
    }
}

