<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evenements = Evenement::all();
        return view('evenement.list', compact('evenements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Evenement $evenement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evenement $evenement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evenement $evenement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evenement $evenement)
    {
        //
    }


    // Fonction pour filtrer les événements par type
    public function parType(Request $request)
    {
        
        $types = Evenement::distinct()->pluck('type')->toArray();
        
        // Si un type est sélectionné, filtrer les événements
        if ($request->has('type') ) {  //or $request->filled('type')
            $evenements = Evenement::where('type', $request->type)->get();
        } else {
            $evenements = collect(); // Collection vide si aucun type n'est sélectionné
        }
        
        return view('evenement.parType', compact('types', 'evenements'));
    }

    
    public function parPrestataire()
    {
        $prestataires = \App\Models\Prestataire::all();
        return view('evenement.parPrestataire', compact('prestataires'));
    }

    
    public function eventparprestataire($prestataireId)
    {
        $evenements = Evenement::where('prestataire_id', $prestataireId)->get();
        return response()->json($evenements);
    }
        
        
        public function tacheparev()
        {
            // Récupérer tous les événements pour le dropdown
            $evenements = Evenement::all();
            
            // Récupérer toutes les tâches groupées par événement
            $tachesParEvenement = Tache::with('evenement')
                ->get()
                ->groupBy('evenement_id');
                
            return view('evenement.tacheparenv', compact('evenements', 'tachesParEvenement'));
        }
    }



