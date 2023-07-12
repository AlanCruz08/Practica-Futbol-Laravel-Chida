<?php

namespace App\Http\Controllers;

use App\Models\estadio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class EstadioController extends Controller
{
    protected $reglas = [
        'nombre' => 'required|string|max:255',
        'pais' => 'required|string|max:255',
        'capacidad' => 'required|numeric',
    ];
    public function index()
    {
        $estadios = estadio::all();
        return response()->json([
            'msg' => 'Estadios obtenidos correctamente',
            'data' => $estadios,
            'status' => 201
        ], 201);
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

        $estadio = estadio::create($validator->validated());

        if (!$estadio->save())
            return response()->json([
                'msg' => 'Error al crear el estadio',
                'data' => null,
                'status' => 422
            ], 422);

        return response()->json([
            'msg' => 'Estadio creado correctamente',
            'data' => $estadio,
            'status' => 201
        ], 201);
    }

    public function update(Request $request, int $estadioID)
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

        $estadio = estadio::find($estadioID);
        if (!$estadio)
            return response()->json([
                'msg' => 'No encontrado',
                'data' => null,
                'status' => 404
            ], 404);

        $estadio->nombre = $request->nombre;
        $estadio->pais = $request->pais;
        $estadio->capacidad = $request->capacidad;

        if (!$estadio->save())
            return response()->json([
                'msg' => 'Error al actualizar el estadio',
                'data' => null,
                'status' => 422
            ], 422);

        return response()->json([
            'msg' => 'Estadio actualizado correctamente',
            'data' => $estadio,
            'status' => 201
        ], 201);
    }

    public function destroy(int $estadioID, Request $request)
    {
        if (!$request->bearerToken())
            return response()->json([
                'msg' => 'No autorizado',
                'data' => null,
                'status' => 401
            ], 401);
        
        $estadio = estadio::find($estadioID);
        if (!$estadio)
            return response()->json([
                'msg' => 'No se encontro el estadio',
                'data' => $estadioID,
                'status' => 404
            ], 404);

        $estadio->delete();

        return response()->json([
            'msg' => 'Estadio eliminado correctamente',
            'data' => $estadio,
            'status' => 201
        ], 201);
    }
}
