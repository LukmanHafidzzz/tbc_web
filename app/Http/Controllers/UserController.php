<?php

namespace App\Http\Controllers;

use App\Models\auth;
use Illuminate\Http\Request;
use App\Models\Indication;
use App\Models\IndicationList;
use App\Models\KnowledgeData;

class UserController extends Controller
{
    public function dashboard_user_view()
    {
        return view('pages.user.dashboard');
    }

    public function pendaftaran_user_view()
    {

        $indications = Indication::all();
        $userId = auth()->id();
        
        return view('pages.user.pendaftaran', compact('indications', 'userId'));
    }

    public function hasil_user_view()
    {
        $userId = auth()->id();
        $knowledgeData = KnowledgeData::where('user_id', $userId)->with('indications.indication')->get();

        return view('pages.user.hasil', compact('knowledgeData'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'weight' => 'required|integer',
            'address' => 'required|string|max:255',
            'indication_code' => 'required|array',
        ]);

        $solution = $validatedData['age'] < 15 ? 'Kategori anak' : 'Kategori 1';

        $knowledgeData = KnowledgeData::create([
            'user_id' => auth()->id(),
            'name' => $validatedData['name'],
            'age' => $validatedData['age'],
            'gender' => $validatedData['gender'],
            'weight' => $validatedData['weight'],
            'address' => $validatedData['address'],
            'solution' => $solution,
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
    
        return redirect()->route('hasil_user_view');
    }

}
