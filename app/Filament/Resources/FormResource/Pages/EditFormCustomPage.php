<?php

namespace App\Filament\Resources\FormResource\Pages;

use App\Enums\FormStatusEnum;
use App\Filament\Resources\FormResource;
use App\Models\Form;
use Closure;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use Illuminate\Contracts\View\View;

class EditFormCustomPage extends Page
{
    use InteractsWithRecord;
    protected static string $resource = FormResource::class;
    protected static string $view = 'filament.resources.form-resource.pages.edit-form-custom-page';

    protected function getHeaderActions(): array
    {
    #a test action that opens a popup and does nothing
        return [
            Action::make('sendMail')
                ->label('Enviar Mail')
                ->icon('heroicon-o-paper-airplane')
                ->visible(fn () => $this->getRecord()->status !== FormStatusEnum::PENDING)
                ->form(function ($record){
                    return [
                        TextInput::make('mails')
                            ->label('Emails')
                            ->default($this->getRecord()->client?->defaultEmail)
                            ->required()
                            ->datalist([$this->getRecord()->client?->defaultEmail])
                            ->helperText('Separar múltiples emails con coma')
                            ->rule(    fn (): Closure => function (string $attribute, $value, Closure $fail) {
                                $mails = array_map('trim', explode(',', $value));
                                foreach ($mails as $mail) {
                                    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                                        $fail("El email '$mail' no es válido.");
                                    }
                                }
                            }),
                    ];


                })
                ->action(function (array $data, $record) {
                    $mails = array_map('trim', explode(',', $data['mails']));
                    $response = app(\App\Http\Controllers\FormController::class)->sendClientMail(request()->merge(['mails' => $mails]), $this->getRecord(), app(\App\Services\FormService::class));
                    if ($response->getStatusCode() === 200) {
                        \Filament\Notifications\Notification::make()
                            ->title('Email enviado correctamente!')
                            ->success()
                            ->send();
                    } else {
                        \Filament\Notifications\Notification::make()
                            ->title('Error al enviar el email')
                            ->danger()
                            ->send();
                    }
                })
        ];
    }


    public function mount(Form $record): void
    {
        $this->record = $record;
    }

    public function getViewData(): array
    {
        $form = $this->getRecord();
        return array_merge(parent::getViewData(), [
            'form' => $form,
            'jsonDefinition' => $form->formTemplate->json_definition,
            'formId' => $form->id,
            'formValue' => $form->json_values ?? '{}',
            'lastSeenPage' => $form->last_seen_page ?? "",
        ]);
    }


    public function getTitle(): string
    {
        return $this->getRecord()->client?->name . ' - ' .$this->getRecord()->type->label();
    }
}
