<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use App\Models\Hash;
use Illuminate\Support\Facades\DB;

class createHashSubJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private int $limit;
    public function __construct($limit)
    {
        //
        $this->limit = $limit;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
            $limit = $this->limit;
            $dbValue = [];

            for ($i = 0; $i < $limit; $i++) {
                $randomString = Str::random(24);
                $dbValue[] = ['hash' => $randomString];
            }

            Hash::insert($dbValue);
    }
}
