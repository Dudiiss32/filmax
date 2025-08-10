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

    public function verMais($id)
    {
        $filme = Filme::findOrFail($id);

        return view("filmes.verMais", [
            'filme' => $filme,
        ]);
    }

    public function form()
    {
        return view('filmes.form');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string',
            'sinopse' => 'required|string',
            'ano' => 'required|integer|digits:4',
            'imagem' => 'required|string',
            'link' => 'required|string',
        ]);

        Filme::create($dados);
        return redirect()->route('filmes');
    }

    public function edit($id)
    {
        $filme = Filme::findOrFail($id);

        return view('filmes.form', compact('filme'));
    }

    public function update(Request $request, $id)
    {
        $dados = $request->validate([
            'nome' => 'required|string',
            'sinopse' => 'required|string',
            'ano' => 'required|integer|digits:4',
            'imagem' => 'required|string',
            'link' => 'required|string',
        ]);

        $filme = Filme::findOrFail($id);
        $filme->update($dados);

        return redirect()->route('filmes');
    }

    public function delete($id)
    {
        $filme = Filme::findOrFail($id);
        $filme->delete();

        return redirect()->route('filmes');
    }
}
