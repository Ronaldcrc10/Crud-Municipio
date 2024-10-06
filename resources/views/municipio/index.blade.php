<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado de Municipios</title>

    <style>
        body {
            background-color: #f4f6f9;
        }
        .container {
            margin-top: 50px;
            max-width: 900px;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
        }
        .btn-success {
            margin-bottom: 20px;
            background-color: #28a745;
            border-color: #28a745;
            transition: background-color 0.3s ease;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #218838;
        }
        table {
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        thead {
            background-color: #343a40;
            color: #fff;
        }
        th, td {
            text-align: center;
            vertical-align: middle;
        }
        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
            transition: background-color 0.3s ease;
        }
        .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            transition: background-color 0.3s ease;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
  </head>
  <body>
    <div class="container">
        <h1 class="text-center">Listado de Municipios</h1>
        
        <!-- Botón para agregar nuevo municipio -->
        <a href="{{ route('municipios.create') }}" class="btn btn-success">Agregar Municipio</a>

        <!-- Tabla de municipios -->
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Municipio</th>
                    <th scope="col">Departamento</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($municipios as $municipio)
                    <tr>
                        <th scope="row">{{ $municipio->muni_codi }}</th>
                        <td>{{ $municipio->muni_nomb }}</td>
                        <td>{{ $municipio->depa_nomb }}</td>
                        <td>
                            <!-- Botón para editar municipio -->
                            <a href="{{ route('municipios.edit',['municipio' =>$municipio->muni_codi]) }}" class="btn btn-info">Editar</a>

                        <!-- Botón para eliminar un municipio -->
                        <form action="{{ route('municipios.destroy', ['municipio' => $municipio->muni_codi]) }}" method='POST' style="display: inline-block">
                                @method('delete')
                                @csrf
                                <input class="btn btn-danger" type="submit" value="Eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar esta comuna?')">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>