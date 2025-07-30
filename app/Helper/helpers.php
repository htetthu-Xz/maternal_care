<?php

use Carbon\Carbon;

function adjustToNearestTuesdayOrThursday($originalDate, $days)
{
    $date = Carbon::parse($originalDate)->addDays($days);

    // If already Tuesday or Thursday, return as is
    if (in_array($date->dayOfWeek, [Carbon::TUESDAY, Carbon::THURSDAY])) {
        return $date;
    }

    // Add days until it becomes Tuesday or Thursday
    while (!in_array($date->dayOfWeek, [Carbon::TUESDAY, Carbon::THURSDAY])) {
        $date->addDay();
    }

    return $date;
}
