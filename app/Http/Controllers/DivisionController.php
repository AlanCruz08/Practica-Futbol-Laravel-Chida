<?php

namespace App\Http\Controllers;

use App\Models\division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DivisionController extends Controller
{

    protected $reglas = [
        'nivel' => 'required|string|max:255',
        'liga' => 'required|string|max:255',
    ];

    public function index()
    {
        $divisiones = division::all();
        if (!$divisiones) {
            return response()->json([
                'msg' => 'Divisiones vacias',
                'data' => $divisiones,
                'status' => 204
            ], 204);
        }

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

    public function update(Request $request, division $divisionID)
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

        //Si la validacion no falla, se actualiza el objeto
        $division->nivel = $request->nivel;
        $division->liga = $request->liga;

        $division->save();

        //Si la validacion no falla, se actualiza el objeto

        if ($division->save())
            return response()->json([
                'msg' => 'Division actualizada correctamente',
                'data' => $division,
                'status' => 201
            ], 201);

        //Si la persona no se actualizo correctamente, se retorna un error
        else
            return response()->json([
                'msg' => 'Error al actualizar la division',
                'data' => null,
                'status' => 422
            ], 422);
    }

    public function destroy(division $division)
    {
        //
    }
}
