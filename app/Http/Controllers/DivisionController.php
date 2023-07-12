<?php

namespace App\Http\Controllers;

use App\Models\division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DivisionController extends Controller
{

    protected $reglas = [
        'nivel' => 'required|numeric|max:8',
        'liga' => 'required|string|max:255',
    ];

    public function index(){
        $divisiones = division::all();

        return response()->json([
            'msg' => 'Divisiones obtenidas correctamente',
            'data' => $divisiones,
            'status' => 200
        ], 200);
    }

    public function store(Request $request){

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

    public function update(Request $request, int $divisionID){

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

    public function destroy(int $divisionID){
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
}
