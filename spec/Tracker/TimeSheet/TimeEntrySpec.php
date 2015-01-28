<?php

namespace spec\Tracker\TimeSheet;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TimeEntrySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('8 hours', 'yesterday');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Tracker\TimeSheet\TimeEntry');
    }

    function it_can_say_its_time_in_seconds()
    {
        $this->getTime()->shouldBe(28800);
    }

    function it_can_say_its_date_in_seconds()
    {
        $this->getWhen()->shouldBe(strtotime('yesterday'));
    }
}
