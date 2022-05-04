<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    /**
     * @var array
     */
    private array $weather = [];

    public function index(Request $request): View
    {
        if (!is_null($request->countryName)) {
            $weathers = Weather::where('name', $request->countryName)->get();
        } else {
            $weathers = Weather::all();
        }

        if (isset($weathers)) {
            foreach ($weathers as $weather) {
                $this->weather[] = array_values($weather->toArray());
            }
        }

        return view('index')->with('data', json_encode($this->weather));
    }
}
