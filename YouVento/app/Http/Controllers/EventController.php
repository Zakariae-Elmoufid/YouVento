<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Club;
use Illuminate\Support\Facades\Validator;
class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('club')->get();
        return view('admin.events.index', compact('events'));
    }
    public function create()
    {
        $clubs = Club::all();
        return view('admin.events.create', compact('clubs'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'location' => 'required|string',
            'max_capacity' => 'nullable|integer|min:0',
            'club_id' => 'required|exists:clubs,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $event = Event::create($validator->validated());

        return redirect()->route('events.index')->with('success', 'Événement créé avec succès');
    }

      // Modifier un événement
      public function edit(Event $event)
      {
          $clubs = Club::all();
          return view('admin.events.edit', compact('event', 'clubs'));
      }
  
      // Mettre à jour un événement
      public function update(Request $request, Event $event)
      {
          $validator = Validator::make($request->all(), [
              'title' => 'required|max:255',
              'description' => 'nullable|string',
              'start_date' => 'required|date',
              'end_date' => 'required|date|after:start_date',
              'location' => 'required|string',
              'max_capacity' => 'nullable|integer|min:0',
              'club_id' => 'required|exists:clubs,id'
          ]);
  
          if ($validator->fails()) {
              return redirect()->back()
                  ->withErrors($validator)
                  ->withInput();
          }
  
          $event->update($validator->validated());
  
          return redirect()->route('admin.events.index')->with('success', 'Événement mis à jour avec succès');
      }

      public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Événement supprimé avec succès');
    }
    
     // Récupérer les événements pour FullCalendar
     public function getEvents()
     {
         $events = Event::all()->map(function($event) {
             return $event->toFullCalendarEvent();
         });
 
         return response()->json($events);
     }
  

}
