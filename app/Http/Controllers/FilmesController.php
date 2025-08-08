<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;

class FilmesController extends Controller
{
    public function index()
    {
        $filmes = Filme::all();

        return view("filmes.index", [
            'filmes' => $filmes,
        ]);
    }

    public function verMais($id){
        $filme = Filme::findOrFail($id);

        return view("filmes.verMais", [
            'filme' => $filme,
        ]);
    }

    public function form($id)
    {
        return view('filmes.form');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'name' => 'required|string',
        ]);

        Filme::create($dados);
        return redirect()->route('filmes.index');
    }

    public function edit($id)
    {
        $filme = Filme::findOrFail($id);

        return view('filmes.form', compact('filme'));
    }

    public function update(Request $request, $id)
    {
        $dados = $request->validate([
            'name' => 'required|string',
        ]);

        $filme = Filme::findOrFail($id);

        $filme::update($dados);
        return redirect()->route('filmes.index');
    }

    public function delete($id)
    {
        $filme = Filme::findOrFail($id);
        $filme->delete();

        return redirect()->route('');
    }
}
