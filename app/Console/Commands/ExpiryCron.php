<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\{Subscription, Credit};
use \Carbon\Carbon;

class ExpiryCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expiry:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To mark expired subscriptions and credit status as expired';

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
        $expiries = [];
        foreach (Subscription::all() as $subscription) {
            if ((int)(Carbon::parse($subscription->expiry))->diffInDays(Carbon::now()) <= 0) {
                $subscription->status = 'expired';
                $updated = $subscription->update();
                $expiries[] = $updated;
            }
        }

        $total = array_sum($expiries);
        \Log::info("{$total} subscriptions expired");
    }
}
