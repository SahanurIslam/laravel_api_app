<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutotaskAutoTaskCheckboxesworkflodefinition extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [
        'parent',
        'RecId',
        'Title',
        'Description',
        'Enforce',
        'Sequence',
        'LinkedForm',
        'LinkedTemplate	'
    ];
}
