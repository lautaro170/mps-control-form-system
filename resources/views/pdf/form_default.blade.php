<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario Técnico - Grupo Electrógeno</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 5px; font-size: 12px; }
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

<h1>Formulario Técnico - Grupo Electrógeno</h1>

<h2>Datos del Grupo Electrógeno</h2>
<table>
    <tr>
        <th>Marca</th>
        <td colspan="3"></td>
        <th>Modelo</th>
        <td colspan="3"></td>
    </tr>
    <tr>
        <th>Placa</th>
        <td colspan="3"></td>
        <th>Potencia</th>
        <td colspan="3"></td>
    </tr>
    <tr>
        <th>Alternador</th>
        <td colspan="3"></td>
        <th>N°</th>
        <td colspan="3"></td>
    </tr>
    <tr>
        <th>Serie</th>
        <td colspan="3"></td>
        <th>Motor</th>
        <td colspan="3"></td>
    </tr>
    <tr>
        <th>Motor N°</th>
        <td colspan="3"></td>
        <th>Serie</th>
        <td colspan="3"></td>
    </tr>
    <tr>
        <th>Tablero/Lógica</th>
        <td colspan="3"></td>
        <th>Tablero Transferencia Automática</th>
        <td colspan="3"></td>
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
        <td style="text-align: center;"></td>
        <td style="text-align: center;"></td>
        <th>Cabinado</th>
        <td style="text-align: center;"></td>
        <td style="text-align: center;"></td>
    </tr>
    <tr>
        <th>Sala</th>
        <td style="text-align: center;"></td>
        <td style="text-align: center;"></td>
        <th>Chasis</th>
        <td style="text-align: center;"></td>
        <td style="text-align: center;"></td>
    </tr>
</table>

<div class="inline-tables">
    <div style="width: 50%">
        <h2>Motor Detenido</h2>
        <table>
            <tr><td>Nivel de aceite</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Nivel de Refrigerante</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Restricción filtro de aire</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Tensión en correas</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Nivel de electrolito</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Gravedad de electrolito</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Estado de instalación eléctrica</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Cableado de potencia</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Cubo de ventilador, polea, y bomba de agua</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Ajuste montaje motor</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Estado admisión de aire</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Conexiones línea de combustible</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Cargador de batería</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Precalentador</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Nivel de combustible</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Limpieza de radiador</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Ajuste bornes generador</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Tapa termostática</td><td class="checkbox-cell">□</td></tr>
        </table>
    </div>
    <div style="width: 50%">
        <h2>Motor en Funcionamiento</h2>
        <table>
            <tr><td colspan="5">Sistema de arranque</td><td colspan="2" class="checkbox-cell">□</td></tr>
            <tr><td colspan="5">Mangueras y conexiones</td><td colspan="2"class="checkbox-cell">□</td></tr>
            <tr><td colspan="5">Presión de aceite</td><td colspan="2" class="checkbox-cell">□</td></tr>
            <tr><td colspan="5">Temperatura de motor</td><td colspan="2" class="checkbox-cell">□</td></tr>
            <tr><td colspan="5">Vibraciones</td><td colspan="2" class="checkbox-cell">□</td></tr>
            <tr><td colspan="5">Antivibratorios</td><td colspan="2" class="checkbox-cell">□</td></tr>
            <tr><td colspan="5">Carga de alternador</td><td colspan="2" class="checkbox-cell">□</td></tr>
            <tr><td colspan="5">Llave termomagnética</td><td colspan="2" class="checkbox-cell">□</td></tr>
            <tr><td colspan="5">Seguridades</td><td colspan="2" class="checkbox-cell">□</td></tr>
            <tr><td colspan="5">Ventilación de generador</td><td colspan="2" class="checkbox-cell">□</td></tr>
            <tr><td colspan="5">Pérdidas de aceite</td><td colspan="2" class="checkbox-cell">□</td></tr>
            <tr><td colspan="5">Pérdidas de combustible</td><td colspan="2" class="checkbox-cell">□</td></tr>
            <tr><td colspan="5">Restricciones de escape</td><td colspan="2" class="checkbox-cell">□</td></tr>
            <tr><td colspan="5">Pérdidas de refrigerante</td><td colspan="2" class="checkbox-cell">□</td></tr>

            <!-- Frecuencia section -->
            <tr><th colspan="5" style="background-color: #ddd;">Frecuencia</th><td colspan="2"></td></tr>

            <!-- Voltaje section -->
            <tr><th>Tensión</th><th>R</th><td></td><th>S</th><td></td><th>T</th><td></td></tr>

            <!-- Baterías section -->
            <tr>
                <th rowspan="2" style="vertical-align: middle; background-color: #ddd; font-weight: bold;">Baterías</th>
                <td colspan="4" style="font-weight: bold;">Marca/Modelo:</td><td colspan="2"></td>

            </tr>
            <tr>
                <td colspan="4" style="font-weight: bold;">Fecha:</td><td colspan="2"></td>
            </tr>
        </table>
    </div>
