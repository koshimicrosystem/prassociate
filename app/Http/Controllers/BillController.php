<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Customer;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_models($id){

        $bills = Customer::find($id)->bills()->orderby('created_at','desc')
        ->with(['payments' => function ($query) {
        }])
        ->with(['schedules' => function ($query) {
        }])
        ->with(['purchages' => function ($query) {
            $query->with(['purchageable' => function ($query) {
                // $query->where('purchagable_type', 'like', '%unit%')
               
                // $query->with(['unitmodel' => function ($query) {
                
            }]);
        }])
        ->with(['finance' => function ($query) {
        }])->get();
        // ->with(['payments' => function ($query) {
        // }])->get();

        return $bills;
        // $bills=Unit::where([['unitmodel_id','=',$id],['sold','=',0]])
        // ->with(['unitmodel' => function ($query) {
        // }])->get();


        // return compact('bills','');
    }
    public function index()
    {
        $bills = Bill::all();
        return view('bill.index',compact('bills'));
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
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
