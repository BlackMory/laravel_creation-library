<?php

namespace App\Models;

use App\Models\Livre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;
    protected $guarded=['admin'];
    public function Livre(){
        return $this->hasMany(Livre::class);
    }
}
