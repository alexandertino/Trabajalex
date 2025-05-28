<?php

namespace App\Http\Controllers\Categoria;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(Request $request) {

        $categorias = Categoria::latest()->get();

        return view('categorias.index', compact('categorias'));
    }

    public function create() {

        return view('categorias.create');
    }

    public function store(Request $request) {

        $categoria = Categoria::create($request->all());

        return redirect()->route('categoria.index');
    }

    public function edit($id) {

        $categoria = Categoria::find($id);

        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request) {

        $categoria = Categoria::find($request->id);

        $categoria->update($request->except('id'));

        return redirect()->route('categoria.index');
    }

    public function delete($id) {

        $categoria = Categoria::find($id);

        return view('categorias.delete', compact('categoria'));
    }

    public function destroy(Request $request) {

        $categoria = Categoria::find($request->id);

        $categoria->delete();

        return redirect()->route('categoria.index');
    }

    public function show($id){
        $categoria = Categoria::findOrFail($id);
        return view('categorias.ver', compact('categoria'));
    }
}