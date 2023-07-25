<?php

namespace App\Http\Controllers;

use App\Models\division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\equipo;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\ActualValueIsNotAnObjectException;

class DivisionController extends Controller
{

    protected $reglas = [
        'nivel' => 'required|numeric|max:8',
        'liga' => 'required|string|max:255',
    ];

    public function index()
    {
        $divisiones = division::all();

        return response()->json([
            'msg' => 'Divisiones obtenidas correctamente',
            'data' => $divisiones,
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

        $division = division::create($validator->validated());

        if (!$division->save())
            return response()->json([
                'msg' => 'Error al crear la division',
                'data' => null,
                'status' => 422
            ], 422);

        return response()->json([
            'msg' => 'Division creada correctamente',
            'data' => $division,
            'status' => 201
        ], 201);
    }

    public function update(Request $request, int $divisionID)
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


        $division = division::find($divisionID);
        if (!$division)
            return response()->json([
                'msg' => 'No encontrado',
                'data' => null,
                'status' => 404
            ], 404);

        $division->nivel = $request->nivel;
        $division->liga = $request->liga;

        if (!$division->save())
            return response()->json([
                'msg' => 'Error al actualizar la division',
                'data' => null,
                'status' => 422
            ], 422);

        return response()->json([
            'msg' => 'Division actualizada correctamente',
            'data' => $division,
            'status' => 201
        ], 201);
    }

    public function destroy(int $divisionID)
    {
        $division = division::find($divisionID);
        if (!$division)
            return response()->json([
                'msg' => 'No se encontro la division',
                'data' => $divisionID,
                'status' => 404
            ], 404);

        $division->delete();

        return response()->json([
            'msg' => 'Division eliminada correctamente',
            'data' => $division,
            'status' => 201
        ], 201);
    }

    public function ascender(int $equipoID)
    {
        $equipo = Equipo::find($equipoID);
        if (!$equipo) {
            return response()->json([
                'message' => 'Equipo no encontrado',
                'status' => 404
            ], 404);
        }

        $division = $equipo->divisiones()->first();

        if ($division) {
            $nivelActual = $division->nivel;
            if ($nivelActual > 1) {
                $divisionAnterior = Division::where('nivel', $nivelActual - 1)->first();
                
                if ($divisionAnterior) {
                    $equipo->divisiones()->sync([$divisionAnterior->id]);

                    return response()->json([
                        'msg' => 'Ascendido correctamente',
                        'data' => $divisionAnterior,
                        'status' => 200
                    ], 200);
                }
                return response()->json([
                    'message' => 'El equipo ya se encuentra en el nivel más alto de la división',
                    'data' => $division,
                    'status' => 200
                ], 200);
            } else {
                return response()->json([
                    'message' => 'El equipo ya se encuentra en el nivel más alto de la división',
                    'data' => $division,
                    'status' => 200
                ], 200);
            }
        } else {

            $divisionMasAlta = Division::orderBy('nivel', 'desc')->first();
            $equipo->divisiones()->sync([$divisionMasAlta->id]);
        }
        return response()->json([
            'msg' => 'ascendido correctamente',
            'data' => $division,
            'status' => 200
        ], 200);
    }

    public function descender(int $equipoID)
    {
        $equipo = Equipo::find($equipoID);

        if (!$equipo) {
            return response()->json([
                'message' => 'Equipo no encontrado',
                'status' => 404
            ], 404);
        }

        $division = $equipo->divisiones()->first();

        if ($division) {
            $nivelActual = $division->nivel;

            if ($nivelActual >= 1) {
                $divisionAnterior = Division::where('nivel', $nivelActual + 1)->first();

                if ($divisionAnterior) {
                    $equipo->divisiones()->sync([$divisionAnterior->id]);

                    return response()->json([
                        'msg' => 'Descendido correctamente',
                        'data' => $divisionAnterior,
                        'status' => 200
                    ], 200);
                } else {
                    // Eliminar registro en tabla pivot
                    $equipo->divisiones()->detach();

                    return response()->json([
                        'msg' => 'Equipo eliminado de la división',
                        'data' => null,
                        'status' => 200
                    ], 200);
                }
            } else {
                return response()->json([
                    'message' => 'El equipo ya se encuentra en el nivel más bajo de la división',
                    'data' => $division,
                    'status' => 200
                ], 200);
            }
        } else {
            return response()->json([
                'message' => 'El equipo no tiene una división asignada',
                'data' => null,
                'status' => 200
            ], 200);
        }
    }

    public function show(int $divisionID)
    {
        $division = division::find($divisionID);
    
        if (!$division) {
            return response()->json([
                'msg' => 'Division no encontrada',
                'data' => null,
                'status' => 404
            ], 404);
        }
    
        return response()->json([
            'msg' => 'Division obtenida correctamente',
            'data' => $division,
            'status' => 200
        ], 200);
    }
}
