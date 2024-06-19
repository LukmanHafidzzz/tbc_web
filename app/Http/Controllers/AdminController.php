<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Indication;
use App\Models\KnowledgeData;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard_admin_view()
    {
        $jumlah_gejala = Indication::count();
        $sum_knowledge_data = KnowledgeData::count();

        return view('pages.admin.dashboard', compact('jumlah_gejala', 'sum_knowledge_data'));
    }

    public function pengetahuan_admin_view()
    {
        $knowledgeData = KnowledgeData::with('indications.indication')->get();
        return view('pages.admin.pengetahuan', compact('knowledgeData'));
    }

    public function kasus_admin_view()
    {
        $knowledgeData = KnowledgeData::with('indications.indication')->get();
        return view('pages.admin.kasus', compact('knowledgeData'));
    }

    public function update_kasus_admin_view($id)
    {
        $knowledgeData = KnowledgeData::with('indications')->findOrFail($id);
        $indications = Indication::all();
        return view('pages.admin.update_kasus', compact('knowledgeData', 'indications'));
    }

    public function update_kasus_admin(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'indication_code' => 'required|array',
            'indication_code.*' => 'exists:indications,indication_code',
        ]);
    
        $knowledgeData = KnowledgeData::findOrFail($id);
        $knowledgeData->name = $request->name;
        $knowledgeData->age = $request->age;
        $knowledgeData->save();
    
        $knowledgeData->indications()->delete();

        foreach ($request->indication_code as $code) {
            $knowledgeData->indications()->create([
                'indication_code' => $code
            ]);
        }
    
        return redirect()->route('kasus_admin_view')->with('success', 'Kasus berhasil diupdate.');
    }

    public function delete_kasus_admin($id)
    {
        $knowledgeData = KnowledgeData::findOrFail($id);
        $knowledgeData->delete();
    
        return redirect()->route('kasus_admin_view')->with('success', 'Kasus berhasil dihapus.');
    }

    public function update_pengetahuan_admin_view($id)
    {
        $knowledgeData = KnowledgeData::with('indications')->findOrFail($id);
        $indications = Indication::all();
        return view('pages.admin.update_pengetahuan', compact('knowledgeData', 'indications'));  
    }

    public function update_pengetahuan_admin(Request $request, $id)
    {
        $request->validate([
            'disease' => 'required|string|max:255',
            'md' => 'required|numeric',
            'solution' => 'required|string|max:255',
            'indication_code' => 'required|array',
            'indication_code.*' => 'exists:indications,indication_code',
        ]);
    
        $knowledgeData = KnowledgeData::findOrFail($id);
        $knowledgeData->disease = $request->disease;
        $knowledgeData->md = $request->md;
        $knowledgeData->solution = $request->solution;
        $knowledgeData->save();
    
        $knowledgeData->indications()->delete();

        foreach ($request->indication_code as $code) {
            $knowledgeData->indications()->create([
                'indication_code' => $code
            ]);
        }
    
        return redirect()->route('pengetahuan_admin_view')->with('success', 'Data berhasil diupdate.');
    }

    public function delete_pengetahuan_admin($id)
    {
        $knowledgeData = KnowledgeData::findOrFail($id);
        $knowledgeData->delete();
    
        return redirect()->route('pengetahuan_admin_view')->with('success', 'Data berhasil dihapus.');
    }

}
