<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Customer;
use Illuminate\Http\Request;

class ContactController extends Controller
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

    public function get_contacts($id){
        $contacts=new Contact();
        $contact=Contact::where('customer_id',$id)->orderby('created_at','desc')->get();
        return $contact;
    }


    public function user_store(Request $request, $id)
    {
        // return dd($request);
        $customer = Customer::find($id);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->number_email = $request->number_email;
        $contact->type = $request->type;
        $customer->contacts()->save($contact);
        return $contact;
    }

    public function delete_contact(Request $request){
        $delete = Contact::find($request->id)->delete();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }

   
}
