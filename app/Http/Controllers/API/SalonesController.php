<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salones;
use Validator;




class SalonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salon = Salones::all();
        return response()->json([
            "success"=>true,
            "message"=>"Salon List",
            "data"=>$salon
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'name_salon'=> 'required',
            'ubicacion' =>'required'
        ]);
        $salon = Salones::create($input);
        return response()->json([
            "success"=>true,
            "message"=>"Salones creado exitosamente",
            "data"=>$salon
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salon = Salones::find($id);
        if (is_null($salon)) {
            return $this->sendError('Salon extraviado');
        }
        return response()->json([
            "success" => true,
            "message" => "Salon mostrado exitosamente",
            "data" => $salon
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
        $salon = Salones::find($id);
        $input = $request->all();
        $validator = Validator::make($input,[
            'name_salon'=> 'required',
            'ubicacion' =>'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error',$validator->errors());
        }
        $salon->name_salon = $input['name_salon'];
        $salon->ubicacion = $input['ubicacion'];
        $salon->save();
        return response()->json([
            "success" => true,
            "message" => "Salon Editado",
            "data" => $salon
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
        $salon = Salones::find($id);
        $salon->delete();
        return response()->json([
            "success" =>true,
            "message" => "Salon eliminado"
        ]);
    }
}
