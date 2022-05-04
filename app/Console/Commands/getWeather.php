<?php

namespace App\Console\Commands;

use App\Http\Service\WeatherService;
use Illuminate\Console\Command;

class getWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get weather info from openweathermap.org';

    public function handle()
    {
        $weatherService = new WeatherService();
        $weatherService->getWeatherAndSaveInDB();
    }
}
