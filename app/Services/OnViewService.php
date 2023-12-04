<?php

namespace App\Services;

use App\Exports\TasksExport;
use App\Exports\DossierworkflowsExport;
use App\Exports\WorkflowsExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Company;

use App\Models\Task;
use App\Models\TaskTaskCheckboxes;
use APP\Models\TaskTaskCheckboxesTaskCheckboxLogs;

use App\Models\Dossierworkflow;

use App\Models\Workflow;
use App\Models\Childworkflow;

use App\Models\Workflowdefinition;
use App\Models\Rubriekenworkflowdefinition;
use App\Models\Autotasksworkflowdefinition;
use App\Models\AutotaskReturnPatternworkflowdefinition;
use App\Models\AutotaskAutoTaskCheckboxesworkflodefinition;

use App\Models\Dossier;

use App\Models\DossierClient;
use App\Models\DossierClientAddress;
use App\Models\DossierClientMarialState;
use App\Models\DossierClientLivingSituation;

use App\Models\DossierPartner;
use App\Models\DossierPartnerAddress;
use App\Models\DossierPartnerMarialState;
use App\Models\DossierPartnerLivingSituation;


use App\Models\DossierVerwijzer;
use App\Models\DossierBewindvoerder;
use App\Models\DossierDossierStatusHistory;
use App\Models\DossierDossierTypeHistory;


