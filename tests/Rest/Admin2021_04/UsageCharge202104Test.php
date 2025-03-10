<?php

declare(strict_types=1);

namespace ShopifyTest\Rest;

use Shopify\Auth\Session;
use Shopify\Context;
use Shopify\Rest\UsageCharge;
use ShopifyTest\BaseTestCase;
use ShopifyTest\Clients\MockRequest;

final class UsageCharge202104Test extends BaseTestCase
{
    /** @var Session */
    private $test_session;

    public function setUp(): void
    {
        parent::setUp();

        Context::$API_VERSION = "2021-04";

        $this->test_session = new Session("session_id", "test-shop.myshopify.io", true, "1234");
        $this->test_session->setAccessToken("this_is_a_test_token");
    }

    /**

     *
     * @return void
     */
    public function test_1(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["usage_charge" => ["id" => 1034618215, "description" => "Super Mega Plan 1000 emails", "price" => "1.00", "created_at" => "2022-02-03T16:42:27-05:00", "billing_on" => null, "balance_used" => 11.0, "balance_remaining" => 89.0, "risk_level" => 0]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-04/recurring_application_charges/455696195/usage_charges.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["usage_charge" => ["description" => "Super Mega Plan 1000 emails", "price" => 1.0]]),
            ),
        ]);

        $usage_charge = new UsageCharge($this->test_session);
        $usage_charge->recurring_application_charge_id = 455696195;
        $usage_charge->description = "Super Mega Plan 1000 emails";
        $usage_charge->price = 1.0;
        $usage_charge->save();
    }

    /**

     *
     * @return void
     */
    public function test_2(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["usage_charges" => [["id" => 1034618218, "description" => "Super Mega Plan Add-ons", "price" => "10.00", "created_at" => "2022-02-03T16:42:30-05:00", "billing_on" => null, "balance_used" => 10.0, "balance_remaining" => 90.0, "risk_level" => 0]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-04/recurring_application_charges/455696195/usage_charges.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        UsageCharge::all(
            $this->test_session,
            ["recurring_application_charge_id" => "455696195"],
            [],
        );
    }

    /**

     *
     * @return void
     */
    public function test_3(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["usage_charge" => ["id" => 1034618217, "description" => "Super Mega Plan Add-ons", "price" => "10.00", "created_at" => "2022-02-03T16:42:29-05:00", "billing_on" => null, "balance_used" => 10.0, "balance_remaining" => 90.0, "risk_level" => 0]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-04/recurring_application_charges/455696195/usage_charges/1034618217.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        UsageCharge::find(
            $this->test_session,
            1034618217,
            ["recurring_application_charge_id" => "455696195"],
            [],
        );
    }

}
