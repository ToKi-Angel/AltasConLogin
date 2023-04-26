@extends('layouts/main')

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h2>Agregar nuevo nombre</h2>
                <a href="/" class="btn btn-info">Regresar</a>
                <form action="/store" method="post">
                    @csrf
                    @method('POST')

                    <label for="tipo">Selecciona el tipo</label>
                    <select name="tipo" id="tipo" class="form-control">
                        @foreach (['Gasto', 'Cobro'] as $tipo)
                            <option value="{{ $tipo }}">{{ $tipo }}</option>
                        @endforeach
                    </select>

                    <label for="categoria">Selecciona la categoría</label>
                    <select name="categoria" id="categoria" class="form-control">
                        @foreach (['Comida', 'Transporte', 'Hogar', 'Entretenimiento', 'Ropa', 'Salud', 'Educación', 'Tecnología', 'Mascotas', 'Vacaciones', 'Deudas', 'Impuestos', 'Seguros', 'Ahorros', 'Inversiones', 'Regalos', 'Caridad', 'Otros'] as $categoria)
                            <option value="{{ $categoria }}">{{ $categoria }}</option>
                        @endforeach
                    </select>

                    <label for="cantidad">Escribe la cantidad</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control" pattern="[0-9]+"
                        inputmode="numeric" title="Por favor ingrese solo números">

                    <label for="descripcion">Descripción detallada:</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" rows="5"></textarea>


                    <button class="btn btn-primary mt-3">
                        Guardar
                    </button>
                </form>
            </div>
            <div class="col-6">
            </div>
        </div>
    </div>
@endsection
