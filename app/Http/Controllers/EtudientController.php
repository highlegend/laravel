<?php

namespace App\Http\Controllers;

use App\Models\Etudient;
use App\Models\Ville;
use Illuminate\Http\Request;

class EtudientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudient::all();
        return view('index', ['etudiants' => $etudiants]);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();

        return view('create', ['villes' => $villes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Etudient::create([
            'nom' => $request->input('nom'),
            'adresse' =>$request->input('adresse'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'datenaissance' => $request->input('datenaissance'),
            'ville_id' => $request->input('ville_id') 
        ]);


       //  $etudiants = $date = Etudient::select()->orderBy('created_at', 'DESC')->get();
        //return view('index', ['etudiants' => $etudiants]);
        return redirect(route('etudients.index'))->with('success','Etudiant à été ajouté avec succès...!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etudiant = Etudient::find($id);
        return view ('show', ['etudiant' => $etudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $villes = Ville::all();
        $etudiant = Etudient::find($id);
        return view('edit', ['etudiant' => $etudiant,'villes' => $villes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $etud = new  Etudient();


        $etudiant = $etud->find($id);
    
$etudiant->nom = $request->input('nom');
$etudiant->adresse = $request->input('adresse'); 
$etudiant->email = $request->input('email'); 
$etudiant->phone = $request->input('phone'); 
$etudiant->datenaissance = $request->input('datenaissance'); 
$etudiant->ville_id = $request->input('ville_id'); 

$etudiant->save();




return redirect(route('etudients.index'))->with('info','Etudiant à été modifié avec succès...!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $etudiant = Etudient::destroy($id);
      

        return redirect(route('etudients.index'))->with('error','Etudiant à été supprimé avec succès...!');
    }
}
