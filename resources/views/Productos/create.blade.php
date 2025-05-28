<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create</title>
    </head>
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
                background-color: #3498db;
                color: #fff;
                border: none;
                padding: 12px 20px;
                border-radius: 6px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s, transform 0.2s;
            }

            button:hover {
                background-color: #2980b9;
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


            .error-box {
                background-color: #fdecea;
                color: #c0392b;
                border-left: 5px solid #e74c3c;
                padding: 15px 20px;
                margin-bottom: 20px;
                border-radius: 6px;
                animation: fadeIn 0.5s ease-in-out;
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
    <body>
        <form action="{{ route('producto.store') }}" method="post">
            @csrf

            <label for="categoria_id">Categoría</label>
            <select name="categoria_id" id="categoria_id" required>
                <option value="" disabled selected>Selecciona una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>

            <label for="codigo">Código</label>
            <input type="text" name="codigo" id="codigo" autocomplete="off" required>

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" autocomplete="off" required>

            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" autocomplete="off">

            <button type="submit">Guardar</button>
        </form>
    </body>
</html>