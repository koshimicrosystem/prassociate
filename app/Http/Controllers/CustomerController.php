<?php

namespace App\Http\Controllers;

use App\Access;
use App\Customer;
use App\Address;
use App\Bill;
use App\Card;
use App\Contact;
use App\Finance;
use App\Impl;
use App\Payment;
use App\Purchage;
use App\Schedule;
use App\Unit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\Flysystem\Exception as LeagueException;
use TheSeer\Tokenizer\Exception as TheSeerException;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        //return dd($request->fv);
        $bill = new Bill();
        $bill->total_amount = $request->total_amount;
        $bill->customer_id = $request->customer['id'];
        $bill->save();

        try {
            
                $finance = new Finance();
                $finance->companey = $request->payment['companey'];
                $finance->amount = $request->payment['amount'];
                $bill->finance()->save($finance);
            
        } catch (Exception $e) { }

        foreach ($request->units as $item) {
            $purchage = new Purchage();
            $purchage->user_id = Auth()->User()->id;
            $purchage->purchageable_id = $item['id'];
            $purchage->purchageable_type = 'App\Unit';
            if ($bill->purchages()->save($purchage)) {
                $unit_update = Unit::find($item['id']);
                $unit_update->sold = 1;
                $unit_update->bill_id = $bill->id;
                $unit_update->save();
            }
        }

        foreach ($request->impls as $item) {
            $purchage = new Purchage();
            $purchage->user_id = Auth()->User()->id;
            $purchage->purchageable_id = $item['id'];
            $purchage->purchageable_type = 'App\Impl';
            if ($bill->purchages()->save($purchage)) {
                $imp = Impl::find($item['id']);
                $imp->quantity = $imp->quantity - 1;
                $imp->save();
            }
        }

        foreach ($request->accesses as $item) {
            $purchage = new Purchage();
            $purchage->user_id = Auth()->User()->id;
            $purchage->purchageable_id = $item['id'];
            $purchage->purchageable_type = 'App\Access';
            if ($bill->purchages()->save($purchage)) {
                $imp = Access::find($item['id']);
                $imp->quantity = $imp->quantity - 1;
                $imp->save();
            }
        }

        $payment = new Payment();
        $payment->mode = $request->payment['through'];
        $payment->amount = $request->payment['through_amount'];

        $bill->payments()->save($payment);

        try {
            

                foreach ($request->installments as $item) {
                    $installment = new Schedule();
                    $installment->date = $item['date'];
                    $installment->amount = $item['amount'];
                    $bill->schedules()->save($installment);
              
            }
        } catch (Exception $e) { }

        // $bills = Customer::find($request->customer['id'])->bills;
        // $payments = Customer::find($request->customer['id'])->payments();

        

        return redirect()->route('bill.get_models', ['id' => $request->customer['id']]);

        // return dd($request->installments);

    }
    public function index()
    {
        $customers = Customer::orderBy('created_at', 'desc')->get();
        return view('customer/index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        return view('customer/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer();

        $customer->name = $request->name;
        $customer->care_of = $request->care_of;
        $customer->save();

        $customer->contacts()->saveMany([
            new Contact(['number_email' => $request->number, 'type' => 'number', 'name' => 'Self', 'default' => 1]),
        ]);

        $customer->documents()->saveMany([
            new Document(['name' => "Adhar", 'number' => $request->adhar_number]),
        ]);

        $customer->addresses()->saveMany([
            new Address(['village' => $request->village, 'default' => 1, 'block' => $request->block, 'tehshil' => $request->tehshil]),
        ]);
        return $customer;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customer/show', compact('customer'));
    }

    public function show_(Request $request)
    {
        $customer = Customer::with(['cards' => function ($query) { }])->with(['addresses' => function ($query) { }])->with(['documents' => function ($query) { }])->with(['contacts' => function ($query) { }])->find($request->id);
        return $customer;


        // $customer = Customer::find($request->id);
        // $customer->load('cards', 'addresses','contacts');
        // return $customer;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
