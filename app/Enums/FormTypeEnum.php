<?php
namespace App\Enums;
Enum FormTypeEnum: string
{
    case QUALITY = 'quality';
    case SERVICIO_TÉCNICO_GRUPO_ELECTRÓGENO = 'servicio_técnico_grupo_electrógeno';


    public function label(): string
    {
        return match ($this) {
            self::QUALITY => 'Calidad',
            self::SERVICIO_TÉCNICO_GRUPO_ELECTRÓGENO => 'Servicio Técnico Grupo Electrógeno',
        };
    }
}
