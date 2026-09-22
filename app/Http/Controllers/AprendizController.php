<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use Illuminate\Http\Request;

class AprendizController extends Controller
{
    // GET /api/aprendices → ver todos
    public function index()
    {
        return Aprendiz::all();
    }

    // POST /api/aprendices → crear
    public function store(Request $request)
    {
        $aprendiz = Aprendiz::create($request->all());
        return response()->json($aprendiz, 201);
    }

    // GET /api/aprendices/{id} → ver por id
    public function show(string $id)
    {
        return Aprendiz::findOrFail($id);
    }

    // PUT /api/aprendices/{id} → actualizar
    public function update(Request $request, string $id)
    {
        $aprendiz = Aprendiz::findOrFail($id);
        $aprendiz->update($request->all());
        return response()->json($aprendiz);
    }

    // DELETE /api/aprendices/{id} → eliminar
    public function destroy(string $id)
    {
        Aprendiz::destroy($id);
        return response()->json(null, 204);
    }
}