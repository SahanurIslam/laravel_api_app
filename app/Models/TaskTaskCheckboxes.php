<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskTaskCheckboxes extends Model
{
    use HasFactory;
    protected $table = "task_task_checkboxes";
    protected $primaryKey = "RecId";
    protected $fillable = [
        'parent',
        'RecId',
        'AutoTaskCheckboxId',
        'Title',
        'Description',
        'Enforce',
        'IsChecked',
    ];
    public function task()
    {
        return $this->hasMany(Tasks::class);
    }
    public function taskTaskCheckboxesTaskCheckboxLogs()
    {
        return $this->hasMany(TaskTaskCheckboxesTaskCheckboxLogs::class);
    }
}
