<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use PHPUnit_Framework_Assert as PHPUnit;
use Tracker\Client\Client;
use Tracker\TimeSheet;

class TimeRegistrationContext implements Context, SnippetAcceptingContext
{
    protected $client;
    protected $timeSheet;

    /**
     * @Given a client named :name
     */
    public function aClientNamed($name)
    {
        $this->client = Client::named($name);
    }

    /**
     * @When I track(ed) :time :when for the client
     */
    public function iTrackTimeForTheClient($time, $when)
    {
        $this->timeSheet = ($this->timeSheet)
            ?: TimeSheet::forClient($this->client);

        $this->timeSheet->track($time, $when);
    }

    /**
     * @Then my time sheet for the client should contain :time:
     */
    public function myTimeSheetForTheClientShouldContainTime($time, TableNode $table)
    {
        PHPUnit::assertEquals(
            $time,
            $this->timeSheet->sum()
        );

        foreach($table->getRows() as $expectation) {

            $expectedTime = $expectation[0];
            $expectedWhen = $expectation[1];

            PHPUnit::assertEquals(
                $expectedTime,
                $this->timeSheet->sumByDate($expectedWhen)
            );
        }
    }
}