</div>

<div class="inline-tables">
    <div style="width: 50%">
        <h2>Limpieza</h2>
        <table>
            <tr><td>Filtros de aire de motor</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Respirador de carter</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Respirador de tanque de combustible</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Drenar tanque de combustible</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Cañerías y conexiones</td><td class="checkbox-cell">□</td></tr>
        </table>

        <h2>Cambio de filtros y consumibles</h2>
        <table>
            <tr><td>Filtro de Aire</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Filtro de Agua</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Filtro de Combustible</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Aceite</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Refrigerante</td><td class="checkbox-cell">□</td></tr>
        </table>
    </div>
    <div style="width: 50%">
        <h2>Verificación con Carga</h2>
        <table>
            <tr><th>Frecuencia</th><td colspan="6"></td></tr>
            <tr><th>Tensión</th><th>R</th><td></td><th>S</th><td></td><th>T</th><td></td></tr>
            <tr><th>Corriente</th> <th>R</th><td></td><th>S</th><td></td><th>T</th><td></td></tr>
            <tr><th width="200px">Tiempo de prueba</th><td colspan="6"></td></tr>
        </table>

        <h2>Sala de Grupo</h2>
        <table>
            <tr><td>Estado general</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Matafuegos</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Luz de emergencia</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Indicaciones de emergencia</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Iluminación</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Circulación de aire</td><td class="checkbox-cell">□</td></tr>
            <tr><td>Indicación de arranque remoto</td><td class="checkbox-cell">□</td></tr>
        </table>
    </div>
</div>

<h2>Observaciones</h2>
<textarea rows="3" style="width: 100%;"></textarea>

<h2>Firmas</h2>
<table style="margin-bottom: 5px;">
    <tr>
        <th colspan="2" style="text-align: center; background-color: #ddd; font-weight: bold;">MPS Control</th>
        <th colspan="2" style="text-align: center; background-color: #ddd; font-weight: bold;">Cliente</th>
    </tr>
    <tr>
        <td style="width: 20%; font-weight: bold; vertical-align: top;">Técnico:</td>
        <td style="width: 30%; border-bottom: 1px solid #333; height: 25px;"></td>
        <td style="width: 20%; font-weight: bold; vertical-align: top;">Técnico:</td>
        <td style="width: 30%; border-bottom: 1px solid #333; height: 25px;"></td>
    </tr>
    <tr>
        <td style="font-weight: bold; vertical-align: top;">Firma:</td>
        <td style="height: 40px; border: 1px solid #666; background-color: #f9f9f9; text-align: center; vertical-align: middle; font-size: 9px; color: #999;">Canvas de Firma</td>
        <td style="font-weight: bold; vertical-align: top;">Firma:</td>
        <td style="height: 40px; border: 1px solid #666; background-color: #f9f9f9; text-align: center; vertical-align: middle; font-size: 9px; color: #999;">Canvas de Firma</td>
    </tr>
</table>

</body>
</html>
