<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Relations\HasMany;
use illuminate\Database\Eloquent\Relations\BelongsToMany;

class Classe extends Model
{
    use HasFactory;

    public function eleves(): HasMany{
        return $this->hasMany(Eleve::class);
    }

    public function profs() : BelongsToMany{
        return $this->belongsToMany(Prof::class)->withPivot('nbHeures');
    }
}