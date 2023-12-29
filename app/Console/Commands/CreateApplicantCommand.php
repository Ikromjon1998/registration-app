<?php

namespace App\Console\Commands;

use App\Models\Applicant;
use Illuminate\Console\Command;

class CreateApplicantCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-applicant-command';

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
        while (true) {
            $this->info('Creating applicant');
            Applicant::factory()->create();
            sleep(3);
        }
    }
}
