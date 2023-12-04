<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierPartnerLivingSituation extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'parent',
        'id',
        'LivingSituationTypes'

    ];
}
