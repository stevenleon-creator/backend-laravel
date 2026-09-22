<?php

namespace App\Http\Controllers;

use App\Models\AprendizMongo;
use Illuminate\Http\Request;

class AprendizMongoController extends Controller
{
    // GET /api/aprendices-mongo
    public function index()
    {
        return AprendizMongo::all();
    }

    // POST /api/aprendices-mongo
    public function store(Request $request)
    {
        $aprendiz = AprendizMongo::create($request->all());
        return response()->json($aprendiz, 201);
    }

    // GET /api/aprendices-mongo/{id}
    public function show(string $id)
    {
        return AprendizMongo::findOrFail($id);
    }

    // PUT /api/aprendices-mongo/{id}
    public function update(Request $request, string $id)
    {
        $aprendiz = AprendizMongo::findOrFail($id);
        $aprendiz->update($request->all());
        return response()->json($aprendiz);
    }

    // DELETE /api/aprendices-mongo/{id}
    public function destroy(string $id)
    {
        AprendizMongo::destroy($id);
        return response()->json(null, 204);
    }
}   