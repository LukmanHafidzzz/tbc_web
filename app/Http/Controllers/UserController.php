<?php

namespace App\Http\Controllers;

use App\Models\auth;
use Illuminate\Http\Request;
use App\Models\Indication;
use App\Models\IndicationList;
use App\Models\KnowledgeData;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

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
    
        $client = new Client();
        $response = $client->post('http://localhost:90/predict', [
            'json' => [
                'indications' => $validatedData['indication_code']
            ]
        ]);
    
        $prediction = json_decode($response->getBody()->getContents(), true);
        Log::info('Prediction Data: ', $prediction);
    
        $knowledgeData = KnowledgeData::create([
            'user_id' => auth()->id(),
            'name' => $validatedData['name'],
            'age' => $validatedData['age'],
            'gender' => $validatedData['gender'],
            'weight' => $validatedData['weight'],
            'address' => $validatedData['address'],
            'solution' => $prediction['solution'],
            'md' => $prediction['md_score'],
            'disease' => $prediction['disease'],
        ]);
    
        foreach ($validatedData['indication_code'] as $indicationCode) {
            IndicationList::create([
                'knowledge_id' => $knowledgeData->id,
                'indication_code' => $indicationCode,
            ]);
        }
    
        return redirect()->route('hasil_user_view');
    }
}