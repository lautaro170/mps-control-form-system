<?php
namespace App\Enums;

enum FormStatusEnum: string
{
    case PENDING = 'pending';
    case COMPLETED_SENT = 'completed_sent';
    case COMPLETED_NOT_SENT = 'completed_not_sent';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Pendiente',
            self::COMPLETED_SENT => 'Completado',
            self::COMPLETED_NOT_SENT => 'Completado sin Enviar',
        };
    }
}
