<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class HelloWorldJob implements ShouldQueue
{
    use Queueable;

    public $tries = 10;

    public $user;
    /**
     * Create a new job instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try{
            \Log::info($this->user);
            file_get_contents('xddd.local.ajednaknie');
        }
        catch(\Exception $exception){

        }
    }
}
