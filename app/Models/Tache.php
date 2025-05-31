<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tache extends Model
{
    use HasFactory;

    protected $fillable = [
        'evenement_id',
        'description',
        'statut',
    ];

    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }
}

