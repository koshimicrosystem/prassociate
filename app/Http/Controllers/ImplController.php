<?php

namespace App\Http\Controllers;

use App\Impl;
use Illuminate\Http\Request;

class ImplController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_models(){
        return Impl::all();
    }

    public function index()
    {
        $impls = Impl::all();
        return view('impl/index',compact('impls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('impl.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $impl = new Impl();
        $impl->type =$request->type;
        $impl->varient =$request->varient;
        $impl->received_at =$request->received;
        $impl->supplier_name =$request->supplier_name;
        $impl->invoice_number =$request->invoice_number;
        $impl->quantity =$request->quantity;
        $impl->price =$request->price;
        $impl->invoice_amount =$request->invoive_amount;
        $impl->gst_applicable =$request->gst;
        $impl->save();
        return $impl->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Impl  $impl
     * @return \Illuminate\Http\Response
     */
    public function show(Impl $impl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Impl  $impl
     * @return \Illuminate\Http\Response
     */
    public function edit(Impl $impl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Impl  $impl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Impl $impl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Impl  $impl
     * @return \Illuminate\Http\Response
     */
    public function destroy(Impl $impl)
    {
        //
    }
}
