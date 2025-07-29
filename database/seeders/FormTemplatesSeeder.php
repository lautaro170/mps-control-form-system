<?php

namespace Database\Seeders;

use App\Enums\FormTypeEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormTemplatesSeeder extends Seeder
{
    public function run(): void
    {

        $formTemplates =
            [
                [
                    "description" => 'Este es un formulario de ejemplo para demostrar la funcionalidad del sistema.',
                    "type" => FormTypeEnum::QUALITY->value,
                    "json_definition" => json_encode([
                        'title' => 'Formulario de ejemplo',
                        'description' => 'Este es un formulario de ejemplo para demostrar la funcionalidad del sistema.',
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
                ],
            ];

        foreach ($formTemplates as $formTemplate) {
            \App\Models\FormTemplate::updateOrCreate(
                ['description' => $formTemplate['description']],
                [
                    'type' => $formTemplate['type'],
                    'json_definition' => $formTemplate['json_definition'],
                ]
            );
        }
    }
}
