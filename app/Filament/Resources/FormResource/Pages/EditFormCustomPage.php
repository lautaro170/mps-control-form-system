<?php

namespace App\Filament\Resources\FormResource\Pages;

use App\Filament\Resources\FormResource;
use App\Models\Form;
use Filament\Resources\Pages\Page;
use Illuminate\Contracts\View\View;

class EditFormCustomPage extends Page
{
    protected static string $resource = FormResource::class;
    protected static string $view = 'filament.resources.form-resource.pages.edit-form-custom-page';

    public $jsonDefinition;

    public function mount(Form $record): void
    {
        $this->jsonDefinition = $record->formTemplate->json_definition;
        $this->formId = $record->id;
        $this->formValue = $record->json_values ?? '{}';
    }

    public function getViewData(): array
    {
        return array_merge(parent::getViewData(), [
            'jsonDefinition' => $this->jsonDefinition,
            'formId' => $this->formId,
            'formValue' => $this->formValue,

        ]);
    }


    public function getTitle(): string
    {
        return '';
    }
}
