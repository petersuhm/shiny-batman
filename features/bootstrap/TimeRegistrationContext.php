<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;

class TimeRegistrationContext implements Context, SnippetAcceptingContext
{

    /**
     * @Given a client named :name
     */
    public function aClientNamed($name)
    {
        throw new PendingException();
    }

    /**
     * @When I track|tracked :time :when for the client
     */
    public function iTrackTimeForTheClient($time, $when)
    {
        throw new PendingException();
    }

    /**
     * @Then my time sheet for the client should contain :time:
     */
    public function myTimeSheetForTheClientShouldContainTime($time, TableNode $table)
    {
        throw new PendingException();
    }
}
