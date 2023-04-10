@extends('bases.base')

@section('extra_css')
    {{-- <link href="../../../assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" /> --}}
@endsection

@section('content')

    <h5>Buscar por DNI</h5>
    <form action="{{ route('trabajadores.index') }}" method="GET">
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-sm-5">
                <input type="text" class="form-control" id="txtBuscar" name="txtBuscar" value="{{ $texto }}">
            </div>
            <div class="col-sm-3">
                <button class="btn btn-primary">Filtrar</button>
            </div>

    </form>
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="DTTrabajadores">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Acción</th>
                    <th>dni</th>
                    <th>nombres</th>
                    <th>ape_paterno</th>
                    <th>ape_materno</th>
                    <th>sexo</th>
                    <th>fecha_nacimiento</th>
                    <th>fecha_ingreso</th>
                    <th>modalidad</th>
                    <th>lugar_trabajo</th>
                    <th>ocupacion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trabajadores as $tra)
                    <tr>
                        <td>{{ $tra->id }}</td>
                        <td><a href="/trabajadores/edit/{{ $tra->id }}" class="btn btn-warning btn-sm">Editar</a>
                            <a href="#" class="btn btn-info btn-sm">Detalle</a>
                        </td>
                        <td>{{ $tra->dni }}</td>
                        <td>{{ $tra->nombres }}</td>
                        <td>{{ $tra->ape_paterno }}</td>
                        <td>{{ $tra->ape_materno }}</td>
                        <td>{{ $tra->sexo }}</td>
                        <td>{{ $tra->fecha_nacimiento }}</td>
                        <td>{{ $tra->fecha_ingreso }}</td>
                        <td>{{ $tra->modalidad }}</td>
                        <td>{{ $tra->lugar_trabajo }}</td>
                        <td>{{ $tra->ocupacion }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



   

@endsection
@section('extra_js')
    {{-- <script src="../../../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="../../../assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script> --}}
@endsection
