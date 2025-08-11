<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Filme;
use Illuminate\Http\Request;

class FilmesController extends Controller
{
    public function index(Request $request)
    {
        $query = Filme::query();

        if ($request->filled('ano')) {
            $query->where('ano', $request->ano);
        }

        if ($request->filled('categoria_id')) {
            $query->whereHas('categorias', function ($q) use ($request) {
                $q->where('categorias.id', $request->categoria_id);
            });
        }

        $filmes = $query->get();
        $categorias = Categoria::all();

        return view('filmes.index', compact('filmes', 'categorias'));
    }

    public function verMais($id)
    {
        $filme = Filme::with('categorias')->findOrFail($id);

        return view("filmes.verMais", [
            'filme' => $filme,
        ]);
    }

    public function form()
    {
        $categorias = Categoria::all();
        return view('filmes.form', compact('categorias'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string',
            'sinopse' => 'required|string',
            'ano' => 'required|integer|digits:4',
            'imagem' => 'required|image|mimes:jpeg,png,jpg',
            'link' => 'required|string',
            'categorias' => 'array', 
            'categorias.*' => 'exists:categorias,id', 
        ]);

        if($request->hasFile('imagem')){
            $caminho = $request->file('imagem')->store('imagens', 'public');
            $dados['imagem'] = $caminho;
        }

        $filme = Filme::create($dados);

        $filme->categorias()->sync($request->input('categorias', []));
        return redirect()->route('filmes');
    }

    public function edit($id)
    {
        $filme = Filme::with('categorias')->findOrFail($id);
        $categorias = Categoria::all();

        return view('filmes.form', compact('filme','categorias'));
    }

    public function update(Request $request, $id)
    {
        $dados = $request->validate([
            'nome' => 'required|string',
            'sinopse' => 'required|string',
            'ano' => 'required|integer|digits:4',
            'imagem' => 'image|mimes:jpeg,png,jpg',
            'link' => 'required|string',
            'categorias' => 'array', 
            'categorias.*' => 'exists:categorias,id', 
        ]);

        $filme = Filme::findOrFail($id);
        $filme->categorias()->sync($request->input('categorias', []));

        if($request->hasFile('imagem')){
            $caminho = $request->file('imagem')->store('imagens', 'public');
            $dados['imagem'] = $caminho;
        }
        
        $filme->update($dados);

        return redirect()->route('filmes.verMais', $id);
    }

    public function delete($id)
    {
        $filme = Filme::findOrFail($id);
        $filme->delete();

        return redirect()->route('filmes');
    }
}
