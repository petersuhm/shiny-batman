<?php

namespace spec\Tracker\Client;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClientSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('named', ['Client Name']);

    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Tracker\Client\Client');
    }
}
