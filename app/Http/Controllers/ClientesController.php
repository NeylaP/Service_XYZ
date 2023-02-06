<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clientes['clientes'] = Clientes::paginate(5);
        return view("clientes.index", $clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("clientes.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $inputs = [
            'nombre' => 'required|string|max:100',
            'cedula' => 'required|numeric|digits_between:5,10',
            'telefono' => 'required|numeric|digits:10',
            'email' => 'required|string|max:50',
            'observaciones' => 'required|string',
            'imagen' => 'required',
        ];
        $mensaje = ["required" => 'El :attribute es requerido'];
        $this->validate($request, $inputs, $mensaje);
        $clientes = request()->except('_token');
        if ($request->hasFile('imagen')) {
            $clientes['imagen'] = $request->file('imagen')->store('imagenes', 'public');
        }
        Clientes::insert($clientes);
        return redirect('clientes')->with('mensaje', 'Cliente agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Clientes::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $inputs = [
            'nombre' => 'required|string|max:100',
            'cedula' => 'required|numeric|digits_between:5,10',
            'telefono' => 'required|numeric|digits:10',
            'email' => 'required|string|max:50',
            'observaciones' => 'required|string',
        ];
        $mensaje = ["required" => 'El :attribute es requerido'];
        $this->validate($request, $inputs, $mensaje);
        $data_cliente = request()->except(['_token', '_method']);
        if ($request->hasFile('imagen')) {
            $cliente = Clientes::findOrFail($id);
            Storage::delete('public/' . $cliente->imagen);
            $data_cliente['imagen'] = $request->file('imagen')->store('imagenes', 'public');
        }
        Clientes::where('id', '=', $id)->update($data_cliente);
        return redirect('clientes')->with('mensaje', 'Cliente modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cliente = Clientes::findOrFail($id);
        Storage::delete('public/' . $cliente->imagen);
        Clientes::destroy($id);
        return redirect('clientes')->with('mensaje', 'Producto eliminado con exito');
    }
}
