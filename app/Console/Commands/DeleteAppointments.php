<?php

namespace App\Console\Commands;

use App\Models\Appointment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DeleteAppointments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:appointments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Trashed Appointments';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     parent::__construct();
    // }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Appointment::withTrashed()->whereNotNull('deleted_at')->whereDate('created_at', '!=', today())->forceDelete();
        Log::alert('Trashed appointment deleted successfully!');
        // return 0;
    }
}
