@extends('bases.base')

@section('content')
@if (session()->has('guardo')=='si')
{{-- comprueba si existe el valor en sesión --}}

    <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
        <div class="d-flex align-items-center">
            <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-white">Registro</h6>
                <div class="text-white">Actualizado correctamente!</div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@endif
    <h5>Editar Trabajador</h5>
    <form action="{{route('trabajadores.update')}}" method="POST">@csrf
        <div class="row">
            <div class="col-md-2">
                <label for="">Id</label>
                <input type="text" class="form-control" name="id" value="{{$obj->id}}" readonly style="background-color: rgb(223, 217, 217)">
            </div>
            <div class="col-md-2">
                <label for="">dni</label>
                <input type="text" class="form-control" name="dni" value="{{$obj->dni}}" maxlength="8" required>
            </div>
            <div class="col-md-4">
                <label for="">nombres</label>
                <input type="text" class="form-control" name="nombres" value="{{$obj->nombres}}" maxlength="200" required>
            </div>
            <div class="col-md-4">
                <label for="">ape_paterno</label>
                <input type="text" class="form-control" name="ape_paterno" value= "{{$obj->ape_paterno}}" maxlength="200" required>
            </div>
            <div class="col-md-4">
                <label for="">ape_materno</label>
                <input type="text" class="form-control" name="ape_materno" value="{{$obj->ape_materno}}" maxlength="200" required>
            </div>
            <div class="col-md-4">
                <label for="">sexo</label>
                <select name="sexo" class="form-select">
                    @if (($obj->sexo)=="M")
                        <option value="M" selected>MASCULINO</option>
                        <option value="F">FEMENINO</option>
                    @else
                        <option value="F" selected>FEMENINO</option>
                        <option value="M">MASCULINO</option>
                    @endif
                    
                </select>
            </div>
            <div class="col-md-4">
                <label for="">fecha_nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control" value="{{$obj->fecha_nacimiento}}">
            </div>
            <div class="col-md-4">
                <label for="">fecha_ingreso</label>
                <input type="date" name="fecha_ingreso" class="form-control" value="{{$obj->fecha_ingreso}}">
            </div>
            <div class="col-md-4">
                <label for="">modalidad</label>
                <input type="text" name="modalidad" class="form-control" maxlength="50" value="{{$obj->modalidad}}">
            </div>
            <div class="col-md-4">
                <label for="">lugar_trabajo</label>
                <input type="text" name="lugar_trabajo" class="form-control" maxlength="200" value="{{$obj->lugar_trabajo}}">
            </div>
            <div class="col-md-4">
                <label for="">ocupacion</label>
                <input type="text" name="ocupacion" class="form-control" maxlength="200" value="{{$obj->ocupacion}}">
            </div>
            <div class="row">
                <div class="col-md-4">
                    <br>
                    <button type="submit" class="btn btn-danger">Guardar</button>
                </div>  
            </div>
        </div>

    </form>
@endsection
