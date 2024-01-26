<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Currency;
use Illuminate\Support\Facades\Http;

class CurrencyCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $codes = ['UAH' => 'UAH', 'USD' => 'USD', 'EUR' => 'EUR'];
        $response = Http::get('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json');
        foreach ($response->json() as $key => $value) {
            $code = array_search($value['cc'], $codes);
            if ($code) {
                Currency::where('code', $code)->update(['rate' => $value['rate']]);
            }
        }
        return 0;
    }
}
