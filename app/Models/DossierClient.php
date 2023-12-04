<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierClient extends Model
{
    use HasFactory;
    protected $primaryKey = 'RecId';
    protected $fillable = [
        'parent',
        'RecId',
        'LastName',
        'Preposition',
        'GivenNames',
        'FirstName',
        'DateOfBirth',
        'Bsn',
        'Telephone',
        'MobileTelephone',
        'EmailAddress',
        'Sex'

    ];
}
