<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Categoría</title>
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalle de Categoría</h1>
        <table>
            <tr>
                <th>ID:</th>
                <td>{{ $categoria->id }}</td>
            </tr>
            <tr>
                <th>Nombre:</th>
                <td>{{ $categoria->nombre }}</td>
            </tr>
            <tr>
                <th>Descripción:</th>
                <td>{{ $categoria->descripcion ?? 'No registrada' }}</td>
            </tr>
            <tr>
                <th>Creado:</th>
                <td>{{ $categoria->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            <tr>
                <th>Actualizado:</th>
                <td>{{ $categoria->updated_at->format('d/m/Y H:i') }}</td>
            </tr>
        </table>

        <div class="buttons">
            <a href="{{ route('categoria.index') }}">
                <button>Volver</button>
            </a>
            <a href="{{ route('categoria.edit', $categoria->id) }}">
                <button>Editar</button>
            </a>
        </div>
    </div>
</body>
</html>
