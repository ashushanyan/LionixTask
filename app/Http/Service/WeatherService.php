<?php


namespace App\Http\Service;


use App\Models\Weather;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class WeatherService
{
    private const LOCATIONS = [
        0 => [
            'lat' => '40.18',
            'lon' => '44.51'
        ],
        1 => [
            'lat' => '39.21',
            'lon' => '46.41'
        ],
    ];

    public function getWeatherAndSaveInDB()
    {
        $api_key = 'bf65d8b174418831a16055a19f50144f';
        $units = 'metric'; // for Celsius
        foreach (self::LOCATIONS as $location) {
            $url = "https://api.openweathermap.org/data/2.5/weather?lat=". $location['lat'] ."&lon=". $location['lon'] ."&appid=". $api_key ."&units=". $units ."";
            $res = $this->getOpenWeatherAPIResponse($url);

            $weather = Weather::create($weatherData = [
                'time' => Carbon::parse($res['dt'])->setTimezone('Asia/Yerevan')->format('Y-m-d H:i:s'),
                'name' => $res['name'],
                'lat' => $res['coord']['lat'],
                'long' => $res['coord']['lon'],
                'temp' => $res['main']['temp'],
                'pressure' => $res['main']['pressure'],
                'humidity' => $res['main']['humidity'],
                'temp_min' => $res['main']['temp_min'],
                'temp_max' => $res['main']['temp_max']
            ]);

            if ($weather === null) {
                Log::info("Error | weather dose not created | Request ". json_encode($weatherData) ."");
            } else {
                Log::info("Success | weather created successfully");
            }
        }
    }

    public function getOpenWeatherAPIResponse($url)
    {
        return json_decode(file_get_contents($url), true);
    }
}
