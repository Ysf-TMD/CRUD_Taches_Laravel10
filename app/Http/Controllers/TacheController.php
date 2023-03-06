<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexView()
    {
        return view("taches.index");
    }
    public function index()
    {
        // retourner la page taches.index ... (page principale )
        $taches = Tache::all();
        return view("taches.index",compact('taches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //pour afficher le formulaire
        return View("taches.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //pour enregistrer les taches
        $this->validate(
            $request,
            [
                'expiration' => 'required',
                'categorie' => 'required',
                'description' => 'required',
                'accomplie' => 'nullable',
            ]
        );
        $input = $request->only(["expiration","categorie","description","accomplie"]);
        DB::table('taches')->insert([
            "expiration"=>$input["expiration"],
            "categorie"=>$input["categorie"],
            "description"=>$input["description"],
            "accomplie"=>$input["accomplie"]
//            "accomplie"=>(isset($input['accomplie'])?"O":"N"),
        ]);
        return redirect('/taches');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //afficher les details pour effectuer la suppression selon l'aletier mais c'est pas toujours le cas
        $tache = Tache::findOrFail($id);
        return view("taches.show",compact('tache'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //pour afficher formulaire d'edition
        $tach = Tache::find($id);
        return view("taches.edit",compact("tach"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //pour realiser la modification
        $tache = DB::table("taches")
            ->where("id",$id)
            ->first();
        $acc = $request
            ->get("accomplie")===null?$tache->accomplie:$request->get('accomplie');
        $input = $request->only(["expiration","categorie","description"]);
        DB::table("taches")
            ->where("id",$id)
            ->update([
                "expiration"=>$input["expiration"],
                "categorie"=>$input["categorie"],
                "description"=>$input["description"],
                "accomplie"=>$acc,
            ]
            );
        return redirect("/taches")->with("message","tache modifier en success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request , string $id)
    {
        //pour la suppréssion
        DB::table("taches")->where("id",$id)->delete();
        return redirect("/taches");

    }
}
