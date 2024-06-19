<?php

namespace App\Http\Controllers;

use App\Models\Pakar;
use App\Models\Indication;
use App\Models\IndicationList;
use App\Models\KnowledgeData;
use Illuminate\Http\Request;

class PakarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard_pakar_view()
    {
        $jumlah_gejala = Indication::count();
        $sum_knowledge_data = KnowledgeData::count();

        return view('pages.pakar.dashboard', compact('jumlah_gejala', 'sum_knowledge_data'));
    }

    public function input_pengetahuan_pakar_view()
    {
        $indications = Indication::all();
        return view('pages.pakar.pengetahuan', compact('indications'));
    }

    public function input_gejala_pakar_view()
    {
        return view('pages.pakar.gejala');
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
    public function store_gejala(Request $request)
    {
        $validatedData = $request->validate([
            'indication_code' => 'required|unique:indications,indication_code|max:255',
            'indication_name' => 'required|unique:indications,indication_name|max:255',
            'md_score' => 'required',
        ]);
    
        Indication::create($validatedData);
    
        return redirect()->route('dashboard_pakar_view')->with('success', 'Gejala berhasil disimpan.');
    }

    public function store_pengetahuan(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'weight' => 'required|integer',
            'address' => 'required|string|max:255',
            'disease' => 'required|string|max:255',
            'solution' => 'required|string|max:255',
            'indication_code' => 'required|array',
        ]);

        $validatedData['name'] = 'Dummy';
        $validatedData['address'] = 'Dummy Address';

        $knowledgeData = KnowledgeData::create([
            'user_id' => '174',
            'name' => $validatedData['name'],
            'age' => $validatedData['age'],
            'gender' => $validatedData['gender'],
            'weight' => $validatedData['weight'],
            'address' => $validatedData['address'],
            'disease' => $validatedData['disease'],
            'solution' => $validatedData['solution'],
            'md' => 0,
        ]);

        $mdTotal = 0;

        foreach ($validatedData['indication_code'] as $indicationCode) {
            $indication = IndicationList::create([
                'knowledge_id' => $knowledgeData->id,
                'indication_code' => $indicationCode,
            ]);
    
            $mdScore = Indication::where('indication_code', $indicationCode)->value('md_score');
            $mdTotal += $mdScore;
        }
    
        $knowledgeData->update(['md' => $mdTotal]);
    
        return redirect()->route('dashboard_pakar_view')->with('success', 'Gejala berhasil disimpan.');
    }
}
