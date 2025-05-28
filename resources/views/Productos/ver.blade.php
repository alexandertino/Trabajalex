<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Detalle del Producto</title>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-color: #f3f7fa;
                margin: 0;
                padding: 40px;
                color: #333;
            }

            .container {
                max-width: 600px;
                margin: 0 auto;
                background-color: #fff;
                border-radius: 12px;
                box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
                padding: 30px;
                animation: fadeIn 0.6s ease-in-out;
            }

            h1 {
                text-align: center;
                color: #2c3e50;
                margin-bottom: 30px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th {
                text-align: left;
                color: #555;
                padding: 8px 0;
                width: 40%;
            }

            td {
                padding: 8px 0;
            }

            .buttons {
                margin-top: 30px;
                text-align: center;
            }

            button {
                background-color: #3498db;
                color: white;
                border: none;
                padding: 10px 16px;
                border-radius: 6px;
                cursor: pointer;
                transition: background-color 0.3s, transform 0.2s;
                margin: 5px;
            }

            button:hover {
                background-color: #2980b9;
                transform: scale(1.05);
            }

            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }

            .btn-volver:hover {
                background-color: #e74c3c;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <h2>Detalle del Producto</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <td>{{ $producto->id }}</td>
                </tr>
                <tr>
                    <th>Código</th><td>
                    {{ $producto->codigo }}</td>
                </tr>
                <tr>
                    <th>Nombre</th><td>
                    {{ $producto->nombre }}</td>
                </tr>
                <tr>
                    <th>Descripción</th>
                    <td>{{ $producto->descripcion ?? 'Sin descripción' }}</td>
                </tr>
                <tr>
                    <th>Categoría</th>
                    <td>{{ $producto->categoria->nombre }}</td>
                    </tr>
                <tr>
                    <th>Fecha de creación</th>
                    <td>{{ $producto->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                <tr>
                    <th>Última actualización</th>
                    <td>{{ $producto->updated_at->format('d/m/Y H:i') }}</td>
                </tr>
            </table>

            <a href="{{ route('producto.index') }}"><button class="btn-volver">Volver</button></a>
            <a href="{{ route('producto.edit', $producto->id) }}"><button>Editar</button></a>
        </div>
    </body>
</html>
