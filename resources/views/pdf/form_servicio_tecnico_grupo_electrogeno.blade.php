@php

    $base_url = "http://localhost:8001"
@endphp

    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario Técnico - Grupo Electrógeno</title>
    <style>
        body, .checkbox-cell { font-family: 'DejaVu Sans', Arial, sans-serif; }
        body { font-family: Arial, sans-serif; margin: 16px;  font-size: 10px;  }

        h1 { background-color: #ccc; padding: 3px; margin: 1px 0; font-size: 14px; }
        h2 { background-color: #ccc; padding: 2px; margin: 1px 0; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 2px; }
        th, td { border: 1px solid #333; padding: 1px; font-size: 10px; text-align: left; }
        th { background-color: #eee; }
        .matrix th, .matrix td { text-align: center; }
        .inline-tables { display: table; width: 100%; }
        .inline-tables > div { display: table-cell; width: 50%; vertical-align: top; padding-right: 5px; }
        .inline-tables > div:last-child { padding-right: 0; }
        .checkbox-cell { width: 20px; text-align: center; font-size: 10px; }
        textarea { font-size: 10px; }
        @page { margin: 0; }
    </style>
</head>
<body>
<table style="width: 100%; border-collapse: collapse;">
    <tr>
        <td rowspan="3" style="width: 65%; vertical-align: top; text-align: center;">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/logo.webp'))) }}" alt="Logo"  style="max-width: 160px; max-height: 60px" />
            <div style="font-weight: bold; font-size: 12px; margin-top: 2px;">PLANILLA SERVICIO TÉCNICO GRUPO ELECTRÓGENO</div>
        </td>
        <td style="text-align: left; font-size: 15px; font-weight: bold;">N° {{$formatted_form_id}}</td>
    </tr>
    <tr>
        <td style="font-size: 13px;">Fecha: {{$formatted_date}}</td>
    </tr>
    <tr>
        <td>Horas uso {{ $json_values['horas_uso'] ?? '' }} </td>
    </tr>
    <tr>
        <td rowspan="2" style="font-size: 14px">sma: {{ $json_values['cliente_smo'] ?? '' }}</td>
        <td>Diracción: {{ $json_values['cliente_direccion'] ?? '' }}</td>
    </tr>
    <tr>
        <td>Localidad:  {{ $json_values['cliente_localidad'] ?? '' }}</td>
    </tr>
</table>

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
            <tr><td>Nivel de aceite</td><td class="checkbox-cell">{{ in_array('nivel de aceite', $json_values['question4'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Nivel de Refrigerante</td><td class="checkbox-cell">{{ in_array('Nivel de Refrigerante', $json_values['question4'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Restricción filtro de aire</td><td class="checkbox-cell">{{ in_array('Restricción filtro de aire', $json_values['question4'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Tensión en correas</td><td class="checkbox-cell">{{ in_array('Tensión en correas', $json_values['question4'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Nivel de electrolito</td><td class="checkbox-cell">{{ in_array('Nivel de electrolito', $json_values['question4'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Gravedad de electrolito</td><td class="checkbox-cell">{{ in_array('Gravedad de electrolito', $json_values['question4'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Estado de instalación eléctrica</td><td class="checkbox-cell">{{ in_array('Estado de instalación eléctrica', $json_values['question4'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Cableado de potencia</td><td class="checkbox-cell">{{ in_array('Cableado de potencia', $json_values['question4'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Cubo de ventilador, polea, y bomba de agua</td><td class="checkbox-cell">{{ in_array('Cubo de ventilador, polea, y bomba de agua', $json_values['question4'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Ajuste montaje motor</td><td class="checkbox-cell">{{ in_array('Ajuste montaje motor', $json_values['question4'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Estado admisión de aire</td><td class="checkbox-cell">{{ in_array('Estado admisión de aire', $json_values['question4'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Conexiones línea de combustible</td><td class="checkbox-cell">{{ in_array('Conexiones línea de combustible', $json_values['question4'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Cargador de batería</td><td class="checkbox-cell">{{ in_array('Cargador de bateria', $json_values['question4'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Precalentador</td><td class="checkbox-cell">{{ in_array('Precalentador', $json_values['question4'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Nivel de combustible</td><td class="checkbox-cell">{{ in_array('Nivel de combustible', $json_values['question4'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Limpieza de radiador</td><td class="checkbox-cell">{{ in_array('Limpieza de radiador', $json_values['question4'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Ajuste bornes generador</td><td class="checkbox-cell">{{ in_array('Ajuste bornes generador', $json_values['question4'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Tapa termostática</td><td class="checkbox-cell">{{ in_array('Tapa termostática', $json_values['question4'] ?? []) ? '✓' : '' }}</td></tr>
        </table>
    </div>
    <div style="width: 50%">
        <h2>Motor en Funcionamiento</h2>
        <table>
            <tr><td colspan="5">Sistema de arranque</td><td colspan="2" class="checkbox-cell">{{ in_array('Sistema de arranque1', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td colspan="5">Mangueras y conexiones</td><td colspan="2"class="checkbox-cell">{{ in_array('Mangueras y conexiones', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td colspan="5">Presión de aceite</td><td colspan="2" class="checkbox-cell">{{ in_array('Presión de aceite', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td colspan="5">Temperatura de motor</td><td colspan="2" class="checkbox-cell">{{ in_array('Temperatura de motor', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td colspan="5">Vibraciones</td><td colspan="2" class="checkbox-cell">{{ in_array('Vibraciones', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td colspan="5">Antivibratorios</td><td colspan="2" class="checkbox-cell">{{ in_array('Antivibratorios', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td colspan="5">Carga de alternador</td><td colspan="2" class="checkbox-cell">{{ in_array('Carga de alternador', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td colspan="5">Llave termomagnética</td><td colspan="2" class="checkbox-cell">{{ in_array('Llave termomagnética', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td colspan="5">Ventilación de generador</td><td colspan="2" class="checkbox-cell">{{ in_array('Ventilación de generador', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td colspan="5">Pérdidas de aceite</td><td colspan="2" class="checkbox-cell">{{ in_array('Pérdidas de aceite', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td colspan="5">Pérdidad de combustible</td><td colspan="2" class="checkbox-cell">{{ in_array('Pérdidad de combustible', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td colspan="5">Restricciones de escape</td><td colspan="2" class="checkbox-cell">{{ in_array('Restricciones de escape', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td colspan="5">Pérdidas de refrigerante</td><td colspan="2" class="checkbox-cell">{{ in_array('Pérdidas de refrigerante', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td colspan="5">Seguridades</td><td colspan="2" class="checkbox-cell">{{ in_array('Seguridades', $json_values['Motor En Funcionamiento'] ?? []) ? '✓' : '' }}</td></tr>

            <!-- Frecuencia section -->
            <tr><th colspan="5" >Frecuencia</th><td colspan="2">{{ $json_values['Motor En Funcionamiento Frecuencia'] ?? '' }}</td></tr>

            <!-- Voltaje section -->
            <tr>
                <th style="background-color: #ddd;">Tensión</th>
                <th>R</th><td>{{ $json_values['Motor En Funcionamiento Voltaje']['Motor En Funcionamiento Voltaje R'] ?? '' }} Vca.</td>
                <th>S</th><td>{{ $json_values['Motor En Funcionamiento Voltaje']['Motor En Funcionamiento Voltaje S'] ?? '' }} Vca.</td>
                <th>T</th><td>{{ $json_values['Motor En Funcionamiento Voltaje']['Motor En Funcionamiento Voltaje T'] ?? '' }} Vca.</td>
            </tr>

            <!-- Baterías section -->
            <tr>
                <th rowspan="2" style="vertical-align: middle; font-weight: bold;background-color: #ddd;">Baterías</th>
                <th colspan="4" style="font-weight: bold;">Marca/Modelo</th><td colspan="2">{{ $json_values['Baterias']['Marca Modelo'] ?? '' }}</td>
            </tr>
            <tr>
                <th colspan="4" style="font-weight: bold;">Fecha</th><td colspan="2">{{ $json_values['Baterias']['Baterias Fecha'] ?? '' }}</td>
            </tr>
            <tr><td colspan="5">Aislante de escape</td><td colspan="2">{{ $json_values['aislante_de_escape'] ?? '' }}</td></tr>
        </table>
    </div>
</div>

<div class="inline-tables">
    <div style="width: 50%">
        <h2>Limpieza</h2>
        <table>
            <tr><td>Filtros de aire de motor</td><td class="checkbox-cell">{{ in_array('Filtros de aire de motor', $json_values['question5'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Respirador de carter</td><td class="checkbox-cell">{{ in_array('Respirador de carter', $json_values['question5'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Respirador de tanque de combustible</td><td class="checkbox-cell">{{ in_array('Respirador de tanque de combustible', $json_values['question5'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Drenar tanque de combustible</td><td class="checkbox-cell">{{ in_array('Drenar tanque de combustible', $json_values['question5'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Cañerías y conexiones</td><td class="checkbox-cell">{{ in_array('Cañerias y conexiones', $json_values['question5'] ?? []) ? '✓' : '' }}</td></tr>
        </table>

        <h2>Cambio de filtros y consumibles</h2>
        <table>
            <tr><td>Filtro de Aire</td><td class="checkbox-cell">{{ in_array('Filtro de aire', $json_values['Cambio de Filtros Y Consumibles'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Filtro de Agua</td><td class="checkbox-cell">{{ in_array('Filtro de agua', $json_values['Cambio de Filtros Y Consumibles'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Filtro de Combustible</td><td class="checkbox-cell">{{ in_array('Filtro de combustible', $json_values['Cambio de Filtros Y Consumibles'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Aceite</td><td class="checkbox-cell">{{ in_array('Aceite', $json_values['Cambio de Filtros Y Consumibles'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Refrigerante</td><td class="checkbox-cell">{{ in_array('Refrigerante', $json_values['Cambio de Filtros Y Consumibles'] ?? []) ? '✓' : '' }}</td></tr>
        </table>
    </div>
    <div style="width: 50%">
        <h2>Verificación con Carga</h2>
        <table>
            <tr><th>Frecuencia</th><td colspan="6">{{ $json_values['Verifiacion con Carga frecuencia'] ?? '' }}</td></tr>
            <tr>
                <th>Tensión</th>
                <th>R</th><td>{{ $json_values['Verifiacion con Carga Tension']['Verifiacion con Carga Tension R'] ?? '' }} Vca.</td>
                <th>S</th><td>{{ $json_values['Verifiacion con Carga Tension']['Verifiacion con Carga Tension S'] ?? '' }} Vca.</td>
                <th>T</th><td>{{ $json_values['Verifiacion con Carga Tension']['Verifiacion con Carga Tension T'] ?? '' }} Vca.</td>
            </tr>
            <tr>
                <th>Corriente</th>
                <th>R</th><td>{{ $json_values['Verifiacion con Carga Corriente']['Verifiacion con Carga Corriente R'] ?? '' }} Amp.</td>
                <th>S</th><td>{{ $json_values['Verifiacion con Carga Corriente']['Verifiacion con Carga Corriente S'] ?? '' }} Amp.</td>
                <th>T</th><td>{{ $json_values['Verifiacion con Carga Corriente']['Verifiacion con Carga Corriente T'] ?? '' }} Amp.</td>
            </tr>
            <tr><th >Tiempo de prueba</th><td colspan="6">{{ $json_values['Verifiacion con Carga Corriente Tiempo de Prueba'] ?? '' }}</td></tr>
        </table>

        <h2>Sala de Grupo</h2>
        <table>
            <tr><td>Estado general</td><td class="checkbox-cell">{{ in_array('Estado general', $json_values['Sala de Grupo'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Matafuegos</td><td class="checkbox-cell">{{ in_array('Matafuegos', $json_values['Sala de Grupo'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Luz de emergencia</td><td class="checkbox-cell">{{ in_array('Luz de emergencia', $json_values['Sala de Grupo'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Indicaciones de emergencia</td><td class="checkbox-cell">{{ in_array('Indicaciones de emergencia', $json_values['Sala de Grupo'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Iluminación</td><td class="checkbox-cell">{{ in_array('Iluminacion', $json_values['Sala de Grupo'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Circulación de aire</td><td class="checkbox-cell">{{ in_array('Circulacion de aire', $json_values['Sala de Grupo'] ?? []) ? '✓' : '' }}</td></tr>
            <tr><td>Indicación de arranque remoto</td><td class="checkbox-cell">{{ in_array('Indicacion de arranque remoto', $json_values['Sala de Grupo'] ?? []) ? '✓' : '' }}</td></tr>
        </table>
    </div>
</div>

<h2>Observaciones</h2>
<div style="border: 1px solid #333; background: #f9f9f9; padding: 8px; min-height: 40px; font-size: 11px; margin-bottom: 10px;">
    {{ $json_values['Observaciones'] ?? '' }}
</div>

<div style="border:1px solid black; padding: 2px; ">
    <table style="width: 100%; margin-bottom: 10px;">
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
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/icons/whatsapp.png'))) }}" alt="Logo" style="width: 18px; height: 18px; vertical-align: middle; margin-right: 4px;" /> 11 6979-4400
    </span>
        <span style="margin-right: 12px; vertical-align: middle;">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/icons/instagram.png'))) }}" alt="Logo" style="width: 18px; height: 18px; vertical-align: middle; margin-right: 4px;" /> mpscontrols
    </span>
        <span style="margin-right: 12px; vertical-align: middle;">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/icons/mail.png'))) }}" alt="Logo" style="width: 21px; height: 21px; vertical-align: middle; margin-right: 4px;" /> Info@mpscontrols.com.ar
    </span>
        <span style="margin-right: 12px; vertical-align: middle;">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/icons/web.png'))) }}" alt="Logo" style="width: 18px; height: 18px; vertical-align: middle; margin-right: 4px;" /> www.mpscontrols.com.ar
    </span>
    </div></div>
</body>
</html>
