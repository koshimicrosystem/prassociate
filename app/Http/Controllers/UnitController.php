<?php

namespace App\Http\Controllers;

use App\Unit;
use App\Unitmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_models($id){

        return Unit::where([['unitmodel_id','=',$id],['sold','=',0]])
        ->with(['unitmodel' => function ($query) {
        }])->get();
    }
    public function index()
    {
        // $bills = Customer::find($id)->bills()->orderby('created_at','desc')
        // ->with(['payments' => function ($query) {
        // }])

        $units = Unit::with(['purchages' => function ($query) {
        }])->get();
        //return dd($units);
        return view('unit/index',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unit/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unit = new Unit();
        $unit->grn_number = $request->grn_number;
        $unit->model_name = Unitmodel::find($request->model_id)->model_name;
        $unit->invoice_number = $request->invoice_number;
        $unit->ndp = $request->ndp;
        $unit->received_at = $request->received_date;
        $unit->unitmodel_id = $request->model_id;
        $unit->steering_type = $request->steering_type;
        $unit->clutch_type = $request->clutch_type;
        $unit->pto_type = $request->pto_type;
        $unit->material_code = $request->material_code;
        $unit->tr_sr_number = $request->tr_sr_number;
        $unit->engine_number = $request->engine_number;
        $unit->chassis_number = $request->chassis_number;
        $unit->order_number = $request->order_number;
        $unit->invoice_amount = $request->invoice_amount;
        $unit->gst_applicable = $request->gst;
        $unit->save();

        return $unit->id;
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(unit $unit)
    {
        //
    }
}
