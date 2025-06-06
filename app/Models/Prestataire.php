<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Prestataire extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'type',
    ];


    public function evenements()
    {
        return $this->hasMany(Evenement::class);
    }
}
