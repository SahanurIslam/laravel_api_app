<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autotasksworkflowdefinition extends Model
{
    use HasFactory;
    protected $primaryKey = 'RecId';
    protected $fillable = [
        'parent',
        'RecId',
        'Title',
        'Description',
        'ActionType',
        'AmountDaysStart',
        'AmountDaysDeadLine',
        'PriorityType',
        'Active',
        'Rubriek',
        'ParentAutoTaskRecId',

    ];
}
