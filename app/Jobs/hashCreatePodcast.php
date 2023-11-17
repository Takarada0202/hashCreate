<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class hashCreatePodcast implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $index;
    public function __construct($index)
    {
        $this->index = $index;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $index = $this->index;
            $dbValue =[];
            for ($i=0; $i < $index; $i++) {
                $randomString = Str::random(24);
                $dbValue[] =['hash' => $randomString];
            };
            db::table('hash')->insert($dbValue);

    }
}
