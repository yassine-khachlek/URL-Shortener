<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Url;

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
    protected $description = 'Remove links older than 24 hours';

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
        Url::chunk(1000, function ($urls) {
            
            Url::destroy($urls->map(function($url){
                return $url->id;
            })->toArray());

        });

        /*
        foreach ($urls as $url) {
           

            foreach ($url->accessLogs()->get() as $access_log) {
                $access_log->url()->dissociate()->save();
                $this->info($access_log);
            }
        }
        */
    }
}
