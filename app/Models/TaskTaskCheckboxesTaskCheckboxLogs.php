<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskTaskCheckboxesTaskCheckboxLogs extends Model
{
    use HasFactory;
    protected $table = "task_task_checkboxes_task_checkbox_logs";
    protected $primaryKey = "RecId";
    protected $fillable = [
        'parent',
        'RecId',
        'CreatedDate',
        'CreatedBy',
        'IsChecked',
        'Description'

    ];
    public function taskTaskCheckboxes()
    {
        return $this->belongsTo(TaskTaskCheckboxes::class);
    }
}
