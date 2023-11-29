<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Support\Str;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class createHashSubjob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $i;
    public function __construct($i)
    {
        //
        $this->i = $i;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        //
        $i = $this->i;
        $dbValue =[];
        for ($j=0; $j < $i; $j++) {
            $randomString = Str::random(24);
            $dbValue[] =['hash' => $randomString];
        };
        DB::table('hash')->insert($dbValue);
    }
}
