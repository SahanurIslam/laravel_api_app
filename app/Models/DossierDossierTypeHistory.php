<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierDossierTypeHistory extends Model
{
    use HasFactory;
    protected $primaryKey = 'RecId';
    protected $fillable = [
        'parent',
        'RecId',
        'DossierId',
        'DossierType',
        'Date',
        'StartDate'

    ];
}
