<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'agenda_is_private'
    ];

    protected $dates = ['start', 'end'];

    protected $with = [
        'agendaItems'
    ];

    /**
     * RSVP responses for the related model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rsvps()
    {
        return $this->hasMany(Rsvp::class);
    }

    /**
     * Agenda Items related to this meeting
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agendaItems()
    {
        return $this->hasMany(Agenda::class);
    }
}
