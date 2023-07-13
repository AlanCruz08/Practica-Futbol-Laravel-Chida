<?php

namespace App\Http\Controllers;

use App\Models\futbolista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FutbolistaController extends Controller
{
    protected $reglas = [
        'nombre' => 'required|string|min:3|max:60',
        'ap_paterno' => 'required|string|min:3|max:60',
        'ap_materno' => 'nullable|string|min:3|max:60',
        'alias' => 'nullable|string|min:3|max:60',
        'no_camiseta' => 'required|numeric',
    ];

    public function index()
    {
        $futbolistas = futbolista::all();

        return response()->json([
            'msg' => 'Futbolistas obtenidos correctamente',
            'data' => $futbolistas,
            'status' => 200
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->reglas);

        if ($validator->fails())
            return response()->json([
                'msg' => 'Error de validación',
                'data' => $validator->errors(),
                'status' => 422
            ], 422);

        if (!$request->bearerToken())
            return response()->json([
                'msg' => 'No autorizado',
                'data' => null,
                'status' => 401
            ], 401);

        $futbolista = futbolista::create($validator->validated());

        if (!$futbolista->save())
            return response()->json([
                'msg' => 'Error al crear el futbolista',
                'data' => null,
                'status' => 422
            ], 422);

        return response()->json([
            'msg' => 'futbolista creado correctamente',
            'data' => $futbolista,
            'status' => 201
        ], 201);
    }

    public function update(Request $request, int $futbolistaID)
    {
        $validator = Validator::make($request->all(), $this->reglas);

        if ($validator->fails())
            return response()->json([
                'msg' => 'Error de validación',
                'data' => $validator->errors(),
                'status' => 422
            ], 422);

        if (!$request->bearerToken())
            return response()->json([
                'msg' => 'No autorizado',
                'data' => null,
                'status' => 401
            ], 401);

        $futbolista = futbolista::find($futbolistaID);
        if (!$futbolista)
            return response()->json([
                'msg' => 'No encontrado',
                'data' => null,
                'status' => 404
            ], 404);

        $futbolista->update($validator->validated());

        if (!$futbolista->save())
            return response()->json([
                'msg' => 'Error al actualizar el futbolista',
                'data' => null,
                'status' => 422
            ], 422);

        return response()->json([
            'msg' => 'Futbolista actualizado correctamente',
            'data' => $futbolista,
            'status' => 201
        ], 201);
    }

    public function destroy(int $futbolistaID, Request $request)
    {
        if (!$request->bearerToken())
            return response()->json([
                'msg' => 'No autorizado',
                'data' => null,
                'status' => 401
            ], 401);
        
        $futbolista = futbolista::find($futbolistaID);
        if (!$futbolista)
            return response()->json([
                'msg' => 'No se encontro el futbolista',
                'data' => $futbolistaID,
                'status' => 404
            ], 404);

        $futbolista->delete();

        return response()->json([
            'msg' => 'Futbolista eliminado correctamente',
            'data' => $futbolista,
            'status' => 201
        ], 201);
    }
}
