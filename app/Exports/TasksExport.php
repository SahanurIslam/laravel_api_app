<?php

namespace App\Exports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TasksExport implements FromCollection, WithCustomCsvSettings, WithHeadings
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function headings(): array
    {
        return [
            "RecId",
            "Title",
            "Description",
            "StartDate",
            "DueDate",
            "Priority",
            "IsComplete",
            "DossierId",
            "ShowOnDashboard",
            "TaskType",
            "AutoTaskId",
            "CloseDate"

        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Task::select(
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
        )->get();
    }
}
