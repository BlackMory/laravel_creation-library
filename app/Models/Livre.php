<?php

namespace App\Models;
use App\Models\Genre;
use App\Models\Prete;
use App\Models\Client;
use App\Models\Editeur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livre extends Model
{
    use HasFactory;
    protected $guarded=['admin'];

    public function genre(){
        return $this->belongsTo(Genre::class);
    }
    public function editeur(){
        return $this->belongsTo(Editeur::class);
    }
    public function client(){
        return $this->belongsToMany(Client::class);
    }
    
}
