<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossierworkflow extends Model
{
    use HasFactory;
    protected $primaryKey = 'RecId';
    protected $fillable = [
        'RecId',
        'DossierId',
        'DossierNumber',
        'WorkflowId',
        'WorkflowTitle',

    ];
}
