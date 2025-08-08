<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Informe de Servicio Técnico</title>
    <style>
        @page {
            margin: 20px;
        }
        html, body {
            width: 100%;
            height: 100%;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
            border: 1px solid #000;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
        }
        .container {
            margin: 20px;
            padding: 0;
        }
        .header {
            display: table;
            width: 100%;
            margin-bottom: 10px;
        }
        .header-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 2px;
        }
        .header-info {
            font-size: 13px;
            color: #333;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 12px;
        }
        .info-table th, .info-table td {
            border: 1px solid #333;
            padding: 4px 8px;
            font-size: 12px;
            text-align: left;
        }
        .section-title {
            font-size: 15px;
            font-weight: bold;
            background: #eee;
            padding: 4px;
            margin-bottom: 4px;
        }
        .description-box {
            border: 1px solid #333;
            background: #f9f9f9;
            height: 325px;
            padding: 10px;
            font-size: 13px;
            margin-bottom: 16px;
            overflow: hidden;
        }
        .separator {
            border-top: 2px solid #333;
            margin: 18px 0 12px 0;
        }
        .observations-box {
            border: 1px solid #333;
            background: #f3f3f3;
            height: 125px;
            padding: 8px;
            font-size: 12px;
            margin-bottom: 18px;
            overflow: hidden;
        }
        .signatures {
            display: flex;
            justify-content: space-between;
            margin-bottom: 18px;
        }
        .signature-block {
            width: 48%;
            text-align: center;
        }
        .signature-title {
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 2px;
        }
        .signature-name {
            font-size: 13px;
            margin-bottom: 6px;
        }
        .signature-line {
            border-bottom: 1px solid #666;
            background-color: #f9f9f9;
            min-width: 180px;
            min-height: 40px;
            display: inline-block;
        }
        .signature-label {
            font-size: 10px;
            color: #666;
            margin-top: 2px;
        }
        .footer {
            width: 100%;
            text-align: center;
            font-size: 12px;
            color: #333;
            margin-top: 0;
            border-top: 1px solid #333;
            padding-top: 8px;
            box-sizing: border-box;
        }
    </style>
</head>
<body style="position: relative; min-height: 100vh;">
<div class="container">
    <div class="header" style="display: table; width: 100%; margin-bottom: 10px;">
        <div style="display: table-cell; width: 33%; vertical-align: top; text-align: left; font-size: 12px;">
            Colectora Sur 970<br>
            Campana - Buenos Aires<br>
            Cel: 11 6979-4400<br>
            E-mail: info@mpscontrols.com.ar<br>
            www.mpscontrols.com.ar
        </div>
        <div style="display: table-cell; width: 34%; vertical-align: top; text-align: center;">
            <div class="header-title" style="font-size: 18px; font-weight: bold; margin-bottom: 2px;">N° {{ $formatted_form_id ?? 'N° de Trabajo' }}</div>
        </div>
        <div style="display: table-cell; width: 33%; vertical-align: top; text-align: right;">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/logo.webp'))) }}" alt="Logo" style="max-width: 200px; max-height: 50px;" />
        </div>
    </div>

    <div style="text-align: center; font-size: 22px; font-weight: bold; margin-bottom: 12px;">Informe de Servicio Técnico</div>
    <div class="separator"></div>

    <table class="info-table">
        <tr>
            <th>Cliente</th>
            <td> {{$form->client->name}}</td>
            <th>Fecha</th>
            <td>{{$formatted_date}}</td>
        </tr>
        <tr>
            <th>Modelo</th>
            <td>{{ $json_values['modelo'] ?? '' }}</td>
            <th>N° de Serie</th>
            <td>{{ $json_values['nro_de_serie'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Horas/Km</th>
            <td>{{ $json_values['horas_km'] ?? '' }}</td>
            <th>Arreglo</th>
            <td>{{ $json_values['arreglo'] ?? '' }}</td>
        </tr>
    </table>
    <!-- Trabajo Efectuado / Trabajo a Efectuar checkboxes -->
    <div style="margin-bottom: 10px; text-align: center;">
        <label style="margin-right: 24px; font-size: 15px;">
            <input type="checkbox" style="width: 16px; height: 16px; vertical-align: middle;" {{ (isset($json_values['estado']) && $json_values['estado'] === 'trabajo_efectuado') ? 'checked' : '' }} >
            Trabajo Efectuado
        </label>
        <label style="font-size: 15px;">
            <input type="checkbox" style="width: 16px; height: 16px; vertical-align: middle;" {{ (isset($json_values['estado']) && $json_values['estado'] === 'trabajo_a_efectuar') ? 'checked' : '' }}>
            Trabajo a Efectuar
        </label>
    </div>
    <div class="section-title">Descripción del Trabajo</div>
    <div class="description-box">
        {{ $json_values['descripcion_del_trabajo'] ?? '' }}
    </div>
    <div class="separator"></div>
    <div class="section-title">Observaciones</div>
    <div class="observations-box">
        {{ $json_values['observaciones_varios'] ?? '' }}
    </div>
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
</div>

<!-- Contact Information Footer -->
<div class="footer" style="width: 100%; text-align: center; font-size: 12px; margin-top: 18px; border-top: 1px solid #333; padding-top: 8px; box-sizing: border-box;">
    <div style="width: 100%; text-align: center;">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/logo.webp'))) }}" alt="Logo" style="height: 35px; margin: 0 auto 8px auto; display: block;" />
    </div>
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
</div>

</body>
</html>
