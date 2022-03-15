<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medecin extends Model
{
    use HasFactory;

    protected $fillable = ["id", "nom", "prenom", "adresse", "tel", "departement", "specialiteComplementaire"];

    public $timestamps = false;
}
