<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servicio;
use Validator;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Servicio::all();
        return response()->json([
            "success" => true,
            "message" => "Servicio List",
            "data" => $service
        ]);
        return $service;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name_service' => 'required',
            'price' => 'required',
            'grupo_id' => 'required'
        ]);
        $service = Servicio::create($input);
        return response()->json([
            "success" => true,
            "message" => "Servicio creado exitosamente",
            "data" => $service
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Servicio::find($id);
        if (is_null($service)) {
            return $this->sendError('Salon extraviado');
        }
        return response()->json([
            "success" => true,
            "message" => "Salon mostrado exitosamente",
            "data" => $service
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        $input = $request->all();
        $validator = Validator::make($input,[
            'name_service'=> 'required',
            'price' =>'required',
            'grupo_id'=>'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error',$validator->errors());
        }
        $service->name_service = $input['name_service'];
        $service->price = $input['price'];
        $service->grupo_id = $input['grupo_id'];
        $service->save();
        return response()->json([
            "success" => true,
            "message" => "Servicio Editado",
            "data" => $service
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Servicio::find($id);
        $service->delete();
        return response()->json([
            "success" =>true,
            "message" => "Servicio eliminado"
        ]);
    }
}
