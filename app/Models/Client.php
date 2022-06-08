<?php

namespace App\Models;

use App\Models\Livre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    public function livre(){
        return $this->belongsToMany(Livre::class)->withpivot('dateDebut','dateFin')->withTimestamps();
    }
}
