<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Evenement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'type',
        'lieu',
        'date',
        'prestataire_id',
    ];

    public function prestataire()
    {
        return $this->belongsTo(Prestataire::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function taches()
    {
        return $this->hasMany(Tache::class);
    }
}
