<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AprendizMongo;
use Illuminate\Http\Request;

class AprendizMongoController extends Controller
{
    // GET /api/aprendices-mongo
    public function index()
    {
        $aprendices = AprendizMongo::all();
        return response()->json($aprendices);
    }

    // POST /api/aprendices-mongo
    public function store(Request $request)
    {
        $aprendiz = AprendizMongo::create($request->all());
        return response()->json($aprendiz, 201);
    }

    // GET /api/aprendices-mongo/{id}
    public function show($id)
    {
        $aprendiz = AprendizMongo::find($id);
        if (!$aprendiz) {
            return response()->json(['message' => 'Aprendiz no encontrado'], 404);
        }
        return response()->json($aprendiz);
    }

    // PUT /api/aprendices-mongo/{id}
    public function update(Request $request, $id)
    {
        $aprendiz = AprendizMongo::find($id);
        if (!$aprendiz) {
            return response()->json(['message' => 'Aprendiz no encontrado'], 404);
        }
        $aprendiz->update($request->all());
        return response()->json($aprendiz);
    }

    // DELETE /api/aprendices-mongo/{id}
    public function destroy($id)
    {
        $aprendiz = AprendizMongo::find($id);
        if (!$aprendiz) {
            return response()->json(['message' => 'Aprendiz no encontrado'], 404);
        }
        $aprendiz->delete();
        return response()->json(['message' => 'Aprendiz eliminado correctamente']);
    }
}