<?php

namespace App\Http\Controllers;

use App\Models\Monitoria;
use Illuminate\Http\Request;

class MonitoriaController extends Controller
{
    // GET /api/monitorias → ver todas
    public function index()
    {
        return Monitoria::all();
    }

    // POST /api/monitorias → crear
    public function store(Request $request)
    {
        $monitoria = Monitoria::create($request->all());
        return response()->json($monitoria, 201);
    }

    // GET /api/monitorias/{id} → ver por id
    public function show(string $id)
    {
        return Monitoria::findOrFail($id);
    }

    // PUT /api/monitorias/{id} → actualizar
    public function update(Request $request, string $id)
    {
        $monitoria = Monitoria::findOrFail($id);
        $monitoria->update($request->all());
        return response()->json($monitoria);
    }

    // DELETE /api/monitorias/{id} → eliminar
    public function destroy(string $id)
    {
        Monitoria::destroy($id);
        return response()->json(null, 204);
    }
}