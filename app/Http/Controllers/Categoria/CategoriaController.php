<?php

namespace App\Http\Controllers\Categoria;

use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Transformers\CategoriaTransformer;

class CategoriaController extends ApiController
{
    public function __construct()
    {
        $this->middleware('client.credentials')->only(['index', 'show']);
        $this->middleware('auth:api')->except(['index', 'show']);
        $this->middleware('transform.input:' . CategoriaTransformer::class)->only(['store', 'update']);
    }

    public function index()
    {
        $categorias = Categoria::all();

        return $this->showAll($categorias);
    }

    public function store(Request $request)
    {
        $reglas = [
            'nombre' => 'required',
            'descripcion' => 'required'
        ];

        $this->validate($request, $reglas);

        $categoria = Categoria::create($request->all());

        return $this->showOne($categoria, 201);
    }

    public function show(Categoria $categoria)
    {
        return $this->showOne($categoria);
    }

    public function update(Request $request, Categoria $categoria)
    {

        $categoria->fill($request->only([
            'nombre',
            'descripcion',
        ]));
        if ($categoria->isClean()) {
            return $this->errorResponse('Debe especificar al menos un valor diferente para actualizar', 422);
        }
        $categoria->save();
        return $this->showOne($categoria);
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return $this->showOne($categoria);
    }
}
