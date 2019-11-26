<?php

namespace App\Http\Controllers;

use App\Access;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_models(){
        return Access::all();
    }

    public function index()
    {
        $accesses = Access::all();
        return view('access/index',compact('accesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('access.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $access = new Access();
        $access->type =$request->type;
        $access->varient =$request->varient;
        $access->received_at =$request->received;
        $access->supplier_name =$request->supplier_name;
        $access->invoice_number =$request->invoice_number;
        $access->quantity =$request->quantity;
        $access->price =$request->price;
        $access->invoice_amount =$request->invoive_amount;
        $access->gst_applicable =$request->gst;
        $access->save();
        return $access->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function show(Access $access)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function edit(Access $access)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Access $access)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function destroy(Access $access)
    {
        //
    }
}
