<?php

namespace App\Services;

use App\Enums\FormStatusEnum;
use App\Enums\FormTypeEnum;
use Illuminate\Validation\Rule;

class FormService{

    public function create($data): \App\Models\Form
    {
        // Validate input
        $validator = \Validator::make($data, [
            'client_id' => 'required|exists:clients,id',
            'form_type' => [
                'required',
                Rule::in(array_column(FormTypeEnum::cases(), 'value')),
            ],
            'description' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            throw new \Illuminate\Validation\ValidationException($validator);
        }

        $validData = $validator->validated();

        // Get latest template for the given type
        $template = \App\Models\FormTemplate::where('type', $validData['form_type'])
            ->latest()
            ->first();

        if (!$template) {
            throw new \Exception('No form template found for the specified type.');
        }

        // Create the form
        $form = new \App\Models\Form([
            'client_id' => $validData['client_id'],
            'status' => FormStatusEnum::PENDING,
            'description' => $validData['description'] ?? null,
            'form_template_id' => $template->id,
            'created_by' => auth()->id(),
            'user_id' => auth()->id(),
        ]);
        $form->save();

        return $form;
    }
}