class OnViewService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCompanies()
    {

        $response = $this->http->get('companies');
        if ($response->getStatusCode() == 200) {
            $get_data  = json_decode($response->getBody()->getContents(), true);
            foreach ($get_data['Content'] as $item) {
                $response = Company::updateOrCreate([
                    'uuid' => $item['Guid']
                ], $item);
            }
        }
    }

    public function getTasks() // Csv Complete
    {
        $companies = Company::all();
        foreach ($companies as $companie) {
            $hasData = true;
            $offset = 0;
            while ($hasData) {
                $response = $this->http->get("{$companie->Guid}/task", [
                    'query' => [
                        'offst' => $offset,
                        'limit' => 100
                    ]
                ]);
                if ($response->getStatusCode() == 200) {
                    $get_data = json_decode($response->getBody()->getContents(), true);
                    if (isset($get_data['Content']) && count($get_data['Content'])) {
                        foreach ($get_data['Content'] as $item) {
                            $task = Task::updateOrCreate([
                                'RecId' => $item['RecId']
                            ], $item);

                            if (isset($item['TaskCheckboxes']) && count($item['TaskCheckboxes'])) {
                                foreach ($item['TaskCheckboxes'] as $taskCheckboxes) {
                                    $taskTaskCheckboxes = TaskTaskCheckboxes::updateOrCreate([
                                        'parent' => $task['RecId'],
                                        'RecId' => $taskCheckboxes['RecId']
                                    ], $taskCheckboxes);

                                    if (isset($taskCheckboxes['TaskCheckboxLogs']) && count($taskCheckboxes['TaskCheckboxLogs'])) {
                                        foreach ($taskCheckboxes['TaskCheckboxLogs'] as $taskCheckboxLogs) {
                                            $response = TaskTaskCheckboxesTaskCheckboxLogs::updateOrCreate([
                                                'parent' => $taskTaskCheckboxes['RecId'],
                                                'RecId' => $taskCheckboxLogs['RecId']
                                            ], $taskCheckboxLogs);
                                        }
                                    }
                                }
                            }
                        }
                    }

                    $hasData = count($get_data['Content']) > 0;
                    $offset += 100;
                }
            }
        }
    }

    public function getDossierworkflow()  // Csv Complete
    {
        $companies = Company::all();
        foreach ($companies as $companie) {
            $hasData = true;
            $offset = 0;
            while ($hasData) {
                $response = $this->http->get("{$companie->Guid}/dossierworkflow", [
                    'query' => [
                        'offst' => $offset,
                        'limit' => 100
                    ]
                ]);
                if ($response->getStatusCode() == 200) {
                    $get_data = json_decode($response->getBody()->getContents(), true);
                    foreach ($get_data['Content'] as $item) {
                        $response = Dossierworkflow::updateOrCreate([
                            'RecId' => $item['RecId']
                        ], $item);
                    }
                    $hasData = count($get_data['Content']) > 0;
                    $offset += 100;
                }
            }
        }
    }

    public function getWorkflow() // pending ???
    {
        $companies = Company::all();
        foreach ($companies as $companie) {
            $hasData = true;
            $offset = 0;
            while ($hasData) {
                $response = $this->http->get("{$companie->Guid}/workflow", [
                    'query' => [
                        'offst' => $offset,
                        'limit' => 100
                    ]
                ]);

                if ($response->getStatusCode() == 200) {
                    $get_data = json_decode($response->getBody()->getContents(), true);
                    foreach ($get_data['Content'] as $item) {
                        $worlFlow = Workflow::updateOrCreate([
                            'RecId' => $item['RecId']
                        ], $item);

                        foreach ($item['Dossiers'] as $dossier) {
                            Childworkflow::updateOrCreate([
                                'parent' => $worlFlow->RecId,
                                'RecId' => $dossier['RecId']
                            ], $dossier);
                        }
                    }
                    $hasData = count($get_data['Content']) > 0;
                    $offset += 100;
                }
            }
        }
    }

    public function getDBData()
    {
        $childWorlflows = Childworkflow::with('workflow')->get();
        dd($childWorlflows);
    }

    public function getTaskData()
    {
        $taskTaskCheckboxes = Task::with('TaskTaskCheckboxes')->with('TaskTaskCheckboxesTaskCheckboxLogs')->get();
        dd($taskTaskCheckboxes->toArray());
    }


    public function getWorkflowDefinition()
    {
        $companies = Company::all();
        foreach ($companies as $companie) {
            $hasData = true;
            $offset = 0;
            while ($hasData) {
                $response = $this->http->get("{$companie->Guid}/workflowdefinition", [
                    'query' => [
                        'offst' => $offset,
                        'limit' => 100
                    ]
                ]);
                if ($response->getStatusCode() == 200) {
                    $get_data = json_decode($response->getBody()->getContents(), true);

                    foreach ($get_data as $item) {
                        $workflowdefinition = Workflowdefinition::updateOrCreate([
                            'RecId' => $item['RecId']
                        ], $item);

                        foreach ($item['Rubrieken'] as $rubrieken) {
                            Rubriekenworkflowdefinition::updateOrCreate([
                                'parent' => $workflowdefinition->RecId,
                                'RecId' => $rubrieken['RecId']
                            ], $rubrieken);
                        }
                        if (isset($item['AutoTasks'])) {
                            foreach ($item['AutoTasks'] as $AutoTasks) {
                                $Autotasksworkflowdefinition  =  Autotasksworkflowdefinition::updateOrCreate([
                                    'parent' => $workflowdefinition->RecId,
                                    'RecId' => $AutoTasks['RecId']
                                ], $AutoTasks);

                                if (isset($AutoTasks['ReturnPattern']) && count($AutoTasks['ReturnPattern'])) {
                                    foreach ($AutoTasks['ReturnPattern'] as $ReturnPattern) {
                                        AutotaskReturnPatternworkflowdefinition::updateOrCreate([
                                            'parent' => $Autotasksworkflowdefinition->RecId,
                                            // 'RecId' => $ReturnPattern['RecId']
                                        ], $ReturnPattern);
                                    }
                                }
                                if (isset($AutoTasks['AutoTaskCheckboxes']) && count($AutoTasks['AutoTaskCheckboxes'])) {
                                    foreach ($AutoTasks['AutoTaskCheckboxes'] as $AutoTaskCheckboxes) {
                                        dd($AutoTaskCheckboxes);
                                        AutotaskAutoTaskCheckboxesworkflodefinition::updateOrCreate([
                                            'parent' => $Autotasksworkflowdefinition->RecId,
                                            'RecId' => $AutoTaskCheckboxes['RecId']
                                        ], $AutoTaskCheckboxes);
                                    }
                                }
                            }
                        }
                    }
                    $hasData = count($get_data) > 0;
                    $offset += 100;
                }
            }
        }
    }

    public function getDossier()
    {
        $companies = Company::all();
        foreach ($companies as $companie) {
            $hasData = true;
            $offset = 0;
            while ($hasData) {
                $response = $this->http->get("{$companie->Guid}/dossier", [
                    'query' => [
                        'offst' => $offset,
                        'limit' => 100
                    ]
                ]);
                if ($response->getStatusCode() == 200) {
                    $get_data = json_decode($response->getBody()->getContents(), true);
                    if (isset($get_data['Content']) && count($get_data['Content'])) {
                        foreach ($get_data['Content'] as $item) {
                            $dossier = Dossier::updateOrCreate([
                                'RecId' => $item['RecId']
                            ], $item);

                            if (isset($item['Client']) && count($item['Client'])) {
                                foreach ($item['Client'] as $client) {
                                    $dossierclient = DossierClient::UpdateOrCreate([
                                        'parent' => $dossier['RecId'],
                                        'RecId' => $client['RecId']
                                    ], $client);

                                    if (isset($client['Address']) && count($client['Address'])) {
                                        foreach ($client['Address'] as $address) {
                                            $response = DossierClientAddress::UpdateOrCreate([
                                                'parent' => $dossierclient['RecId'],
                                                'RecId' =>  $address['RecId']
                                            ], $address);
                                        }
                                    }

                                    if (isset($client['MarialState']) && count($client['MarialState'])) {
                                        foreach ($client['MarialState'] as $marialState) {
                                            $response = DossierClientMarialState::UpdateOrCreate([
                                                'parent' => $dossierclient['RecId'],
                                                'Id' =>  $marialState['id']
                                            ], $marialState);
                                        }
                                    }

                                    if (isset($client['LivingSituation']) && count($client['LivingSituation'])) {
                                        foreach ($client['LivingSituation'] as $livingSituation) {
                                            $response = DossierClientLivingSituation::UpdateOrCreate([
                                                'parent' => $dossierclient['RecId'],
                                                'Id' =>  $livingSituation['id']
                                            ], $livingSituation);
                                        }
                                    }
                                }
                            }

                            if (isset($item['Partner']) && count($item['Partner'])) {
                                foreach ($item['Partner'] as $partner) {
                                    $response = DossierPartner::UpdateOrCreate([
                                        'parent' => $dossier['RecId'],
                                        'RecId' => $partner['RecId']
                                    ], $partner);

                                    if (isset($partner['Address']) && count($partner['Address'])) {
                                        foreach ($partner['Address'] as $address) {
                                            $response = DossierPartnerAddress::UpdateOrCreate([
                                                'parent' => $dossier['RecId'],
                                                'RecId' => $address['RecId']
                                            ], $address);
                                        }
                                    }

                                    if (isset($partner['MarialState']) && count($partner['MarialState'])) {
                                        foreach ($partner['MarialState'] as $marialState) {
                                            $response = DossierPartnerMarialState::UpdateOrCreate([
                                                'parent' => $dossier['RecId'],
                                                'RecId' => $marialState['id']
                                            ], $marialState);
                                        }
                                    }
                                    if (isset($partner['LivingSituation']) && count($partner['LivingSituation'])) {
                                        foreach ($partner['LivingSituation'] as $livingSituation) {
                                            $response = DossierPartnerLivingSituation::UpdateOrCreate([
                                                'parent' => $dossier['RecId'],
                                                'RecId' => $livingSituation['id']
                                            ], $livingSituation);
                                        }
                                    }
                                }
                            }

                            if (isset($item['Verwijzer']) && count($item['Verwijzer'])) {
                                foreach ($item['Verwijzer'] as $verwijzer) {
                                    $response = DossierVerwijzer::updateOrCreate([
                                        'parent' => $dossier['RecId'],
                                        'RecId' => $verwijzer['RecId']
                                    ], $verwijzer);
                                }
                            }

                            if (isset($item['Bewindvoerder']) && count($item['Bewindvoerder'])) {
                                foreach ($item['Bewindvoerder'] as $bewindvoerder) {
                                    $response = DossierBewindvoerder::updateOrCreate([
                                        'parent' => $dossier['RecId'],
                                        'RecId' => $bewindvoerder['RecId']
                                    ], $bewindvoerder);
                                }
                            }

                            if (isset($item['DossierStatusHistory']) && count($item['DossierStatusHistory'])) {
                                foreach ($item['DossierStatusHistory'] as $dossierStatusHistory) {
                                    $response = DossierDossierStatusHistory::updateOrCreate([
                                        'parent' => $dossier['RecId'],
                                        'RecId' => $dossierStatusHistory['RecId']
                                    ], $dossierStatusHistory);
                                }
                            }

                            if (isset($item['DossierTypeHistory']) && count($item['DossierTypeHistory'])) {
                                foreach ($item['DossierTypeHistory'] as $dossierTypeHistory) {
                                    $response = DossierDossierTypeHistory::updateOrCreate([
                                        'parent' => $dossier['RecId'],
                                        'RecId' => $dossierTypeHistory['RecId']
                                    ], $dossierTypeHistory);
                                }
                            }
                        }
                    }
                    $hasData = count($get_data['Content']) > 0;
                    $offset += 100;
                }
            }
        }
    }


    public function exportTask()
    {
        return Excel::store(new TasksExport(), 'tasks.csv');
    }

    public function exportDossierworkflow()
    {
        return Excel::store(new DossierworkflowsExport(), 'dossierworkflows.csv');
    }

    public function exportWorkflow()
    {
        return Excel::store(new WorkflowsExport(), 'workflows.csv');
    }
}
