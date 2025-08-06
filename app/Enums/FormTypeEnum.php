<?php
namespace App\Enums;
Enum FormTypeEnum: string
{
    case QUALITY = 'quality';
    case SERVICIO_TECNICO_GRUPO_ELECTROGENO = 'servicio_tecnico_grupo_electrogeno';
    case INFORME_SERVICIO_TECNICO = 'informe_servicio_tecnico';

    public function label(): string
    {
        return match ($this) {
            self::QUALITY => 'Calidad',
            self::SERVICIO_TECNICO_GRUPO_ELECTROGENO => 'Servicio Técnico Grupo Electrógeno',
            self::INFORME_SERVICIO_TECNICO => 'Informe Servicio Técnico',
        };
    }
}
