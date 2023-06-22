<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all();
        return view('document.index', ['documents' => $documents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('document.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $destinationPath = 'uploads';
        $doc = new Document();

        Validator::validate($request->all(), [
            'title_fr' => 'required|string',
            'title_en' => 'required|string',
          /* 'file' => [
                'required',
                File::type('pdf')
            ]*/
        ]);



        $document = $request->file('document');
        $doc->title_fr=  $request->title_fr;
        $doc->title_en= $request->title_en;
        $doc->original_name=  $document->getClientOriginalName();
        $doc->format=  $document->getClientOriginalExtension();
        $doc->size= $document->getSize();
        $doc->path= $destinationPath."/".$document->getClientOriginalName();
        $doc->user_id = Auth::user()->id;





        $doc->save();

        $document->move($destinationPath,$document->getClientOriginalName());

        return redirect(route('documents.index'))->with('success', 'Document à été ajouté avec succès...!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
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
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }

    function downloadFile($file_name){
        $file = Storage::disk('public/uploads')->get($file_name);

        return (new Response($file, 200))
            ->header('Content-Type', 'image/jpeg')
            ->header('Content-Type', 'pdf')
            ->header('Content-Type', 'zip');
    }
}
