<?php

namespace App\Http\Controllers;

use App\Models\equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\returnSelf;

class EquipoController extends Controller
{
    protected $reglas = [
        'nombre' => 'required|string|max:255',
        'dir_deportivo' => 'required|string|max:255',
        'estadio_id' => 'required|numeric'
    ];
    public function index()
    {

        $equipos = equipo::all();

        return response()->json([
            'msg' => 'Equipos obtenidos correctamente',
            'data' => $equipos,
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

        $equipoExist = Equipo::where('nombre', $request->nombre)->first();

        if ($equipoExist)
            return response()->json([
                'msg' => 'Equipo ya existente',
                'data' => $equipoExist,
                'status' => 422
            ], 422);


        $equipo = equipo::create($validator->validated());

        if (!$equipo->save())
            return response()->json([
                'msg' => 'Error al crear el equipo',
                'data' => null,
                'status' => 422
            ], 422);

        return response()->json([
            'msg' => 'Equipo creada correctamente',
            'data' => $equipo,
            'status' => 201
        ], 201);
    }

    public function update(Request $request, int $equipoID)
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

        $equipo = equipo::find($equipoID);
        if (!$equipo)
            return response()->json([
                'msg' => 'Equipo NO encontrado',
                'data' => null,
                'status' => 404
            ], 404);

        $equipoExist = Equipo::where('nombre', $request->nombre)->first();

        if ($equipoExist && $equipoExist->id != $equipoID)
            return response()->json([
                'msg' => 'Nombre en uso',
                'data' => $equipoExist,
                'status' => 422
            ], 422);

        
        $equipo->update($request->all());

        return response()->json([
            'msg' => 'Equipo actualizado correctamente',
            'data' => $equipo,
            'status' => 201
        ], 201);
    }

    public function destroy(int $equipoID)
    {
        $equipo = equipo::find($equipoID);
        if (!$equipo)
            return response()->json([
                'msg' => 'No se encontro el equipo',
                'data' => $equipoID,
                'status' => 404
            ], 404);

        $equipo->delete();

        return response()->json([
            'msg' => 'Equipo eliminado correctamente',
            'data' => $equipo,
            'status' => 201
        ], 201);
    }
}
