<?php

namespace App\Http\Controllers;

use App\Unitmodel;
use Illuminate\Http\Request;

class UnitmodelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_models(){
        return Unitmodel::all();
    }

    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\unitmodel  $unitmodel
     * @return \Illuminate\Http\Response
     */
    public function show(unitmodel $unitmodel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\unitmodel  $unitmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(unitmodel $unitmodel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\unitmodel  $unitmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, unitmodel $unitmodel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\unitmodel  $unitmodel
     * @return \Illuminate\Http\Response
     */
    public function destroy(unitmodel $unitmodel)
    {
        //
    }
}
