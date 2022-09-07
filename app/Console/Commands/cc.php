<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use AmrShawky\LaravelCurrency\Facade\Currency;

class cc extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:convert {usd} {bdt} {amount}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $userInputForm = $this->arguments()["usd"];
        $userInputTo = $this->arguments()["bdt"];
        $amount = $this->arguments()["amount"];


        if (is_numeric($amount)) {
            $converted = Currency::convert()
                ->from($userInputForm)
                ->to($userInputTo)
                ->amount($amount)
                ->get();

            printf("%s %.2f is worth %.2f in %s", $userInputForm, $amount, $converted, $userInputTo);
        } else {
            echo "Please enter a valid amount";
        }
    }
}
