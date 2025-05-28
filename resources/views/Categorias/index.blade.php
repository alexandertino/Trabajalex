<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Categorías</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f7fa;
            margin: 0;
            padding: 40px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            animation: fadeInDown 0.6s ease-in-out;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            padding: 30px;
            animation: fadeIn 0.7s ease-in-out;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 14px 16px;
            text-align: left;
            border-bottom: 1px solid #e1e4e8;
        }

        th {
            background-color: #f8f9fa;
            color: #34495e;
            font-weight: 600;
        }

        td {
            color: #555;
        }

        a button, .btn-eliminar {
            padding: 10px 16px;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            margin: 2px;
        }

        a button {
            background-color: #3498db;
            color: white;
            border: none;
        }

        a button:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }

        .btn-eliminar {
            background-color: #e74c3c;
            color: white;
            border: none;
        }

        .btn-eliminar:hover {
            background-color: #c0392b;
            transform: scale(1.05);
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .top-button {
            text-align: right;
            margin-bottom: 20px;
        }

        .top-button button {
            background-color: #2ecc71;
        }

        .top-button button:hover {
            background-color: #27ae60;
        }
    </style>

    <script>
        function confirmDelete() {
            return confirm("¿Estás seguro de que deseas eliminar esta categoría?\nEsta acción no se puede deshacer.");
        }
    </script>
</head>
<body>
    <h1>Lista de Categorías</h1>

    <div class="container">
        <div class="top-button">
            <a href="{{ route('categoria.create') }}">
                <button>Agregar Categoría</button>
            </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr class="fade-in">
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->descripcion }}</td>
                        <td>
                            <a href="{{ route('categoria.show', $categoria->id) }}">
                                <button>Ver</button>
                            </a>
                            <a href="{{ route('categoria.edit', $categoria->id) }}">
                                <button>Editar</button>
                            </a>
                            <form action="{{ route('categoria.destroy') }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $categoria->id }}">
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
