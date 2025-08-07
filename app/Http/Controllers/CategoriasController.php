<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();

        return view("categorias.index", [
            'categorias' => $categorias,
        ]);
    }

    public function form()
    {
        return view('categorias.form');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'name' => 'required|string',
        ]);

        Categoria::create($dados);
        return redirect()->route('categorias.index');
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);

        return view('categorias.form', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $dados = $request->validate([
            'name' => 'required|string',
        ]);

        $categoria = Categoria::findOrFail($id);

        $categoria::update($dados);
        return redirect()->route('categorias.index');
    }

    public function delete($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categorias.index');
    }
}
