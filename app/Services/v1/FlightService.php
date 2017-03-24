<?php

namespace App\Services\v1;

use App\Flight;

class FlightService {
   
    public function getFlights() {
            return $this->filterFlights(Flight::all());
    }

    public function setFlights($flightnumber){
        return $this->filterFlights(Flight::where('flightNumber', $flightnumber)->get());
    }

    protected function filterFlights($flights) {
        
        $data = [];

        foreach ($flights as $flight) {

            $entry = [
                'flightNumber' => $flight->flightnumber,
                'status' => $flight->status,
                'href' => route('flights.show', ['id' => $flight->flightnumber])
            ];

            $data[] = $entry;
        }

        return $data;
    }
}