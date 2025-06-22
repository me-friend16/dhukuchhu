<?php

namespace App\Helpers;

use Carbon\Carbon;

class NepaliDateHelper
{
    // Example: Convert Gregorian to Nepali date (basic approach)
    public static function convertToNepaliDate($date)
    {
        $nepaliMonths = [
            1 => 'Baisakh', 2 => 'Jestha', 3 => 'Ashadh', 4 => 'Shrawan', 5 => 'Bhadra', 6 => 'Ashwin',
            7 => 'Kartik', 8 => 'Mangsir', 9 => 'Poush', 10 => 'Magh', 11 => 'Falgun', 12 => 'Chaitra'
        ];

        // Convert to Carbon instance (if not already a Carbon instance)
        $date = Carbon::parse($date);

        // Sample conversion logic for Nepali year, month, and day
        // You'll need a reliable algorithm or library for precise conversion

        $nepaliYear = $date->year; // Example offset (adjust accordingly)
        $nepaliMonth = $nepaliMonths[$date->month] ?? 'Baisakh'; // Translate month
        $nepaliDay = $date->day;

        return "$nepaliDay $nepaliMonth $nepaliYear"; // Return formatted Nepali date
    }
}
