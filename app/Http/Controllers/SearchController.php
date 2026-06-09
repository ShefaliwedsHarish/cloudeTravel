<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function flightSearch(Request $request)
    {
        // If GET request without parameters, redirect to home
        if ($request->isMethod('get') && !$request->filled('fromCity')) {
            return redirect('/');
        }

        $validated = $request->validate([
            'tripType' => 'nullable|string',
            'fromCity' => 'nullable|string',
            'toCity' => 'nullable|string',
            'departureDate' => 'nullable|date',
            'returnDate' => 'nullable|date',
            'adults' => 'nullable|integer',
            'children' => 'nullable|integer',
            'infants' => 'nullable|integer',
            'selectedClass' => 'nullable|string',
        ]);

        return Inertia::render('frontend/flight/flight-results', [
            'searchParams' => $validated,
        ]);
    }

    public function hotelSearch(Request $request)
    {
        // If GET request without parameters, redirect to home
        if ($request->isMethod('get') && !$request->filled('hotelCity')) {
            return redirect('/');
        }

        $validated = $request->validate([
            'stayType' => 'nullable|string',
            'hotelCity' => 'nullable|string',
            'checkInDate' => 'nullable|date',
            'checkOutDate' => 'nullable|date',
            'rooms' => 'nullable|integer',
            'adults' => 'nullable|integer',
            'children' => 'nullable|integer',
        ]);

        return Inertia::render('frontend/hotel/hotel-results', [
            'searchParams' => $validated,
        ]);
    }

    public function visaSearch(Request $request)
    {
        // If GET request without parameters, redirect to home
        if ($request->isMethod('get') && !$request->filled('destinationCountry')) {
            return redirect('/');
        }

        $validated = $request->validate([
            'destinationCountry' => 'nullable|string',
            'visaType' => 'nullable|string',
            'numberOfTravellers' => 'nullable|integer',
            'passportNationality' => 'nullable|string',
            'travelDate' => 'nullable|date',
        ]);

        return Inertia::render('frontend/visa/visa-results', [
            'searchParams' => $validated,
        ]);
    }
}
