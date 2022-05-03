<?php

namespace App\Http\Controllers;

use App\Http\Requests\NasaNeoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NasaNeoController extends Controller
{

    public function getFastestAstroid($day)
    {
        $maxVelocityInKMPH = 0;
        $fastestAstroid = null;
        foreach ($day as $astroid) {
            // get the velocity in KMPH
            $astroidVelocityInKMPH = $astroid['close_approach_data'][0]['relative_velocity']['kilometers_per_hour'];
            // checks if max velocity is less then this velocity
            if ($maxVelocityInKMPH < $astroidVelocityInKMPH) {
                // put current velocity into max
                $maxVelocityInKMPH = $astroidVelocityInKMPH;
                // Also put the current astroid in declaired valriable
                $fastestAstroid = $astroid;
            }
        }
        // retrn the fastest Astroid
        return $fastestAstroid;
    }

    public function getClosestAstroid($day)
    {
        $closest = 0;
        $closestAstroid = null;
        foreach ($day as $astroid) {
            // get the distance in KM
            $astroidMissDistanceInKM = $astroid['close_approach_data'][0]['miss_distance']['kilometers'];
            // checks if closest distance is greater then this distance
            if ($closest > $astroidMissDistanceInKM) {
                // put current distance into closest
                $closest = $astroidMissDistanceInKM;
                // Also put the current astroid in declaired valriable
                $closestAstroid = $astroid;
            }
        }
        // retrn the Closest Astroid
        return $closestAstroid;
    }

    public function getAverageSize($day)
    {
        $averageSize = 0;
        foreach ($day as $astroid) {
            // get the diameter and plus into the averageSize
            $averageSize += $astroid['estimated_diameter']['kilometers']['estimated_diameter_max'];
            // devide to number of astroids to the total size
            $averageSize /= count($day);
        }
        return $averageSize;
    }

    public function getNeoData(NasaNeoRequest $request) // Validation logic in NasaNeoRequest
    {
        // Fetching NASA NEO API according to the request

        $nasaNeoData = Http::get("https://api.nasa.gov/neo/rest/v1/feed", [
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'api_key' => 'DEMO_KEY'
        ])->json();

        // Calculating number of astroids in each day
        $numberOfAstroids = []; // stores date with count value like - ["2022-04-01" => 10]
        $fastestAstroids = [];
        $closestAstroids = [];
        $averageSizes = [];

        foreach ($nasaNeoData['near_earth_objects'] as $date => $day) {
            // $date is the date and $day
            // 
            array_push($numberOfAstroids, [$date => count($day)]);

            // calulating fastest Astroid
            array_push($fastestAstroids, [$date => $this->getFastestAstroid($day)]);
            array_push($closestAstroids, [$date => $this->getClosestAstroid($day)]);
            array_push($averageSizes, [$date => $this->getAverageSize($day)]);
        }

        return inertia('Neo/Result', compact([
            'numberOfAstroids',
            'fastestAstroids',
            'closestAstroids',
            'averageSizes'
        ]));
    }
}