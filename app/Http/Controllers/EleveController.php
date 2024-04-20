<?php

namespace App\Http\Controllers;

use App\Models\{Eleve, Classe};
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\EleveRequest;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($slug = null) : View
    {
        $query = $slug ? Classe::whereSlug($slug)->firstOrFail()->eleves() : Eleve::query();
        $eleves = $query->paginate(5);
        $classes = Classe::all();
        return view("index", compact("eleves" , "classes" , "slug"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classe::all();
        return view("create", compact("classes"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EleveRequest $eleveRequest) : RedirectResponse
    {
        $eleve = new Eleve;
        $eleve->nom = $eleveRequest->input('nom');
        $eleve->prenom = $eleveRequest->input('prenom');
        $eleve->dateNaiss = $eleveRequest->input('dateNaiss');
        $eleve->email = $eleveRequest->input('email');
        $eleve->classe_id = $eleveRequest->input('classe_id');
        dd($eleve);
        if($eleveRequest->hasFile('image')){
            $eleveRequest->file("image")->getPathname();
            $imageName=time().'.'.$eleveRequest->image->extension();
            $eleveRequest->image->move(public_path('photos'), $imageName);
            $eleve->image=$imageName;
        }
        $eleve->save();
        return redirect()->route('eleve.index')->with('info','L\'élève a bien été créé');
    }

    /**
     * Display the specified resource.  
     */
    public function show(Eleve $eleve):View
    {
        return view("show", compact('eleve'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Eleve $eleve) : View
    {
        $classes = Classe::all();
        return view('edit', compact('eleve', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EleveRequest $eleveRequest, Eleve $eleve) : RedirectResponse
    {
        $eleveRequest->file('image')->getPathname();
        $imageName=time().'.'.$eleveRequest->image->extension();
        $eleveRequest->image->move(public_path('photos'), $imageName);

        $eleve->nom = $eleveRequest->input('nom');
        $eleve->prenom = $eleveRequest->input('prenom');
        $eleve->dateNaiss = $eleveRequest->input('dateNaiss');
        $eleve->email = $eleveRequest->input('email');
        $eleve->classe_id = $eleveRequest->input('classe_id');
        $eleve->image = $imageName;
        $eleve->save();
        return redirect()->route("eleve.index")->with("info","L'élève a bien été modifié");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eleve $eleve):RedirectResponse
    {
        $eleve->delete();
        return back()->with('info', "l'élève a été supprimer !");
    }

    /**
     * Remove the specified resource from storage.
     */

    public function creerPDF(){
        $eleves =DB::table("eleves")
                       ->join("classes","classe_id","=","classes.id")    
                         ->select("eleves.*", "classes.slug")
                         ->orderBy('nom')
                         ->get() ; 
        
                    $data = [
                        'titre' => 'Liste des élèves',
                        'date' => date("d/m/y") ,
                        'eleves'=>$eleves 
                      ];
                  
                $pdf = PDF::loadView('pdf', $data);
                return $pdf->download('eleve_pdf.pdf');
    }
        
}