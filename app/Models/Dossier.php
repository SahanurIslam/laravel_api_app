<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    use HasFactory;
    protected $primaryKey = 'RecId';
    protected $fillable = [
        'RecId',
        'DossierNumber',
        'Dossiertype',
        'MainUser',
        'IntakeDate',
        'Closed',
        'Afwikkelstatus',
        'Status',
        'AanmeldReden',
        'ToegangClient',
        'ToegangDerden',
        'AfsluitReden'
    ];
}
