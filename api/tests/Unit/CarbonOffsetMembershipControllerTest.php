<?php

namespace Tests\Unit;

use Tests\TestCase;


class CarbonOffsetMembershipControllerTest extends TestCase
{

    /**
     * A basic test to see Error thrown with Status code when scheduleInMonths is out of range.
     *
     * @return void
     */
    public function testInvalidMonths()
    {
        $response = $this->get('/api/carbon-offset-schedule?subscriptionStartDate=2021-02-07&scheduleInMonths=100');
        $this->assertEquals('{"scheduleInMonths":["The schedule in months must be between 0 and 36."]}', $response->getContent());
        $response->status(400);
    }

    /**
     * A basic test to see Error thrown with Status code when format of subscriptionStartDate is not Y-m-d.
     *
     * @return void
     */
    public function testInvalidStartDate()
    {
        $response = $this->get('/api/carbon-offset-schedule?subscriptionStartDate=2021/02/07&scheduleInMonths=5');
        $this->assertEquals('{"subscriptionStartDate":["The subscription start date does not match the format Y-m-d."]}', $response->getContent());
        $response->status(400);
    }

    /**
     * A basic test the output with scheduleInMonths=5.
     *
     * @return void
     */
    public function testFiveMonthsRequest()
    {
        $response = $this->get('/api/carbon-offset-schedule?subscriptionStartDate=2021-02-07&scheduleInMonths=5');
        $this->assertEquals(json_encode(["2021-03-07", "2021-04-07", "2021-05-07", "2021-06-07", "2021-07-07"]), $response->getContent());
    }

    /**
     * A basic test the output with scheduleInMonths=2.
     *
     * @return void
     */
    public function testTwoMonthsRequest()
    {
        $response = $this->get('/api/carbon-offset-schedule?subscriptionStartDate=2021-02-07&scheduleInMonths=2');
        $this->assertEquals(json_encode(["2021-03-07", "2021-04-07"]), $response->getContent());
    }

    /**
     * A basic test the output with scheduleInMonths=3 and all months don't have same days.
     *
     * @return void
     */
    public function testThreeMonthsRequest()
    {
        $response = $this->get('/api/carbon-offset-schedule?subscriptionStartDate=2021-01-30&scheduleInMonths=3');
        $this->assertEquals(json_encode(["2021-02-28", "2021-03-30", "2021-04-30"]), $response->getContent());
    }

    /**
     * A basic test the output with scheduleInMonths=3 and subscriptionStartDate is from a leap year.
     *
     * @return void
     */
    public function testLeapThreeMonthsRequest()
    {
        $response = $this->get('/api/carbon-offset-schedule?subscriptionStartDate=2020-01-31&scheduleInMonths=3');
        $this->assertEquals(json_encode(["2020-02-29", "2020-03-31", "2020-04-30"]), $response->getContent());
    }

    /**
     * A basic test to return empty when scheduleInMonths=0.
     *
     * @return void
     */
    public function testNoMonthsRequest()
    {
        $response = $this->get('/api/carbon-offset-schedule?subscriptionStartDate=2021-02-10&scheduleInMonths=0');
        $this->assertEquals(json_encode([]), $response->getContent());
    }
}
