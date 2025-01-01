<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\FlaskApiDomainExpired;
use App\Console\Commands\FlaskApiDomainPending;
class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\FlaskApiDomainPending::class,
        \App\Console\Commands\FlaskApiDomainExpired::class,
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('app:domain-pending')->everyFifteenMinutes();
        $schedule->command('app:domain-expired')->everyFifteenMinutes();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
