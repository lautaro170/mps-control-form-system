<?php
namespace App\Enums;
Enum FormTypeEnum: string
{
    case QUALITY = 'quality';


    public function label(): string
    {
        return match ($this) {
            self::QUALITY => 'Quality',
        };
    }
}
