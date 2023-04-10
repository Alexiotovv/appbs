<?php

namespace App\Http\Controllers;

use App\Models\trabajadores;
use Illuminate\Http\Request;
use DB;
class TrabajadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=$request->get('txtBuscar');
        $obj=trabajadores::where('dni','like','%'.$texto.'%')
        // ->orwhere('nombres' 'ape_paterno', 'like','%'.$texto.'%')
        // ->orwhere('ape_paterno', 'like','%'.$texto.'%')
        // ->orwhere('ape_materno', 'like','%'.$texto.'%')
        ->orderByDesc('trabajadores.id')
        ->paginate(15);
        return view('trabajadores.trabajador_index',['trabajadores'=>$obj,'texto'=>$texto]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trabajadores.trabajador_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj=new trabajadores();
        $obj->dni=request('dni');
        $obj->nombres=request('nombres');
        $obj->ape_paterno=request('ape_paterno');
        $obj->ape_materno=request('ape_materno');
        $obj->sexo=request('sexo');
        $obj->fecha_nacimiento=request('fecha_nacimiento');
        $obj->fecha_ingreso=request('fecha_ingreso');
        $obj->modalidad=request('modalidad');
        $obj->lugar_trabajo=request('lugar_trabajo');
        $obj->ocupacion=request('ocupacion');
        $obj->usuario=1;
        $obj->save();
        return redirect()->route('trabajadores.create')->with('guardo','si');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\trabajadores  $trabajadores
     * @return \Illuminate\Http\Response
     */
    public function show(trabajadores $trabajadores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\trabajadores  $trabajadores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj=trabajadores::find($id);
        return view('trabajadores.trabajador_edit',['obj'=>$obj]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\trabajadores  $trabajadores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, trabajadores $trabajadores)
    {
        $id=request('id');
        $obj= trabajadores::findOrFail($id);
        $obj->dni=request('dni');
        $obj->nombres=request('nombres');
        $obj->ape_paterno=request('ape_paterno');
        $obj->ape_materno=request('ape_materno');
        $obj->sexo=request('sexo');
        $obj->fecha_nacimiento=request('fecha_nacimiento');
        $obj->fecha_ingreso=request('fecha_ingreso');
        $obj->modalidad=request('modalidad');
        $obj->lugar_trabajo=request('lugar_trabajo');
        $obj->ocupacion=request('ocupacion');
        $obj->save();
        return redirect()->route('trabajadores.edit',[$id])->with('guardo','si');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\trabajadores  $trabajadores
     * @return \Illuminate\Http\Response
     */
    public function destroy(trabajadores $trabajadores)
    {
        //
    }
}
