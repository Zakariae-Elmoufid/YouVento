<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club; 

class ClubController extends Controller
{

    public function index()
    {
        $clubs = Club::with('category')->get(); 
        return view('admin.club.index', compact('clubs'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        } else {
            $logoPath = null;
        }

        Club::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category,
            'logo' => $logoPath,
        ]);
        
        return redirect()->back()->with('success', 'Club ajouté avec succès !');

    }

    public function edit($id)
    {
        $club = Club::findOrFail($id);
        return view('admin.club.edit', compact('club'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|integer',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $club = Club::findOrFail($id);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        } else {
            $logoPath = $club->logo;
        }

        $club->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category,
            'logo' => $logoPath,
        ]);

        return  redirect()->back()->with('success', 'Club mis à jour avec succès !');
    }

    public function destroy($id)
    {
        $club = Club::findOrFail($id);
        $club->delete();
        return redirect()->back()->with('success', 'Club mis à jour avec succès !');
    }

   
}
