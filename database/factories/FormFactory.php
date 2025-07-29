<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Form;
use App\Models\FormTemplate;
use App\Models\Client;
use App\Models\User;
use App\Enums\FormStatusEnum;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Form>
 */
class FormFactory extends Factory
{
    protected $model = Form::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->sentence(),
            'status' => FormStatusEnum::PENDING,
            'json_values' => '{}',
            'form_template_id' => FormTemplate::factory(),
            'client_id' => Client::factory(),
            'user_id' => User::factory(),
            'created_by' => User::factory(),
            'completed_at' => null,
        ];
    }
}
