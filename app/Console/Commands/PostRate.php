<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class PostRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:postRate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate users post rate';

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
        $this->withProgressBar(User::all(), function ($user) {
            $posted_gigs_count = $user->gigs()->posted()->count();
            $sum_positions = $user->gigs()->sum('positions');
            if($posted_gigs_count === 0 || $sum_positions === 0) {
                $user->post_rate = 0;
            } else {
                $user->post_rate = ($posted_gigs_count/$sum_positions) * 100;
            }
            $user->save();
        });
    }
}
