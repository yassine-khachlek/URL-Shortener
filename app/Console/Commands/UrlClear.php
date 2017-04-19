<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Url;
use App\UrlAccessLog;
use Storage;

class UrlClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'url:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove links older than 24 hours, this comman should run every hour.';

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
        // Get the current hour
        $currentHour = date('Y-m-d H:00:00');

        // Set the log path
        $logPath = join('', [
            'logs/',
            date('Y/m/d/H', strtotime($currentHour)),
            '.json'
        ]);

        // Get urls access log where urls been created in the previous hour
        $UrlAccessLogs = UrlAccessLog::with(['user', 'url', 'userAgent', 'country'])
        ->whereHas('url', function($query) use ($currentHour) {
            $query->where('created_at', '<', $currentHour);
        })
        ->orderBy('created_at', 'asc')
        ->get();

        if ( $UrlAccessLogs->count() ) {

            $this->info($UrlAccessLogs->count(). ' logs archived.');

            // Store urls access log in the local storage
            // TODO: Remove json_encode with JSON_PRETTY_PRINT in prod
            Storage::disk('local')->put($logPath, json_encode($UrlAccessLogs, JSON_PRETTY_PRINT));

        }else{
            $this->line('No logs to clear.');
        }

        // Remove old urls, accessLogs will be deleted in cascade.
        $urls = Url::where('created_at', '<', $currentHour)->withTrashed();

        if ($urls->count()) {
            $this->info($urls->count(). ' urls deleted.');
            $urls->forceDelete();
        }else{
            $this->line('No urls to clear.');   
        }

    }
}
