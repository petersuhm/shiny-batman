<?php

namespace Tracker\TimeSheet;

class TimeEntry
{
    protected $time;
    protected $when;

    public function __construct($time, $when)
    {
        $this->time = strtotime($time, 0);
        $this->when = strtotime($when);
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getWhen()
    {
        return $this->when;
    }
}
