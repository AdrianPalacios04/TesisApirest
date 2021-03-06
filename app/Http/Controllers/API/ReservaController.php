<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReservaRequest;
use Illuminate\Http\Request;
use App\Http\Resources\ReservaResource;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserva;
use App\Models\Servicio;
use Validator;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {


       // $notes = Reserva::where('servicio_id', $servicioId);
        $reserva = Reserva::find($id);

        return ReservaResource::make($reserva);
       // return ReservaResource::collection(Reserva::all());
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
        $request->merge(['user_id' => Auth::id()]);

        /** @var Reserva $reserva */
        $reserva = Reserva::create($request->all());

        $servicioId = $request->get('servicio_id');
        $reserva->services()->sync($servicioId);
        $reserva->load('services');

        return $reserva;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $servicioId = $request->get('servicio_id'); // request

        $reserva = Reserva::with('servicio') // te ayuda a mostrar los datos de una tabla relacionada
            ->where('id', $id)
            ->where('servicio_id', $servicioId)
            ->first();

        return response()->json([
            'data'=>$reserva
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
