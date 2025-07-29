<?php

namespace App\Filament\Resources\FormResource\Pages;

use App\Filament\Resources\FormResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateForm extends CreateRecord
{
    protected static string $resource = FormResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $latestTemplate = \App\Models\FormTemplate::where('type', $data['form_type'])
            ->latest()
            ->first();

        if ($latestTemplate) {
            $data['form_template_id'] = $latestTemplate->id;
        }

        return $data;
    }

    protected function handleRecordCreation(array $data): \App\Models\Form
    {
        return app(\App\Services\FormService::class)->create($data);
    }
}
