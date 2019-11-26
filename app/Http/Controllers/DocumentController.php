<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Exception;

class DocumentController extends Controller
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

    public function user_store(Request $request, $id)
    {
        $customer = Customer::find($id);
        $exploded = explode(',', $request->file_);
        $extension_ = explode(';', $exploded[0]);
        $extension = explode('/', $extension_[0]);
        $exploded = explode(',', $request->file_);
        $decoded = base64_decode($exploded[1]);
        $file_name = $id . time() . '.' . $extension[1];
        $path = '/storage/media1/' . $file_name;

        $document = new Document();
        $document->name = $request->name;
        $document->number = $request->number;
        $document->url = $path;
        $customer->documents()->save($document);
        Storage::put('public/media1/' . $file_name, $decoded);
    }

    public function get_documents($id)
    {
        // $document=new Document();
        // $document=Document::where('customer_id',$id)->orderby('created_at','desc')->get();
        $document = Customer::find($id)->documents;
        return $document;
    }

    public function delete_document(Request $request)
    {
        $document =  Document::find($request->id);
        // Storage::put('public/media1/'.$file_name, $decoded);
        $filename = explode('/', $document->url);
        if (!Storage::exists('public/media1/' . $filename[3])) {
            Storage::delete('public/media1/' . $filename[3]);
        }
        $document->delete();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
