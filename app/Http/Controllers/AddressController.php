<?php

namespace App\Http\Controllers;

use App\Address;
use App\Customer;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }


    public function get_addresses($id){
        $addresses=Address::where('customer_id',$id)->orderby('created_at','desc')->get();
        return $addresses;
    }


    public function user_store(Request $request, $id)
    {
        // return dd($request);
        $customer = Customer::find($id);
        $address = new Address();
        $address->village = $request->village;
        $address->block = $request->block;
        $address->tehshil = $request->tehshil;
        $customer->addresses()->save($address);
        return $address;
    }

    public function delete_address(Request $request){
        Address::find($request->id)->delete();
    }
}
