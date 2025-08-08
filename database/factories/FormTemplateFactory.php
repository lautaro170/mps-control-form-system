<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FormTemplate>
 */
class FormTemplateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->sentence(),
            'type' => \App\Enums\FormTypeEnum::SERVICIO_TECNICO_GRUPO_ELECTROGENO->value,
            'json_definition' => json_encode([
                'title' => $this->faker->words(3, true),
                'description' => $this->faker->sentence(),
                'fields' => [
                    [
                        'type' => 'text',
                        'label' => 'Nombre',
                        'name' => 'name',
                        'required' => true,
                    ],
                    [
                        'type' => 'email',
                        'label' => 'Correo Electrónico',
                        'name' => 'email',
                        'required' => true,
                    ],
                    [
                        'type' => 'textarea',
                        'label' => 'Comentarios',
                        'name' => 'comments',
                        'required' => false,
                    ],
                ]
            ]),
        ];
    }
}
