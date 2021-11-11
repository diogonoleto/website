<?php

namespace App\Jobs;

use App\Events\WebsiteEvent;
use App\Models\Website;
use App\Services\WebsiteServices;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessWebsite implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $websites = Website::all();
        foreach ($websites as $w) {
            $r = (new WebsiteServices)->getStatus($w->url);
            Website::find($w->id)->update([
                'status' => $r,
                'updated_at' => Carbon::now()
            ]);
        }
        event(new WebsiteEvent('update'));
    }
}
