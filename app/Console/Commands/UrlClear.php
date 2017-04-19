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
        $urls = Url::where('created_at', '<', date('Y-m-d H:i:s', strtotime('-1 day')));

        if ($urls->count()) {
            $this->info($urls->count(). ' urls deleted.');
            $urls->delete();
        }else{
            $this->line('No urls to clear.');
        }
    }
}
