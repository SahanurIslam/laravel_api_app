<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $primaryKey = 'RecId';
    protected $fillable = [
        'RecId',
        'Title',
        'Description',
        'StartDate',
        'DueDate',
        'Priority',
        'IsComplete',
        'DossierId',
        'ShowOnDashboard',
        'TaskType',
        'AutoTaskId',
        'CloseDate'

    ];
    public function taskTaskCheckboxes()
    {
        return $this->belongsTo(TaskTaskCheckboxes::class);
    }
}
