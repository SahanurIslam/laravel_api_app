<?php

namespace App\Exports;

use App\Models\Dossierworkflow;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DossierworkflowsExport implements FromCollection, WithCustomCsvSettings, WithHeadings
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
            "DossierId",
            "DossierNumber",
            "WorkflowId",
            "WorkflowTitle",
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Dossierworkflow::select(
            'RecId',
            'DossierId',
            'DossierNumber',
            'WorkflowId',
            'WorkflowTitle',
        )->get();
    }
}
