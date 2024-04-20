<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Relations\BelongsToMany;

class Prof extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'matiere'];

    public function classes(): BelongsToMany{
        return $this->belongsToMany(Classe::class)->withPivot('nbHeures');
    }
}