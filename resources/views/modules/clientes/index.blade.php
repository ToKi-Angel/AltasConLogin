@extends('layouts/main')

@section('contenido')
    <div class="container">
        <h1>Control de gastos</h1>
        <a href="/create" class="btn btn-primary">Nuevo gasto</a>
        <div class="row mt-4">
            <div class="col-6">
                <h3>Total Ganado</h3>
                <p style="color: green">{{ $totalGanado }}</p>
            </div>
            <div class="col-6">
                <h3>Total Gastado</h3>
                <p style="color: red">{{ $totalGastado }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table id="gastos" class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tipo</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->tipo }}</td>
                                <td>{{ $item->categoria }}</td>
                                <td>{{ $item->cantidad }}</td>
                                <td>{{ $item->descripcion }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
