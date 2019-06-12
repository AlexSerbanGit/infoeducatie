<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\DailyProgress;

class SetUsersProgress extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:setusersprogress';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets the daily progress for each student one by one.';

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
     * @return mixed
     */
    public function handle()
    {
        $users = User::all();
        if($users->count() > 0){
            foreach($users as $user){

                $progress = new DailyProgress;
                $progress->protein = 0;
                $progress->carbo = 0;
                $progress->fat = 0;
                $progress->kcal = 0;
                $progress->user_id = $user->id;
                $progress->save();
                    
            }
        }
        
    }
}
