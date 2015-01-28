<?php

namespace Tracker;

use Tracker\Client\Client;
use Tracker\TimeSheet\TimeEntry;

class TimeSheet
{
    protected $timeEntries = [];

    public static function forClient(Client $client)
    {
        $timeSheet = new TimeSheet();

        // TODO: write logic here

        return $timeSheet;
    }

    public function track($time, $when = 'today')
    {
        $entry = new TimeEntry($time, $when);
        $this->timeEntries[] = $entry;

        return $entry;
    }

    public function sum()
    {
        $sum = 0;

        foreach ($this->timeEntries as $entry) {
            $sum += $entry->getTime();
        }

        return $this->formatDuration($sum);
    }

    public function formatDuration($seconds)
    {
        $hours = $seconds / 3600;

        return sprintf("%d hours", $hours);
    }

    public function sumByDate($when)
    {
        $sum = 0;
        $timeWhen = strtotime($when);

        foreach ($this->timeEntries as $entry)
        {
            $sum += ($entry->getWhen() === $timeWhen) ? $entry->getTime() : 0;
        }

        return $this->formatDuration($sum);
    }
}
