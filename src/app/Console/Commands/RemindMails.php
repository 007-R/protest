<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\RemindMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\Reservation;

class RemindMails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:RemindMail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending Reminder Mails';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::today();
        $targets = Reservation::with(['shop', 'user'])->whereDate('datetime', $today)->get();

        foreach ($targets as $user) {
            return Mail::to($user->user->email)->send(new RemindMail($user));
        }
    }
}
