<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'description', 
        'start_date', 
        'end_date', 
        'location', 
        'max_capacity', 
        'current_participants', 
        'club_id'
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function isFull()
    {
        return $this->max_capacity !== null && 
               $this->current_participants >= $this->max_capacity;
    }

    public function addParticipant()
    {
        if (!$this->isFull()) {
            $this->current_participants++;
            $this->save();
            return true;
        }
        return false;
    }

    public function toFullCalendarEvent()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'start' => $this->start_date->toIso8601String(),
            'end' => $this->end_date->toIso8601String(),
            'description' => $this->description,
            'location' => $this->location,
            'max_capacity' => $this->max_capacity,
            'current_participants' => $this->current_participants
        ];
    }
}
