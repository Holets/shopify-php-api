<?php

declare(strict_types=1);

namespace ShopifyTest\Rest;

use Shopify\Auth\Session;
use Shopify\Context;
use Shopify\Rest\ApplicationCharge;
use ShopifyTest\BaseTestCase;
use ShopifyTest\Clients\MockRequest;

final class ApplicationCharge202201Test extends BaseTestCase
{
    /** @var Session */
    private $test_session;

    public function setUp(): void
    {
        parent::setUp();

        Context::$API_VERSION = "2022-01";

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
                  ["application_charge" => ["id" => 1017262365, "name" => "Super Duper Expensive action", "api_client_id" => 755357713, "price" => "100.00", "status" => "pending", "return_url" => "http://super-duper.shopifyapps.com/", "test" => null, "created_at" => "2022-02-03T17:00:37-05:00", "updated_at" => "2022-02-03T17:00:37-05:00", "charge_type" => null, "decorated_return_url" => "http://super-duper.shopifyapps.com/?charge_id=1017262365", "confirmation_url" => "https://jsmith.myshopify.com/admin/charges/1017262365/confirm_application_charge?signature=BAh7BzoHaWRpBB0xojw6EmF1dG9fYWN0aXZhdGVU--c65c9a4c3e9f9c78448bd1e8c3cab9a0ac240c86"]]
                )),
                "https://test-shop.myshopify.io/admin/api/2022-01/application_charges.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["application_charge" => ["name" => "Super Duper Expensive action", "price" => 100.0, "return_url" => "http://super-duper.shopifyapps.com"]]),
            ),
        ]);

        $application_charge = new ApplicationCharge($this->test_session);
        $application_charge->name = "Super Duper Expensive action";
        $application_charge->price = 100.0;
        $application_charge->return_url = "http://super-duper.shopifyapps.com";
        $application_charge->save();
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
                  ["application_charge" => ["id" => 1017262366, "name" => "Super Duper Expensive action", "api_client_id" => 755357713, "price" => "100.00", "status" => "pending", "return_url" => "http://super-duper.shopifyapps.com/", "test" => true, "created_at" => "2022-02-03T17:00:39-05:00", "updated_at" => "2022-02-03T17:00:39-05:00", "charge_type" => null, "decorated_return_url" => "http://super-duper.shopifyapps.com/?charge_id=1017262366", "confirmation_url" => "https://jsmith.myshopify.com/admin/charges/1017262366/confirm_application_charge?signature=BAh7BzoHaWRpBB4xojw6EmF1dG9fYWN0aXZhdGVU--ef747ae7283a52e94e47a4b0b3140e348319fe94"]]
                )),
                "https://test-shop.myshopify.io/admin/api/2022-01/application_charges.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["application_charge" => ["name" => "Super Duper Expensive action", "price" => 100.0, "return_url" => "http://super-duper.shopifyapps.com", "test" => true]]),
            ),
        ]);

        $application_charge = new ApplicationCharge($this->test_session);
        $application_charge->name = "Super Duper Expensive action";
        $application_charge->price = 100.0;
        $application_charge->return_url = "http://super-duper.shopifyapps.com";
        $application_charge->test = true;
        $application_charge->save();
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
                  ["application_charge" => ["id" => 675931192, "name" => "iPod Cleaning", "api_client_id" => 755357713, "price" => "5.00", "status" => "accepted", "return_url" => "http://google.com", "test" => null, "created_at" => "2022-02-03T16:53:36-05:00", "updated_at" => "2022-02-03T16:53:36-05:00", "charge_type" => null, "decorated_return_url" => "http://google.com?charge_id=675931192"]]
                )),
                "https://test-shop.myshopify.io/admin/api/2022-01/application_charges/675931192.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        ApplicationCharge::find(
            $this->test_session,
            675931192,
            [],
            [],
        );
    }

    /**

     *
     * @return void
     */
    public function test_4(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["application_charges" => [["id" => 675931192, "name" => "iPod Cleaning", "api_client_id" => 755357713, "price" => "5.00", "status" => "accepted", "return_url" => "http://google.com", "test" => null, "created_at" => "2022-02-03T16:53:36-05:00", "updated_at" => "2022-02-03T16:53:36-05:00", "charge_type" => null, "decorated_return_url" => "http://google.com?charge_id=675931192"], ["id" => 1017262346, "name" => "Create me a logo", "api_client_id" => 755357713, "price" => "123.00", "status" => "accepted", "return_url" => "http://google.com", "test" => null, "created_at" => "2022-02-03T16:53:36-05:00", "updated_at" => "2022-02-03T16:53:36-05:00", "charge_type" => "brokered_service", "decorated_return_url" => "http://google.com?charge_id=1017262346"]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2022-01/application_charges.json?since_id=556467234",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        ApplicationCharge::all(
            $this->test_session,
            [],
            ["since_id" => "556467234"],
        );
    }

    /**

     *
     * @return void
     */
    public function test_5(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["application_charges" => [["id" => 1017262346, "name" => "Create me a logo", "api_client_id" => 755357713, "price" => "123.00", "status" => "accepted", "return_url" => "http://google.com", "test" => null, "created_at" => "2022-02-03T16:53:36-05:00", "updated_at" => "2022-02-03T16:53:36-05:00", "charge_type" => "brokered_service", "decorated_return_url" => "http://google.com?charge_id=1017262346"], ["id" => 556467234, "name" => "Green theme", "api_client_id" => 755357713, "price" => "120.00", "status" => "accepted", "return_url" => "http://google.com", "test" => null, "created_at" => "2022-02-03T16:53:36-05:00", "updated_at" => "2022-02-03T16:53:36-05:00", "charge_type" => "theme", "decorated_return_url" => "http://google.com?charge_id=556467234"], ["id" => 675931192, "name" => "iPod Cleaning", "api_client_id" => 755357713, "price" => "5.00", "status" => "accepted", "return_url" => "http://google.com", "test" => null, "created_at" => "2022-02-03T16:53:36-05:00", "updated_at" => "2022-02-03T16:53:36-05:00", "charge_type" => null, "decorated_return_url" => "http://google.com?charge_id=675931192"]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2022-01/application_charges.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        ApplicationCharge::all(
            $this->test_session,
            [],
            [],
        );
    }

}
