<?php

namespace App\Http\Controllers\Cliente;

use App\Models\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $request) {

        $clientes = Cliente::latest()->get();

        return view('clientes.index', compact('clientes'));
    }

    public function create() {

        return view('clientes.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'pri_ape' => 'required|string|max:255',
            'seg_ape' => 'required|string|max:255',
            'docu_tip' => 'required|in:DNI,Pasaporte,RUC,CE',
            'docu_num' => 'required|numeric|unique:clientes,docu_num',
            'telefono' => 'nullable|string',
            'direccion' => 'nullable|string',
        ], [
            'required' => 'Este campo es obligatorio.',
            'docu_num.numeric' => 'El número de documento debe contener solo números.',
            'docu_num.unique' => 'Este número de documento ya está registrado.',
            'docu_tip.in' => 'El tipo de documento seleccionado no es válido.',
        ]);

        Cliente::create($request->all());

        return redirect()->route('cliente.index');
    }


    public function edit($id) {

        $cliente = Cliente::find($id);

        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request) {

        $cliente = Cliente::find($request->id);

        $cliente->update($request->except('id'));

        return redirect()->route('cliente.index');
    }

    public function delete($id) {

        $cliente = Cliente::find($id);

        return view('clientes.delete', compact('cliente'));
    }

    public function destroy(Request $request) {

        $cliente = Cliente::find($request->id);

        $cliente->delete();

        return redirect()->route('cliente.index');
    }

    public function show($id){
        $cliente = Cliente::findOrFail($id);
        return view('clientes.ver', compact('cliente'));
    }

}