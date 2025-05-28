<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f7fa;
            margin: 0;
            padding: 40px;
            color: #333;
        }

        .container {
            max-width: 1000px;
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
            margin-top: 20px;
        }

        th, td {
            padding: 12px 16px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #ecf0f1;
            color: #2c3e50;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 8px 14px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            margin: 2px;
        }

        button:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }

        .btn-eliminar {
            background-color: #e74c3c;
        }

        .btn-eliminar:hover {
            background-color: #c0392b;
        }

        .add-button {
            display: inline-block;
            margin-bottom: 20px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
    <script>
        function confirmDelete() {
            return confirm("¿Estás seguro de que deseas eliminar este cliente?\nEsta acción no se puede deshacer.");
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Lista de Clientes</h1>

        <div class="add-button">
            <a href="{{ route('cliente.create') }}">
                <button>Agregar Cliente</button>
            </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Tipo Doc.</th>
                    <th>Número Doc.</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nombres }}</td>
                        <td>{{ $cliente->pri_ape }}</td>
                        <td>{{ $cliente->seg_ape }}</td>
                        <td>{{ $cliente->docu_tip }}</td>
                        <td>{{ $cliente->docu_num }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>{{ $cliente->direccion }}</td>
                        <td>
                            <a href="{{ route('cliente.show', $cliente->id) }}">
                                <button>Ver</button>
                            </a>
                            <a href="{{ route('cliente.edit', $cliente->id) }}">
                                <button>Editar</button>
                            </a>
                            <form action="{{ route('cliente.destroy') }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $cliente->id }}">
                                <button type="submit" class="btn-eliminar" onclick="return confirmDelete()">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
