<?php

namespace App\Console;

use App\Http\Controllers\PaymentController;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */protected function schedule(Schedule $schedule)
{
    $schedule->call(function () {
        $students = User::where('role', 'mahasiswa')->get();
        foreach ($students as $student) {
            // Pastikan ada kolom semester_due_date pada tabel users
            $dueDate = $student->semester_due_date;
            $student->notify(new PaymentReminder($dueDate));
        }
    })->weekly()->startAt(now()->addWeeks(4)); // 4 minggu sebelum tenggat waktu
}


    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
