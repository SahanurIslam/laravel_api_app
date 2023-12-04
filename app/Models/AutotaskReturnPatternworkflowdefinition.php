<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutotaskReturnPatternworkflowdefinition extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'parent',
        'Type',
        'WeeksDay',
        'WeeksEvery',
        'MonthDayNumber',
        'MonthsEvery',
        'YearDayNumber',
        'YearMonth',
        'YearsEvery',
        'VisibleFrom',
        'ReachStartDate',
        'ReachType',
        'ReachAmount',
        'ReachAmountLeft',
        'ReachEndDate',
        'NextCreateDate',
        'NextExecuteDate',
        'Done'

    ];
}
