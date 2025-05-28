<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Cliente</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f7fa;
            margin: 0;
            padding: 40px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            animation: fadeInDown 0.6s ease-in-out;
        }

        .table-container {
            max-width: 700px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.7s ease-in-out;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            background-color: #f5f5f5;
            color: #555;
            width: 35%;
        }

        td {
            color: #333;
        }

        .actions {
            text-align: center;
            margin-top: 25px;
        }

        .actions a button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 12px 20px;
            margin: 0 10px;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .actions a button:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <h1>Detalle del Cliente</h1>

    <div class="table-container">
        <table>
            <tr>
                <th>ID</th>
                <td>{{ $cliente->id }}</td>
            </tr>
            <tr>
                <th>Nombres</th>
                <td>{{ $cliente->nombres }}</td>
            </tr>
            <tr>
                <th>Primer Apellido</th>
                <td>{{ $cliente->pri_ape }}</td>
            </tr>
            <tr>
                <th>Segundo Apellido</th>
                <td>{{ $cliente->seg_ape }}</td>
            </tr>
            <tr>
                <th>Tipo de Documento</th>
                <td>{{ $cliente->docu_tip }}</td>
            </tr>
            <tr>
                <th>Número de Documento</th>
                <td>{{ $cliente->docu_num }}</td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td>{{ $cliente->telefono ?? 'No registrado' }}</td>
            </tr>
            <tr>
                <th>Dirección</th>
                <td>{{ $cliente->direccion ?? 'No registrada' }}</td>
            </tr>
            <tr>
                <th>Fecha de creación</th>
                <td>{{ $cliente->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            <tr>
                <th>Última actualización</th>
                <td>{{ $cliente->updated_at->format('d/m/Y H:i') }}</td>
            </tr>
        </table>

        <div class="actions">
            <a href="{{ route('cliente.index') }}"><button>Volver a la lista</button></a>
            <a href="{{ route('cliente.edit', $cliente->id) }}"><button>Editar</button></a>
        </div>
    </div>
</body>
</html>
