<?php

namespace App\Http\Controllers;

use App\Models\{Prof,Classe};
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProfRequest;


class ProfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Prof $prof)
    {
        Prof::orderby('nom');
        $prof->with("classes")->get();
        $profs=Prof::oldest('nom')->paginate(5);
        return view('professeur',compact('profs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classe::all();
        return view('createProf',compact("classes"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfRequest $profRequest) : RedirectResponse
    {
        $prof = Prof::create($profRequest->all());
        $heures = $profRequest->nbHeures;
        $classes = $profRequest->classe_id;
        $taille = count($heures);
        dd($prof);
        
        $tab_heures = [];
        //dd($classes);
       // dd($heures);
        for($i = 0; $i < $taille ; $i++){
            $tab_heures[$classes[$i]] = ['nbHeures' => $heures[$i]];
        }
        $prof->classes()->attach($tab_heures);
        return redirect()->route('profs.index')->with('info','Le prof a bien été ajouté');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prof $prof) : RedirectResponse
    {
        $prof->delete();
        return back()->with('info', "le professeur a été supprimer !");
    }
}