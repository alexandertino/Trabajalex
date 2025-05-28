<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #eef2f7;
            margin: 0;
            padding: 40px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.6s ease-in-out;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #34495e;
            font-weight: 600;
        }

        input, select {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            transition: border-color 0.3s;
        }

        input:focus, select:focus {
            border-color: #3498db;
            outline: none;
        }

        button {
            background-color: #27ae60;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        button:hover {
            background-color: #1e8449;
            transform: scale(1.05);
        }

        a {
            margin-left: 15px;
            font-size: 15px;
            color: #555;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: #e74c3c;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <h1>Editar Cliente</h1>

    <div class="form-container">
        <form action="{{ route('cliente.update') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $cliente->id }}">

            <label>Nombres:</label>
            <input type="text" name="nombres" value="{{ $cliente->nombres }}" required>

            <label>Primer Apellido:</label>
            <input type="text" name="pri_ape" value="{{ $cliente->pri_ape }}" required>

            <label>Segundo Apellido:</label>
            <input type="text" name="seg_ape" value="{{ $cliente->seg_ape }}" required>

            <label>Tipo de Documento:</label>
            <select name="docu_tip" required>
                <option value="">-- Selecciona un tipo --</option>
                <option value="DNI" {{ $cliente->docu_tip == 'DNI' ? 'selected' : '' }}>DNI</option>
                <option value="Pasaporte" {{ $cliente->docu_tip == 'Pasaporte' ? 'selected' : '' }}>Pasaporte</option>
                <option value="RUC" {{ $cliente->docu_tip == 'RUC' ? 'selected' : '' }}>RUC</option>
            </select>

            <label>Número de Documento:</label>
            <input type="text" name="docu_num" value="{{ $cliente->docu_num }}" required>

            <label>Teléfono:</label>
            <input type="text" name="telefono" value="{{ $cliente->telefono }}">

            <label>Dirección:</label>
            <input type="text" name="direccion" value="{{ $cliente->direccion }}">

            <button type="submit">Actualizar</button>
            <a href="{{ route('cliente.index') }}">Cancelar</a>
        </form>
    </div>
</body>
</html>
