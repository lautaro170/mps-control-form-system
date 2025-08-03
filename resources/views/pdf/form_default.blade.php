<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario Técnico - Grupo Electrógeno</title>
    <style>
        body, .checkbox-cell { font-family: 'DejaVu Sans', Arial, sans-serif; }
        body { font-family: Arial, sans-serif; margin: 0; padding: 5px; font-size: 11px; }
        h1 { background-color: #ccc; padding: 3px; margin: 3px 0; font-size: 16px; }
        h2 { background-color: #ccc; padding: 2px; margin: 2px 0; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 8px; }
        th, td { border: 1px solid #333; padding: 2px; font-size: 11px; text-align: left; }
        th { background-color: #eee; }
        .matrix th, .matrix td { text-align: center; }
        .inline-tables { display: table; width: 100%; }
        .inline-tables > div { display: table-cell; width: 50%; vertical-align: top; padding-right: 5px; }
        .inline-tables > div:last-child { padding-right: 0; }
        .checkbox-cell { width: 20px; text-align: center; font-size: 10px; }
        textarea { font-size: 11px; }
        @page { margin: 0; }
    </style>
</head>
<body>

<!-- Header Section -->
<div style="width: 100%; display: table; margin-bottom: 18px;">
    <div style="display: table-cell; width: 70%; vertical-align: top; text-align: left;">
        <img src="/images/logo.webp" alt="Logo" style="max-width: 140px; max-height: 60px; margin-bottom: 6px;" />
        <div style="font-weight: bold; font-size: 15px; margin-top: 8px;">PLANILLA SERVICIO TÉCNICO GRUPO ELECTRÓGENO</div>
    </div>
    <div style="display: table-cell; width: 30%; vertical-align: top; text-align: right;">
        <div style="font-weight: bold; font-size: 16px; margin-bottom: 8px;">N° 00000498</div>
        <div style="font-size: 13px;">Fecha: 02/08/2025</div>
    </div>
</div>

<h2>Datos del Grupo Electrógeno</h2>
<table>
    <tr>
        <th>Marca</th>
        <td colspan="3">{{ $json_values['marca']['marca'] ?? '' }}</td>
        <th>Modelo</th>
        <td colspan="3">{{ $json_values['marca']['modelo'] ?? '' }}</td>
    </tr>
    <tr>
        <th>Placa</th>
        <td colspan="3">{{ $json_values['marca']['placa'] ?? '' }}</td>
        <th>Potencia</th>
        <td colspan="3">{{ $json_values['marca']['potencia'] ?? '' }}</td>
    </tr>
    <tr>
        <th>Alternador</th>
        <td colspan="3">{{ $json_values['marca']['alternador'] ?? '' }}</td>
        <th>N°</th>
        <td colspan="3">{{ $json_values['marca']['alternador_nro'] ?? '' }}</td>
    </tr>
    <tr>
        <th>Serie</th>
        <td colspan="3">{{ $json_values['marca']['alternador_serie'] ?? '' }}</td>
        <th>Motor</th>
        <td colspan="3">{{ $json_values['marca']['motor'] ?? '' }}</td>
    </tr>
    <tr>
        <th>Motor N°</th>
        <td colspan="3">{{ $json_values['marca']['motor_nro'] ?? '' }}</td>
        <th>Serie</th>
        <td colspan="3">{{ $json_values['marca']['motor_serie'] ?? '' }}</td>
    </tr>
    <tr>
        <th>Tablero/Lógica</th>
        <td colspan="3">{{ $json_values['marca']['tablero_logica'] ?? '' }}</td>
        <th>Tablero Transferencia Automática</th>
        <td colspan="3">{{ $json_values['marca']['tablero_transferencia_automatica'] ?? '' }}</td>
    </tr>
    <tr>
        <th rowspan="3" style="vertical-align: middle; background-color: #ddd; font-weight: bold;">Ubicación</th>
        <th></th>
        <th>Si</th>
        <th>No</th>
        <th rowspan="3" style="vertical-align: middle; background-color: #ddd; font-weight: bold;">Tipo</th>
        <th></th>
        <th>Si</th>
        <th>No</th>
    </tr>
    <tr>
        <th>Intemperie</th>
        <td class="checkbox-cell" style="text-align: center;">{{ (isset($json_values['ubicacion']['Intemperie']) && $json_values['ubicacion']['Intemperie'] === 'Ubicacion Si') ? '✓' : '' }}</td>
        <td class="checkbox-cell" style="text-align: center;">{{ (isset($json_values['ubicacion']['Intemperie']) && $json_values['ubicacion']['Intemperie'] === 'Ubicacion No') ? '✓' : '' }}</td>
        <th>Cabinado</th>
        <td class="checkbox-cell" style="text-align: center;">{{ (isset($json_values['tipo']['Cabinado']) && $json_values['tipo']['Cabinado'] === 'Tipo Si') ? '✓' : '' }}</td>
        <td class="checkbox-cell" style="text-align: center;">{{ (isset($json_values['tipo']['Cabinado']) && $json_values['tipo']['Cabinado'] === 'Tipo No') ? '✓' : '' }}</td>
    </tr>
    <tr>
        <th>Sala</th>
        <td class="checkbox-cell" style="text-align: center;">{{ (isset($json_values['ubicacion']['Sala']) && $json_values['ubicacion']['Sala'] === 'Ubicacion Si') ? '✓' : '' }}</td>
        <td class="checkbox-cell" style="text-align: center;">{{ (isset($json_values['ubicacion']['Sala']) && $json_values['ubicacion']['Sala'] === 'Ubicacion No') ? '✓' : '' }}</td>
        <th>Chasis</th>
        <td class="checkbox-cell" style="text-align: center;">{{ (isset($json_values['tipo']['Chasis']) && $json_values['tipo']['Chasis'] === 'Tipo Si') ? '✓' : '' }}</td>
        <td class="checkbox-cell" style="text-align: center;">{{ (isset($json_values['tipo']['Chasis']) && $json_values['tipo']['Chasis'] === 'Tipo No') ? '✓' : '' }}</td>
    </tr>
</table>

<div class="inline-tables">
    <div style="width: 50%">
        <h2>Motor Detenido</h2>
        <table>
            <tr><td>Nivel de aceite</td><td class="checkbox-cell">{{ in_array('nivel de aceite', $json_values['question4'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Nivel de Refrigerante</td><td class="checkbox-cell">{{ in_array('Nivel de Refrigerante', $json_values['question4'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Restricción filtro de aire</td><td class="checkbox-cell">{{ in_array('Restricción filtro de aire', $json_values['question4'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Tensión en correas</td><td class="checkbox-cell">{{ in_array('Tensión en correas', $json_values['question4'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Nivel de electrolito</td><td class="checkbox-cell">{{ in_array('Nivel de electrolito', $json_values['question4'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Gravedad de electrolito</td><td class="checkbox-cell">{{ in_array('Gravedad de electrolito', $json_values['question4'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Estado de instalación eléctrica</td><td class="checkbox-cell">{{ in_array('Estado de instalación eléctrica', $json_values['question4'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Cableado de potencia</td><td class="checkbox-cell">{{ in_array('Cableado de potencia', $json_values['question4'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Cubo de ventilador, polea, y bomba de agua</td><td class="checkbox-cell">{{ in_array('Cubo de ventilador, polea, y bomba de agua', $json_values['question4'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Ajuste montaje motor</td><td class="checkbox-cell">{{ in_array('Ajuste montaje motor', $json_values['question4'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Estado admisión de aire</td><td class="checkbox-cell">{{ in_array('Estado admisión de aire', $json_values['question4'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Conexiones línea de combustible</td><td class="checkbox-cell">{{ in_array('Conexiones línea de combustible', $json_values['question4'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Cargador de batería</td><td class="checkbox-cell">{{ in_array('Cargador de bateria', $json_values['question4'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Precalentador</td><td class="checkbox-cell">{{ in_array('Precalentador', $json_values['question4'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Nivel de combustible</td><td class="checkbox-cell">{{ in_array('Nivel de combustible', $json_values['question4'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Limpieza de radiador</td><td class="checkbox-cell">{{ in_array('Limpieza de radiador', $json_values['question4'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Ajuste bornes generador</td><td class="checkbox-cell">{{ in_array('Ajuste bornes generador', $json_values['question4'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Tapa termostática</td><td class="checkbox-cell">{{ in_array('Tapa termostática', $json_values['question4'] ?? []) ? '✓' : '□' }}</td></tr>
        </table>
    </div>
    <div style="width: 50%">
        <h2>Motor en Funcionamiento</h2>
        <table>
            <tr><td colspan="5">Sistema de arranque</td><td colspan="2" class="checkbox-cell">{{ in_array('Sistema de arranque1', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td colspan="5">Mangueras y conexiones</td><td colspan="2"class="checkbox-cell">{{ in_array('Mangueras y conexiones', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td colspan="5">Presión de aceite</td><td colspan="2" class="checkbox-cell">{{ in_array('Presión de aceite', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td colspan="5">Temperatura de motor</td><td colspan="2" class="checkbox-cell">{{ in_array('Temperatura de motor', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td colspan="5">Vibraciones</td><td colspan="2" class="checkbox-cell">{{ in_array('Vibraciones', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td colspan="5">Antivibratorios</td><td colspan="2" class="checkbox-cell">{{ in_array('Antivibratorios', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td colspan="5">Carga de alternador</td><td colspan="2" class="checkbox-cell">{{ in_array('Carga de alternador', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td colspan="5">Llave termomagnética</td><td colspan="2" class="checkbox-cell">{{ in_array('Llave termomagnética', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td colspan="5">Ventilación de generador</td><td colspan="2" class="checkbox-cell">{{ in_array('Ventilación de generador', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td colspan="5">Pérdidas de aceite</td><td colspan="2" class="checkbox-cell">{{ in_array('Pérdidas de aceite', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td colspan="5">Pérdidad de combustible</td><td colspan="2" class="checkbox-cell">{{ in_array('Pérdidad de combustible', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td colspan="5">Restricciones de escape</td><td colspan="2" class="checkbox-cell">{{ in_array('Restricciones de escape', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td colspan="5">Pérdidas de refrigerante</td><td colspan="2" class="checkbox-cell">{{ in_array('Pérdidas de refrigerante', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td colspan="5">Seguridades</td><td colspan="2" class="checkbox-cell">{{ in_array('Seguridades', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '□' }}</td></tr>

            <!-- Frecuencia section -->
            <tr><th colspan="5" >Frecuencia</th><td colspan="2">{{ $json_values['Motor En Funcionamiento Frecuencia'] ?? '' }}</td></tr>

            <!-- Voltaje section -->
            <tr>
                <th style="background-color: #ddd;">Tensión</th>
                <th>R</th><td>{{ $json_values['Motor En Funcionamiento Voltaje']['Motor En Funcionamiento Voltaje R'] ?? 'a' }}</td>
                <th>S</th><td>{{ $json_values['Motor En Funcionamiento Voltaje']['Motor En Funcionamiento Voltaje S'] ?? '' }}</td>
                <th>T</th><td>{{ $json_values['Motor En Funcionamiento Voltaje']['Motor En Funcionamiento Voltaje T'] ?? '' }}</td>
            </tr>

            <!-- Baterías section -->
            <tr>
                <th rowspan="2" style="vertical-align: middle; font-weight: bold;background-color: #ddd;">Baterías</th>
                <th colspan="4" style="font-weight: bold;">Marca/Modelo</th><td colspan="2">{{ $json_values['Baterias']['Marca Modelo'] ?? '' }}</td>
            </tr>
            <tr>
                <th colspan="4" style="font-weight: bold;">Fecha</th><td colspan="2">{{ $json_values['Baterias']['Baterias Fecha'] ?? '' }}</td>
            </tr>
        </table>
    </div>
</div>

<div class="inline-tables">
    <div style="width: 50%">
        <h2>Limpieza</h2>
        <table>
            <tr><td>Filtros de aire de motor</td><td class="checkbox-cell">{{ in_array('Filtros de aire de motor', $json_values['question5'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Respirador de carter</td><td class="checkbox-cell">{{ in_array('Respirador de carter', $json_values['question5'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Respirador de tanque de combustible</td><td class="checkbox-cell">{{ in_array('Respirador de tanque de combustible', $json_values['question5'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Drenar tanque de combustible</td><td class="checkbox-cell">{{ in_array('Drenar tanque de combustible', $json_values['question5'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Cañerías y conexiones</td><td class="checkbox-cell">{{ in_array('Cañerias y conexiones', $json_values['question5'] ?? []) ? '✓' : '□' }}</td></tr>
        </table>

        <h2>Cambio de filtros y consumibles</h2>
        <table>
            <tr><td>Filtro de Aire</td><td class="checkbox-cell">{{ in_array('Filtro de aire', $json_values['Cambio de Filtros Y Consumibles'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Filtro de Agua</td><td class="checkbox-cell">{{ in_array('Filtro de agua', $json_values['Cambio de Filtros Y Consumibles'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Filtro de Combustible</td><td class="checkbox-cell">{{ in_array('Filtro de combustible', $json_values['Cambio de Filtros Y Consumibles'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Aceite</td><td class="checkbox-cell">{{ in_array('Aceite', $json_values['Cambio de Filtros Y Consumibles'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Refrigerante</td><td class="checkbox-cell">{{ in_array('Refrigerante', $json_values['Cambio de Filtros Y Consumibles'] ?? []) ? '✓' : '□' }}</td></tr>
        </table>
    </div>
    <div style="width: 50%">
        <h2>Verificación con Carga</h2>
        <table>
            <tr><th>Frecuencia</th><td colspan="6">{{ $json_values['Verifiacion con Carga frecuencia'] ?? '' }}</td></tr>
            <tr>
                <th>Tensión</th>
                <th>R</th><td>{{ $json_values['Verifiacion con Carga Tension']['Verifiacion con Carga Tension R'] ?? '' }}</td>
                <th>S</th><td>{{ $json_values['Verifiacion con Carga Tension']['Verifiacion con Carga Tension S'] ?? '' }}</td>
                <th>T</th><td>{{ $json_values['Verifiacion con Carga Tension']['Verifiacion con Carga Tension T'] ?? '' }}</td>
            </tr>
            <tr>
                <th>Corriente</th>
                <th>R</th><td>{{ $json_values['Verifiacion con Carga Corriente']['Verifiacion con Carga Corriente R'] ?? '' }}</td>
                <th>S</th><td>{{ $json_values['Verifiacion con Carga Corriente']['Verifiacion con Carga Corriente S'] ?? '' }}</td>
                <th>T</th><td>{{ $json_values['Verifiacion con Carga Corriente']['Verifiacion con Carga Corriente T'] ?? '' }}</td>
            </tr>
            <tr><th >Tiempo de prueba</th><td colspan="6">{{ $json_values['Verifiacion con Carga Corriente Tiempo de Prueba'] ?? '' }}</td></tr>
        </table>

        <h2>Sala de Grupo</h2>
        <table>
            <tr><td>Estado general</td><td class="checkbox-cell">{{ in_array('Estado general', $json_values['Sala de Grupo'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Matafuegos</td><td class="checkbox-cell">{{ in_array('Matafuegos', $json_values['Sala de Grupo'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Luz de emergencia</td><td class="checkbox-cell">{{ in_array('Luz de emergencia', $json_values['Sala de Grupo'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Indicaciones de emergencia</td><td class="checkbox-cell">{{ in_array('Indicaciones de emergencia', $json_values['Sala de Grupo'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Iluminación</td><td class="checkbox-cell">{{ in_array('Iluminacion', $json_values['Sala de Grupo'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Circulación de aire</td><td class="checkbox-cell">{{ in_array('Circulacion de aire', $json_values['Sala de Grupo'] ?? []) ? '✓' : '□' }}</td></tr>
            <tr><td>Indicación de arranque remoto</td><td class="checkbox-cell">{{ in_array('Indicacion de arranque remoto', $json_values['Sala de Grupo'] ?? []) ? '✓' : '□' }}</td></tr>
        </table>
    </div>
</div>

<h2>Observaciones</h2>
<div style="border: 1px solid #333; background: #f9f9f9; padding: 8px; min-height: 40px; font-size: 11px; margin-bottom: 10px;">
    {{ $json_values['Observaciones'] ?? '' }}
</div>

<table style="width: 100%; border: none; margin-bottom: 10px;">
    <tr>
        <td style="width: 50%; text-align: center; vertical-align: top; border: none;">
            <div style="font-weight: bold; font-size: 13px; margin-bottom: 2px;">Técnico MPS Control</div>
            <div style="font-size: 12px; margin-bottom: 6px;">{{ $json_values['tecnico_que_realiza_la_prueba_nombre'] ?? '' }}</div>
            <div style="border-bottom: 1px solid #666; background-color: #f9f9f9; min-width: 180px; min-height: 40px; display: inline-block;">
                @if(!empty($json_values['tecnico_que_realiza_la_prueba_firma']))
                    <img src="{{ $json_values['tecnico_que_realiza_la_prueba_firma'] }}" alt="Firma Técnico" style="max-height: 38px; max-width: 170px; display: block; margin: 0 auto;" />
                @else
                    <span style="font-size: 9px; color: #999;">Canvas de Firma</span>
                @endif
            </div>
            <div style="font-size: 10px; color: #666; margin-top: 2px;">Firma</div>
        </td>
        <td style="width: 50%; text-align: center; vertical-align: top; border: none;">
            <div style="font-weight: bold; font-size: 13px; margin-bottom: 2px;">Responsable del Cliente</div>
            <div style="font-size: 12px; margin-bottom: 6px;">{{ $json_values['responsable_del_cliente_nombre'] ?? '' }}</div>
            <div style="border-bottom: 1px solid #666; background-color: #f9f9f9; min-width: 180px; min-height: 40px; display: inline-block;">
                @if(!empty($json_values['responsable_del_cliente_firma']))
                    <img src="{{ $json_values['responsable_del_cliente_firma'] }}" alt="Firma Cliente" style="max-height: 38px; max-width: 170px; display: block; margin: 0 auto;" />
                @else
                    <span style="font-size: 9px; color: #999;">Canvas de Firma</span>
                @endif
            </div>
            <div style="font-size: 10px; color: #666; margin-top: 2px;">Firma</div>
        </td>
    </tr>
</table>

<!-- Contact Information Footer -->
<div style="width: 100%; text-align: center; font-size: 12px; margin-top: 18px;">
    <span style="margin-right: 12px; vertical-align: middle;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" style="vertical-align: middle;"><path fill="#333" d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 011 1v3.5a1 1 0 01-1 1C7.61 22 2 16.39 2 9.5a1 1 0 011-1H6.5a1 1 0 011 1c0 1.25.2 2.46.57 3.58a1 1 0 01-.24 1.01l-2.2 2.2z"/></svg>
        11 6979-4400
    </span>
    <span style="margin-right: 12px; vertical-align: middle;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 32 32" style="vertical-align: middle;"><circle cx="16" cy="16" r="16" fill="#25D366"/><path fill="#fff" d="M22.5 19.5c-.4-.2-2.3-1.1-2.6-1.2-.3-.1-.5-.2-.7.2-.2.4-.8 1.2-1 1.4-.2.2-.4.3-.8.1-.4-.2-1.7-.6-3.2-2-1.2-1.1-2-2.4-2.2-2.8-.2-.4 0-.6.2-.8.2-.2.4-.5.6-.7.2-.2.2-.4.3-.6.1-.2 0-.5-.1-.7-.1-.2-.7-1.7-1-2.3-.3-.6-.6-.5-.8-.5h-.7c-.2 0-.5.1-.7.3-.2.2-1.1 1.1-1.1 2.7 0 1.6 1.2 3.1 1.4 3.3.2.2 2.3 3.5 5.6 4.7.8.3 1.4.5 1.9.6.8.1 1.5.1 2.1.1.6 0 1.9-.6 2.2-1.2.3-.6.3-1.1.2-1.2-.1-.1-.4-.2-.8-.4z"/></svg>
        mpscontrols
    </span>
    <span style="margin-right: 12px; vertical-align: middle;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" style="vertical-align: middle;"><path fill="#333" d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 2v.01L12 13 4 6.01V6h16zM4 20V8.24l7.29 6.36a1 1 0 001.42 0L20 8.24V20H4z"/></svg>
        Info@mpscontrols.com.ar
    </span>
    <span style="margin-right: 12px; vertical-align: middle;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" style="vertical-align: middle;"><path fill="#333" d="M12 2a10 10 0 100 20 10 10 0 000-20zm1 17.93V20a8 8 0 01-7.93-7H4v-2h1.07A8 8 0 0112 4v.07A8.001 8.001 0 0120 12h-.07A8.001 8.001 0 0113 19.93z"/></svg>
        www.mpscontrols.com.ar
    </span>
</div>

</body>
</html>
