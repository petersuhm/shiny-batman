<?php

namespace spec\Tracker;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Tracker\Client\Client;
use Tracker\TimeSheet\TimeEntry;

class TimeSheetSpec extends ObjectBehavior
{
    function let(Client $client)
    {
        $this->beConstructedThrough('forClient', [$client]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Tracker\TimeSheet');
    }

    function it_can_track_time()
    {
        $entry = $this->track('8 hours', 'yesterday');

        $entry->shouldHaveType(TimeEntry::class);
    }

    function it_can_sum_all_time_entries()
    {
        $this->track('8 hours');
        $this->track('12 hours');

        $this->sum()->shouldReturn('20 hours');
    }

    function it_can_sum_all_time_entries_for_a_date()
    {
        $this->track('8 hours', 'today');
        $this->track('8 hours', 'today');
        $this->track('12 hours', 'yesterday');

        $this->sumByDate('today')->shouldReturn('16 hours');
        $this->sumByDate('yesterday')->shouldReturn('12 hours');
    }

    function it_can_format_a_duration()
    {
        $this->formatDuration(28800)->shouldReturn('8 hours');
    }
}
