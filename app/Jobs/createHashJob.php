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
use App\Jobs\createHashSubJob;
use Illuminate\Support\Facades\Log;


class createHashJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private int $index;
    public function __construct($index)
    {
        //
        $this->index = $index;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        //
        $index = $this->index;
        $chunkSize = 1000;

        for ($offset = 0; $offset < $index; $offset += $chunkSize) {

            $limit = min($chunkSize, $index - $offset);
            createHashSubJob::dispatch($limit);
        }
    }
}
