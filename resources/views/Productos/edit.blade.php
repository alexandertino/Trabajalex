<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Editar Producto</title>
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


            h1 {
                text-align: center;
                color: #2c3e50;
                margin-bottom: 30px;
            }

            label {
                display: block;
                margin-bottom: 8px;
                font-weight: bold;
            }

            input, textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 20px;
                border-radius: 6px;
                border: 1px solid #ccc;
                transition: border-color 0.3s;
            }

            input:focus, textarea:focus {
                border-color: #3498db;
                outline: none;
            }

            button {
                background-color: #3498db;
                color: white;
                border: none;
                padding: 12px 18px;
                border-radius: 6px;
                cursor: pointer;
                transition: background-color 0.3s, transform 0.2s;
                margin-right: 10px;
            }

            button:hover {
                background-color: #2980b9;
                transform: scale(1.05);
            }

            .cancelar {
                background-color: #7f8c8d;
            }

            .cancelar:hover {
                background-color: #636e72;
            }

            .error {
                color: red;
                margin-bottom: 20px;
            }

            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
        </style>
    </head>
    <body>
        <div class="form-container">
            <h2>Editar Producto</h2>

            <form action="{{ route('producto.update', $producto->id) }}" method="POST">
                @csrf
                @method('PUT') 

                <label>Código:</label>
                <input type="text" name="codigo" value="{{ $producto->codigo }}" required>

                <label>Nombre:</label>
                <input type="text" name="nombre" value="{{ $producto->nombre }}" required>

                <label>Descripción:</label>
                <textarea name="descripcion">{{ $producto->descripcion }}</textarea>

                <label>Categoría:</label>
                <select name="categoria_id" required>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>

                <button type="submit">Actualizar</button>
                <a href="{{ route('producto.index') }}">Cancelar</a>
            </form>
        </div>
    </body>
</html>
