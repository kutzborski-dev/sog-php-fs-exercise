<?php

if(!function_exists('julianToGregorianDate')) {
    /**
     * Convert Julian Date to Gregorian Date in the format "YYYY-MM-DD".
     *
     * @param float $julianDate The Julian Date.
     * @return string The Gregorian date in "YYYY-MM-DD" format.
     */
    function julianToGregorianDate($julianDate)
    {
        $julianDate += 0.5;
        $Z = (int)$julianDate;
        $F = $julianDate - $Z;
    
        if ($Z < 2299161) {
            $A = $Z;
        } else {
            $alpha = (int)(($Z - 1867216.25) / 36524.25);
            $A = $Z + 1 + $alpha - (int)($alpha / 4);
        }
    
        $B = $A + 1524;
        $C = (int)(($B - 122.1) / 365.25);
        $D = (int)(365.25 * $C);
        $E = (int)(($B - $D) / 30.6001);
    
        $day = $B - $D - (int)(30.6001 * $E) + $F;
        $month = ($E < 14) ? ($E - 1) : ($E - 13);
        $year = ($month > 2) ? ($C - 4716) : ($C - 4715);
    
        return sprintf('%04d-%02d-%02d', $year, $month, (int)$day);
    }
}