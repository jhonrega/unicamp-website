<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Cotización</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            padding: 20px;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .logo {
            width: 150px;
        }
        .title {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            flex-grow: 1;
            margin: 0;
        }
        .cotizacion {
            font-size: 16px;
            text-align: right;
            font-weight: bold;
            margin: 0;
        }

        /* Tabla con estilo moderno */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px; /* Ajusta el tamaño de fuente a tu gusto */
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4F81BD; /* Color de encabezado */
            color: #fff;              /* Texto blanco en el encabezado */
            font-weight: bold;
        }
        /* Fila alternada */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        /* Espacio entre celdas y borde sutil */
        tr:hover {
            background-color: #ececec; /* Efecto hover (puede que no se vea en PDF) */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ public_path('images/logo-unicamp.png') }}" class="logo">
            <h1 class="title">Solicitud de Cotización</h1>
            <p class="cotizacion">
                N° de Cotización: {{ $datos['numero_cotizacion'] ?? 'N/A' }}
            </p>
        </div>

        <table>
            <tr>
                <th>Nombre</th>
                <td>{{ $datos['nombre'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $datos['email'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>WhatsApp</th>
                <td>{{ $datos['whatsapp'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Ciudad</th>
                <td>{{ $datos['ciudad'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Tamaño/Capacidad</th>
                <td>{{ $datos['tamano'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Cantidad</th>
                <td>{{ $datos['cantidad'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Tipo</th>
                <td>{{ $datos['tipo'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Material</th>
                <td>{{ $datos['material'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Información adicional</th>
                <td>{{ $datos['informacion_adicional'] ?? 'No proporcionada' }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
