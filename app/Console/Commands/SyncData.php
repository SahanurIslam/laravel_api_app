<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\OnViewService;


class SyncData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $onViewService = new OnViewService();
        $onViewService->getTaskData();
    }
}
