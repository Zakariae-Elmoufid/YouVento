<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club; 

class ClubController extends Controller
{
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
}
