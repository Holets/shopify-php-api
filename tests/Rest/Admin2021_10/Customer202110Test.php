<?php

declare(strict_types=1);

namespace ShopifyTest\Rest;

use Shopify\Auth\Session;
use Shopify\Context;
use Shopify\Rest\Customer;
use ShopifyTest\BaseTestCase;
use ShopifyTest\Clients\MockRequest;

final class Customer202110Test extends BaseTestCase
{
    /** @var Session */
    private $test_session;

    public function setUp(): void
    {
        parent::setUp();

        Context::$API_VERSION = "2021-10";

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
                  ["customers" => [["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-03-08T11:14:28-05:00", "updated_at" => "2022-03-08T11:14:28-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "addresses" => [["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]], "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/customers.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        Customer::all(
            $this->test_session,
            [],
            [],
        );
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
                  ["customers" => [["id" => 1073339464, "email" => "steve.lastnameson@example.com", "accepts_marketing" => false, "created_at" => "2022-03-08T11:14:59-05:00", "updated_at" => "2022-03-08T11:14:59-05:00", "first_name" => "Steve", "last_name" => "Lastnameson", "orders_count" => 0, "state" => "disabled", "total_spent" => "0.00", "last_order_id" => null, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 15142546011", "tags" => "", "last_order_name" => null, "currency" => "USD", "addresses" => [["id" => 1053317293, "customer_id" => 1073339464, "first_name" => "Mother", "last_name" => "Lastnameson", "company" => null, "address1" => "123 Oak St", "address2" => null, "city" => "Ottawa", "province" => "Ontario", "country" => "Canada", "zip" => "123 ABC", "phone" => "555-1212", "name" => "Mother Lastnameson", "province_code" => "ON", "country_code" => "CA", "country_name" => "Canada", "default" => true]], "accepts_marketing_updated_at" => "2022-03-08T11:14:59-05:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "admin_graphql_api_id" => "gid://shopify/Customer/1073339464", "default_address" => ["id" => 1053317293, "customer_id" => 1073339464, "first_name" => "Mother", "last_name" => "Lastnameson", "company" => null, "address1" => "123 Oak St", "address2" => null, "city" => "Ottawa", "province" => "Ontario", "country" => "Canada", "zip" => "123 ABC", "phone" => "555-1212", "name" => "Mother Lastnameson", "province_code" => "ON", "country_code" => "CA", "country_name" => "Canada", "default" => true]]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/customers.json?since_id=207119551",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        Customer::all(
            $this->test_session,
            [],
            ["since_id" => "207119551"],
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
                  ["customers" => [["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-03-08T11:15:05-05:00", "updated_at" => "2022-03-08T11:15:05-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "addresses" => [["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]], "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/customers.json?updated_at_min=2022-03-07+16%3A15%3A22",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        Customer::all(
            $this->test_session,
            [],
            ["updated_at_min" => "2022-03-07 16:15:22"],
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
                  ["customers" => [["id" => 1073339465, "email" => "steve.lastnameson@example.com", "accepts_marketing" => false, "created_at" => "2022-03-08T11:15:35-05:00", "updated_at" => "2022-03-08T11:15:35-05:00", "first_name" => "Steve", "last_name" => "Lastnameson", "orders_count" => 0, "state" => "disabled", "total_spent" => "0.00", "last_order_id" => null, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 15142546011", "tags" => "", "last_order_name" => null, "currency" => "USD", "addresses" => [["id" => 1053317294, "customer_id" => 1073339465, "first_name" => "Mother", "last_name" => "Lastnameson", "company" => null, "address1" => "123 Oak St", "address2" => null, "city" => "Ottawa", "province" => "Ontario", "country" => "Canada", "zip" => "123 ABC", "phone" => "555-1212", "name" => "Mother Lastnameson", "province_code" => "ON", "country_code" => "CA", "country_name" => "Canada", "default" => true]], "accepts_marketing_updated_at" => "2022-03-08T11:15:35-05:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "admin_graphql_api_id" => "gid://shopify/Customer/1073339465", "default_address" => ["id" => 1053317294, "customer_id" => 1073339465, "first_name" => "Mother", "last_name" => "Lastnameson", "company" => null, "address1" => "123 Oak St", "address2" => null, "city" => "Ottawa", "province" => "Ontario", "country" => "Canada", "zip" => "123 ABC", "phone" => "555-1212", "name" => "Mother Lastnameson", "province_code" => "ON", "country_code" => "CA", "country_name" => "Canada", "default" => true]], ["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-03-08T11:15:25-05:00", "updated_at" => "2022-03-08T11:15:25-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "addresses" => [["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]], "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/customers.json?ids=207119551%2C1073339465",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        Customer::all(
            $this->test_session,
            [],
            ["ids" => "207119551,1073339465"],
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
                  ["customer" => ["id" => 1073339466, "email" => "steve.lastnameson@example.com", "accepts_marketing" => false, "created_at" => "2022-03-08T11:16:42-05:00", "updated_at" => "2022-03-08T11:16:42-05:00", "first_name" => "Steve", "last_name" => "Lastnameson", "orders_count" => 0, "state" => "disabled", "total_spent" => "0.00", "last_order_id" => null, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 15142546011", "tags" => "", "last_order_name" => null, "currency" => "USD", "addresses" => [["id" => 1053317295, "customer_id" => 1073339466, "first_name" => "Mother", "last_name" => "Lastnameson", "company" => null, "address1" => "123 Oak St", "address2" => null, "city" => "Ottawa", "province" => "Ontario", "country" => "Canada", "zip" => "123 ABC", "phone" => "555-1212", "name" => "Mother Lastnameson", "province_code" => "ON", "country_code" => "CA", "country_name" => "Canada", "default" => true]], "accepts_marketing_updated_at" => "2022-03-08T11:16:42-05:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "sms_marketing_consent" => ["state" => "not_subscribed", "opt_in_level" => "single_opt_in", "consent_updated_at" => null, "consent_collected_from" => "OTHER"], "admin_graphql_api_id" => "gid://shopify/Customer/1073339466", "default_address" => ["id" => 1053317295, "customer_id" => 1073339466, "first_name" => "Mother", "last_name" => "Lastnameson", "company" => null, "address1" => "123 Oak St", "address2" => null, "city" => "Ottawa", "province" => "Ontario", "country" => "Canada", "zip" => "123 ABC", "phone" => "555-1212", "name" => "Mother Lastnameson", "province_code" => "ON", "country_code" => "CA", "country_name" => "Canada", "default" => true]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/customers.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["customer" => ["first_name" => "Steve", "last_name" => "Lastnameson", "email" => "steve.lastnameson@example.com", "phone" => " 15142546011", "verified_email" => true, "addresses" => [["address1" => "123 Oak St", "city" => "Ottawa", "province" => "ON", "phone" => "555-1212", "zip" => "123 ABC", "last_name" => "Lastnameson", "first_name" => "Mother", "country" => "CA"]]]]),
            ),
        ]);

        $customer = new Customer($this->test_session);
        $customer->first_name = "Steve";
        $customer->last_name = "Lastnameson";
        $customer->email = "steve.lastnameson@example.com";
        $customer->phone = " 15142546011";
        $customer->verified_email = true;
        $customer->addresses = [
            [
                "address1" => "123 Oak St",
                "city" => "Ottawa",
                "province" => "ON",
                "phone" => "555-1212",
                "zip" => "123 ABC",
                "last_name" => "Lastnameson",
                "first_name" => "Mother",
                "country" => "CA"
            ]
        ];
        $customer->save();
    }

    /**

     *
     * @return void
     */
    public function test_6(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["customer" => ["id" => 1073339467, "email" => "steve.lastnameson@example.com", "accepts_marketing" => false, "created_at" => "2022-03-08T11:17:03-05:00", "updated_at" => "2022-03-08T11:17:03-05:00", "first_name" => "Steve", "last_name" => "Lastnameson", "orders_count" => 0, "state" => "disabled", "total_spent" => "0.00", "last_order_id" => null, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 15142546011", "tags" => "", "last_order_name" => null, "currency" => "USD", "addresses" => [["id" => 1053317296, "customer_id" => 1073339467, "first_name" => "Mother", "last_name" => "Lastnameson", "company" => null, "address1" => "123 Oak St", "address2" => null, "city" => "Ottawa", "province" => "Ontario", "country" => "Canada", "zip" => "123 ABC", "phone" => "555-1212", "name" => "Mother Lastnameson", "province_code" => "ON", "country_code" => "CA", "country_name" => "Canada", "default" => true]], "accepts_marketing_updated_at" => "2022-03-08T11:17:03-05:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "sms_marketing_consent" => ["state" => "not_subscribed", "opt_in_level" => "single_opt_in", "consent_updated_at" => null, "consent_collected_from" => "OTHER"], "admin_graphql_api_id" => "gid://shopify/Customer/1073339467", "default_address" => ["id" => 1053317296, "customer_id" => 1073339467, "first_name" => "Mother", "last_name" => "Lastnameson", "company" => null, "address1" => "123 Oak St", "address2" => null, "city" => "Ottawa", "province" => "Ontario", "country" => "Canada", "zip" => "123 ABC", "phone" => "555-1212", "name" => "Mother Lastnameson", "province_code" => "ON", "country_code" => "CA", "country_name" => "Canada", "default" => true]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/customers.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["customer" => ["first_name" => "Steve", "last_name" => "Lastnameson", "email" => "steve.lastnameson@example.com", "phone" => " 15142546011", "verified_email" => true, "addresses" => [["address1" => "123 Oak St", "city" => "Ottawa", "province" => "ON", "phone" => "555-1212", "zip" => "123 ABC", "last_name" => "Lastnameson", "first_name" => "Mother", "country" => "CA"]], "metafields" => [["key" => "new", "value" => "newvalue", "value_type" => "string", "namespace" => "global"]]]]),
            ),
        ]);

        $customer = new Customer($this->test_session);
        $customer->first_name = "Steve";
        $customer->last_name = "Lastnameson";
        $customer->email = "steve.lastnameson@example.com";
        $customer->phone = " 15142546011";
        $customer->verified_email = true;
        $customer->addresses = [
            [
                "address1" => "123 Oak St",
                "city" => "Ottawa",
                "province" => "ON",
                "phone" => "555-1212",
                "zip" => "123 ABC",
                "last_name" => "Lastnameson",
                "first_name" => "Mother",
                "country" => "CA"
            ]
        ];
        $customer->metafields = [
            [
                "key" => "new",
                "value" => "newvalue",
                "value_type" => "string",
                "namespace" => "global"
            ]
        ];
        $customer->save();
    }

    /**

     *
     * @return void
     */
    public function test_7(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["customer" => ["id" => 1073339468, "email" => "steve.lastnameson@example.com", "accepts_marketing" => false, "created_at" => "2022-03-08T11:17:12-05:00", "updated_at" => "2022-03-08T11:17:12-05:00", "first_name" => "Steve", "last_name" => "Lastnameson", "orders_count" => 0, "state" => "disabled", "total_spent" => "0.00", "last_order_id" => null, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 15142546011", "tags" => "", "last_order_name" => null, "currency" => "USD", "addresses" => [["id" => 1053317297, "customer_id" => 1073339468, "first_name" => "Mother", "last_name" => "Lastnameson", "company" => null, "address1" => "123 Oak St", "address2" => null, "city" => "Ottawa", "province" => "Ontario", "country" => "Canada", "zip" => "123 ABC", "phone" => "555-1212", "name" => "Mother Lastnameson", "province_code" => "ON", "country_code" => "CA", "country_name" => "Canada", "default" => true]], "accepts_marketing_updated_at" => "2022-03-08T11:17:12-05:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "sms_marketing_consent" => ["state" => "not_subscribed", "opt_in_level" => "single_opt_in", "consent_updated_at" => null, "consent_collected_from" => "OTHER"], "admin_graphql_api_id" => "gid://shopify/Customer/1073339468", "default_address" => ["id" => 1053317297, "customer_id" => 1073339468, "first_name" => "Mother", "last_name" => "Lastnameson", "company" => null, "address1" => "123 Oak St", "address2" => null, "city" => "Ottawa", "province" => "Ontario", "country" => "Canada", "zip" => "123 ABC", "phone" => "555-1212", "name" => "Mother Lastnameson", "province_code" => "ON", "country_code" => "CA", "country_name" => "Canada", "default" => true]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/customers.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["customer" => ["first_name" => "Steve", "last_name" => "Lastnameson", "email" => "steve.lastnameson@example.com", "phone" => " 15142546011", "verified_email" => true, "addresses" => [["address1" => "123 Oak St", "city" => "Ottawa", "province" => "ON", "phone" => "555-1212", "zip" => "123 ABC", "last_name" => "Lastnameson", "first_name" => "Mother", "country" => "CA"]], "send_email_invite" => true]]),
            ),
        ]);

        $customer = new Customer($this->test_session);
        $customer->first_name = "Steve";
        $customer->last_name = "Lastnameson";
        $customer->email = "steve.lastnameson@example.com";
        $customer->phone = " 15142546011";
        $customer->verified_email = true;
        $customer->addresses = [
            [
                "address1" => "123 Oak St",
                "city" => "Ottawa",
                "province" => "ON",
                "phone" => "555-1212",
                "zip" => "123 ABC",
                "last_name" => "Lastnameson",
                "first_name" => "Mother",
                "country" => "CA"
            ]
        ];
        $customer->send_email_invite = true;
        $customer->save();
    }

    /**

     *
     * @return void
     */
    public function test_8(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["customer" => ["id" => 1073339469, "email" => "steve.lastnameson@example.com", "accepts_marketing" => false, "created_at" => "2022-03-08T11:17:24-05:00", "updated_at" => "2022-03-08T11:17:24-05:00", "first_name" => "Steve", "last_name" => "Lastnameson", "orders_count" => 0, "state" => "enabled", "total_spent" => "0.00", "last_order_id" => null, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 15142546011", "tags" => "", "last_order_name" => null, "currency" => "USD", "addresses" => [["id" => 1053317298, "customer_id" => 1073339469, "first_name" => "Mother", "last_name" => "Lastnameson", "company" => null, "address1" => "123 Oak St", "address2" => null, "city" => "Ottawa", "province" => "Ontario", "country" => "Canada", "zip" => "123 ABC", "phone" => "555-1212", "name" => "Mother Lastnameson", "province_code" => "ON", "country_code" => "CA", "country_name" => "Canada", "default" => true]], "accepts_marketing_updated_at" => "2022-03-08T11:17:24-05:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "sms_marketing_consent" => ["state" => "not_subscribed", "opt_in_level" => "single_opt_in", "consent_updated_at" => null, "consent_collected_from" => "OTHER"], "admin_graphql_api_id" => "gid://shopify/Customer/1073339469", "default_address" => ["id" => 1053317298, "customer_id" => 1073339469, "first_name" => "Mother", "last_name" => "Lastnameson", "company" => null, "address1" => "123 Oak St", "address2" => null, "city" => "Ottawa", "province" => "Ontario", "country" => "Canada", "zip" => "123 ABC", "phone" => "555-1212", "name" => "Mother Lastnameson", "province_code" => "ON", "country_code" => "CA", "country_name" => "Canada", "default" => true]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/customers.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["customer" => ["first_name" => "Steve", "last_name" => "Lastnameson", "email" => "steve.lastnameson@example.com", "phone" => " 15142546011", "verified_email" => true, "addresses" => [["address1" => "123 Oak St", "city" => "Ottawa", "province" => "ON", "phone" => "555-1212", "zip" => "123 ABC", "last_name" => "Lastnameson", "first_name" => "Mother", "country" => "CA"]], "password" => "newpass", "password_confirmation" => "newpass", "send_email_welcome" => false]]),
            ),
        ]);

        $customer = new Customer($this->test_session);
        $customer->first_name = "Steve";
        $customer->last_name = "Lastnameson";
        $customer->email = "steve.lastnameson@example.com";
        $customer->phone = " 15142546011";
        $customer->verified_email = true;
        $customer->addresses = [
            [
                "address1" => "123 Oak St",
                "city" => "Ottawa",
                "province" => "ON",
                "phone" => "555-1212",
                "zip" => "123 ABC",
                "last_name" => "Lastnameson",
                "first_name" => "Mother",
                "country" => "CA"
            ]
        ];
        $customer->password = "newpass";
        $customer->password_confirmation = "newpass";
        $customer->send_email_welcome = false;
        $customer->save();
    }

    /**

     *
     * @return void
     */
    public function test_9(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["customers" => [["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-03-08T11:16:02-05:00", "updated_at" => "2022-03-08T11:16:02-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "addresses" => [["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]], "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/customers/search.json?query=Bob+country%3AUnited+States",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        Customer::search(
            $this->test_session,
            [],
            ["query" => "Bob country:United States"],
        );
    }

    /**

     *
     * @return void
     */
    public function test_10(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["customer" => ["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-03-08T11:16:22-05:00", "updated_at" => "2022-03-08T11:16:22-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "addresses" => [["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]], "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "sms_marketing_consent" => null, "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/customers/207119551.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        Customer::find(
            $this->test_session,
            207119551,
            [],
            [],
        );
    }

    /**

     *
     * @return void
     */
    public function test_11(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["customer" => ["id" => 207119551, "email" => "changed@email.address.com", "note" => "Customer is a great guy", "first_name" => "Bob", "last_name" => "Norman", "phone" => " 16136120707", "accepts_marketing" => false, "created_at" => "2022-03-08T11:18:16-05:00", "updated_at" => "2022-03-08T11:18:25-05:00", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "addresses" => [["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]], "accepts_marketing_updated_at" => "2022-03-08T11:18:25-05:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "sms_marketing_consent" => ["state" => "not_subscribed", "opt_in_level" => "single_opt_in", "consent_updated_at" => null, "consent_collected_from" => "OTHER"], "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/customers/207119551.json",
                "PUT",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["customer" => ["id" => 207119551, "email" => "changed@email.address.com", "note" => "Customer is a great guy"]]),
            ),
        ]);

        $customer = new Customer($this->test_session);
        $customer->id = 207119551;
        $customer->email = "changed@email.address.com";
        $customer->note = "Customer is a great guy";
        $customer->save();
    }

    /**

     *
     * @return void
     */
    public function test_12(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["customer" => ["email" => "bob.norman@hostmail.com", "first_name" => "Bob", "last_name" => "Norman", "id" => 207119551, "phone" => " 16136120707", "accepts_marketing" => false, "created_at" => "2022-03-08T11:18:25-05:00", "updated_at" => "2022-03-08T11:18:36-05:00", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "addresses" => [["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]], "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "sms_marketing_consent" => ["state" => "not_subscribed", "opt_in_level" => "single_opt_in", "consent_updated_at" => null, "consent_collected_from" => "OTHER"], "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/customers/207119551.json",
                "PUT",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["customer" => ["id" => 207119551, "metafields" => [["key" => "new", "value" => "newvalue", "value_type" => "string", "namespace" => "global"]]]]),
            ),
        ]);

        $customer = new Customer($this->test_session);
        $customer->id = 207119551;
        $customer->metafields = [
            [
                "key" => "new",
                "value" => "newvalue",
                "value_type" => "string",
                "namespace" => "global"
            ]
        ];
        $customer->save();
    }

    /**

     *
     * @return void
     */
    public function test_13(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["customer" => ["email" => "bob.norman@hostmail.com", "first_name" => "Bob", "last_name" => "Norman", "id" => 207119551, "phone" => " 16136120707", "accepts_marketing" => false, "created_at" => "2022-03-08T11:18:36-05:00", "updated_at" => "2022-03-08T11:18:45-05:00", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "tags" => "New Customer, Repeat Customer", "last_order_name" => "#1001", "currency" => "USD", "addresses" => [["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]], "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "sms_marketing_consent" => ["state" => "not_subscribed", "opt_in_level" => "single_opt_in", "consent_updated_at" => null, "consent_collected_from" => "OTHER"], "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/customers/207119551.json",
                "PUT",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["customer" => ["id" => 207119551, "tags" => "New Customer, Repeat Customer"]]),
            ),
        ]);

        $customer = new Customer($this->test_session);
        $customer->id = 207119551;
        $customer->tags = "New Customer, Repeat Customer";
        $customer->save();
    }

    /**

     *
     * @return void
     */
    public function test_14(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["customer" => ["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => true, "created_at" => "2022-03-08T11:18:45-05:00", "updated_at" => "2022-03-08T11:18:56-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "addresses" => [["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]], "accepts_marketing_updated_at" => "2022-03-05T11:18:55-05:00", "marketing_opt_in_level" => "confirmed_opt_in", "tax_exemptions" => [], "sms_marketing_consent" => ["state" => "not_subscribed", "opt_in_level" => "single_opt_in", "consent_updated_at" => null, "consent_collected_from" => "OTHER"], "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/customers/207119551.json",
                "PUT",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["customer" => ["id" => 207119551, "accepts_marketing" => true, "accepts_marketing_updated_at" => "2022-03-05T11:18:55-05:00", "marketing_opt_in_level" => "confirmed_opt_in"]]),
            ),
        ]);

        $customer = new Customer($this->test_session);
        $customer->id = 207119551;
        $customer->accepts_marketing = true;
        $customer->accepts_marketing_updated_at = "2022-03-05T11:18:55-05:00";
        $customer->marketing_opt_in_level = "confirmed_opt_in";
        $customer->save();
    }

    /**

     *
     * @return void
     */
    public function test_15(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["account_activation_url" => "https://jsmith.myshopify.com/account/activate/207119551/b323fb6131118cde38a2bd47a7232425-1646756388"]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/customers/207119551/account_activation_url.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        $customer = new Customer($this->test_session);
        $customer->id = 207119551;
        $customer->account_activation_url(
            [],
        );
    }

    /**

     *
     * @return void
     */
    public function test_16(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["customer_invite" => ["to" => "bob.norman@hostmail.com", "from" => "j.smith@example.com", "subject" => "Customer account activation", "custom_message" => "", "bcc" => []]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/customers/207119551/send_invite.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["customer_invite" => []]),
            ),
        ]);

        $customer = new Customer($this->test_session);
        $customer->id = 207119551;
        $customer->send_invite(
            [],
            ["customer_invite" => []],
        );
    }

    /**

     *
     * @return void
     */
    public function test_17(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["customer_invite" => ["to" => "new_test_email@shopify.com", "from" => "j.limited@example.com", "subject" => "Welcome to my new shop", "custom_message" => "My awesome new store", "bcc" => ["j.limited@example.com"]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/customers/207119551/send_invite.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["customer_invite" => ["to" => "new_test_email@shopify.com", "from" => "j.limited@example.com", "bcc" => ["j.limited@example.com"], "subject" => "Welcome to my new shop", "custom_message" => "My awesome new store"]]),
            ),
        ]);

        $customer = new Customer($this->test_session);
        $customer->id = 207119551;
        $customer->send_invite(
            [],
            ["customer_invite" => ["to" => "new_test_email@shopify.com", "from" => "j.limited@example.com", "bcc" => ["j.limited@example.com"], "subject" => "Welcome to my new shop", "custom_message" => "My awesome new store"]],
        );
    }

    /**

     *
     * @return void
     */
    public function test_18(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["count" => 1]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/customers/count.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        Customer::count(
            $this->test_session,
            [],
            [],
        );
    }

    /**

     *
     * @return void
     */
    public function test_19(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["orders" => [["id" => 450789469, "admin_graphql_api_id" => "gid://shopify/Order/450789469", "app_id" => null, "browser_ip" => "0.0.0.0", "buyer_accepts_marketing" => false, "cancel_reason" => null, "cancelled_at" => null, "cart_token" => "68778783ad298f1c80c3bafcddeea02f", "checkout_id" => 901414060, "checkout_token" => "bd5a8aa1ecd019dd3520ff791ee3a24c", "client_details" => ["accept_language" => null, "browser_height" => null, "browser_ip" => "0.0.0.0", "browser_width" => null, "session_hash" => null, "user_agent" => null], "closed_at" => null, "confirmed" => true, "contact_email" => "bob.norman@hostmail.com", "created_at" => "2008-01-10T11:00:00-05:00", "currency" => "USD", "current_subtotal_price" => "195.67", "current_subtotal_price_set" => ["shop_money" => ["amount" => "195.67", "currency_code" => "USD"], "presentment_money" => ["amount" => "195.67", "currency_code" => "USD"]], "current_total_discounts" => "3.33", "current_total_discounts_set" => ["shop_money" => ["amount" => "3.33", "currency_code" => "USD"], "presentment_money" => ["amount" => "3.33", "currency_code" => "USD"]], "current_total_duties_set" => null, "current_total_price" => "199.65", "current_total_price_set" => ["shop_money" => ["amount" => "199.65", "currency_code" => "USD"], "presentment_money" => ["amount" => "199.65", "currency_code" => "USD"]], "current_total_tax" => "3.98", "current_total_tax_set" => ["shop_money" => ["amount" => "3.98", "currency_code" => "USD"], "presentment_money" => ["amount" => "3.98", "currency_code" => "USD"]], "customer_locale" => null, "device_id" => null, "discount_codes" => [["code" => "TENOFF", "amount" => "10.00", "type" => "fixed_amount"]], "email" => "bob.norman@hostmail.com", "estimated_taxes" => false, "financial_status" => "partially_refunded", "fulfillment_status" => null, "gateway" => "authorize_net", "landing_site" => "http://www.example.com?source=abc", "landing_site_ref" => "abc", "location_id" => null, "name" => "#1001", "note" => null, "note_attributes" => [["name" => "custom engraving", "value" => "Happy Birthday"], ["name" => "colour", "value" => "green"]], "number" => 1, "order_number" => 1001, "order_status_url" => "https://jsmith.myshopify.com/548380009/orders/b1946ac92492d2347c6235b4d2611184/authenticate?key=imasecretipod", "original_total_duties_set" => null, "payment_gateway_names" => ["bogus"], "phone" => " 557734881234", "presentment_currency" => "USD", "processed_at" => "2008-01-10T11:00:00-05:00", "processing_method" => "direct", "reference" => "fhwdgads", "referring_site" => "http://www.otherexample.com", "source_identifier" => "fhwdgads", "source_name" => "web", "source_url" => null, "subtotal_price" => "597.00", "subtotal_price_set" => ["shop_money" => ["amount" => "597.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "597.00", "currency_code" => "USD"]], "tags" => "", "tax_lines" => [["price" => "11.94", "rate" => 0.06, "title" => "State Tax", "price_set" => ["shop_money" => ["amount" => "11.94", "currency_code" => "USD"], "presentment_money" => ["amount" => "11.94", "currency_code" => "USD"]], "channel_liable" => null]], "taxes_included" => false, "test" => false, "token" => "b1946ac92492d2347c6235b4d2611184", "total_discounts" => "10.00", "total_discounts_set" => ["shop_money" => ["amount" => "10.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "10.00", "currency_code" => "USD"]], "total_line_items_price" => "597.00", "total_line_items_price_set" => ["shop_money" => ["amount" => "597.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "597.00", "currency_code" => "USD"]], "total_outstanding" => "0.00", "total_price" => "598.94", "total_price_set" => ["shop_money" => ["amount" => "598.94", "currency_code" => "USD"], "presentment_money" => ["amount" => "598.94", "currency_code" => "USD"]], "total_price_usd" => "598.94", "total_shipping_price_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "total_tax" => "11.94", "total_tax_set" => ["shop_money" => ["amount" => "11.94", "currency_code" => "USD"], "presentment_money" => ["amount" => "11.94", "currency_code" => "USD"]], "total_tip_received" => "0.00", "total_weight" => 0, "updated_at" => "2008-01-10T11:00:00-05:00", "user_id" => null, "billing_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "customer" => ["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-03-08T11:20:44-05:00", "updated_at" => "2022-03-08T11:20:44-05:00", "first_name" => "Bob", "last_name" => "Norman", "state" => "disabled", "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "currency" => "USD", "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "sms_marketing_consent" => null, "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]], "discount_applications" => [["target_type" => "line_item", "type" => "discount_code", "value" => "10.0", "value_type" => "fixed_amount", "allocation_method" => "across", "target_selection" => "all", "code" => "TENOFF"]], "fulfillments" => [["id" => 255858046, "admin_graphql_api_id" => "gid://shopify/Fulfillment/255858046", "created_at" => "2022-03-08T11:20:44-05:00", "location_id" => 655441491, "name" => "#1001.0", "order_id" => 450789469, "origin_address" => [], "receipt" => ["testcase" => true, "authorization" => "123456"], "service" => "manual", "shipment_status" => null, "status" => "failure", "tracking_company" => "USPS", "tracking_number" => "1Z2345", "tracking_numbers" => ["1Z2345"], "tracking_url" => "https://tools.usps.com/go/TrackConfirmAction_input?qtc_tLabels1=1Z2345", "tracking_urls" => ["https://tools.usps.com/go/TrackConfirmAction_input?qtc_tLabels1=1Z2345"], "updated_at" => "2022-03-08T11:20:44-05:00", "line_items" => [["id" => 466157049, "admin_graphql_api_id" => "gid://shopify/LineItem/466157049", "fulfillable_quantity" => 0, "fulfillment_service" => "manual", "fulfillment_status" => null, "gift_card" => false, "grams" => 200, "name" => "IPod Nano - 8gb - green", "price" => "199.00", "price_set" => ["shop_money" => ["amount" => "199.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "199.00", "currency_code" => "USD"]], "product_exists" => true, "product_id" => 632910392, "properties" => [["name" => "Custom Engraving Front", "value" => "Happy Birthday"], ["name" => "Custom Engraving Back", "value" => "Merry Christmas"]], "quantity" => 1, "requires_shipping" => true, "sku" => "IPOD2008GREEN", "taxable" => true, "title" => "IPod Nano - 8gb", "total_discount" => "0.00", "total_discount_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "variant_id" => 39072856, "variant_inventory_management" => "shopify", "variant_title" => "green", "vendor" => null, "tax_lines" => [["channel_liable" => null, "price" => "3.98", "price_set" => ["shop_money" => ["amount" => "3.98", "currency_code" => "USD"], "presentment_money" => ["amount" => "3.98", "currency_code" => "USD"]], "rate" => 0.06, "title" => "State Tax"]], "duties" => [], "discount_allocations" => [["amount" => "3.34", "amount_set" => ["shop_money" => ["amount" => "3.34", "currency_code" => "USD"], "presentment_money" => ["amount" => "3.34", "currency_code" => "USD"]], "discount_application_index" => 0]]]]]], "line_items" => [["id" => 466157049, "admin_graphql_api_id" => "gid://shopify/LineItem/466157049", "fulfillable_quantity" => 0, "fulfillment_service" => "manual", "fulfillment_status" => null, "gift_card" => false, "grams" => 200, "name" => "IPod Nano - 8gb - green", "price" => "199.00", "price_set" => ["shop_money" => ["amount" => "199.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "199.00", "currency_code" => "USD"]], "product_exists" => true, "product_id" => 632910392, "properties" => [["name" => "Custom Engraving Front", "value" => "Happy Birthday"], ["name" => "Custom Engraving Back", "value" => "Merry Christmas"]], "quantity" => 1, "requires_shipping" => true, "sku" => "IPOD2008GREEN", "taxable" => true, "title" => "IPod Nano - 8gb", "total_discount" => "0.00", "total_discount_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "variant_id" => 39072856, "variant_inventory_management" => "shopify", "variant_title" => "green", "vendor" => null, "tax_lines" => [["channel_liable" => null, "price" => "3.98", "price_set" => ["shop_money" => ["amount" => "3.98", "currency_code" => "USD"], "presentment_money" => ["amount" => "3.98", "currency_code" => "USD"]], "rate" => 0.06, "title" => "State Tax"]], "duties" => [], "discount_allocations" => [["amount" => "3.34", "amount_set" => ["shop_money" => ["amount" => "3.34", "currency_code" => "USD"], "presentment_money" => ["amount" => "3.34", "currency_code" => "USD"]], "discount_application_index" => 0]]], ["id" => 518995019, "admin_graphql_api_id" => "gid://shopify/LineItem/518995019", "fulfillable_quantity" => 1, "fulfillment_service" => "manual", "fulfillment_status" => null, "gift_card" => false, "grams" => 200, "name" => "IPod Nano - 8gb - red", "price" => "199.00", "price_set" => ["shop_money" => ["amount" => "199.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "199.00", "currency_code" => "USD"]], "product_exists" => true, "product_id" => 632910392, "properties" => [], "quantity" => 1, "requires_shipping" => true, "sku" => "IPOD2008RED", "taxable" => true, "title" => "IPod Nano - 8gb", "total_discount" => "0.00", "total_discount_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "variant_id" => 49148385, "variant_inventory_management" => "shopify", "variant_title" => "red", "vendor" => null, "tax_lines" => [["channel_liable" => null, "price" => "3.98", "price_set" => ["shop_money" => ["amount" => "3.98", "currency_code" => "USD"], "presentment_money" => ["amount" => "3.98", "currency_code" => "USD"]], "rate" => 0.06, "title" => "State Tax"]], "duties" => [], "discount_allocations" => [["amount" => "3.33", "amount_set" => ["shop_money" => ["amount" => "3.33", "currency_code" => "USD"], "presentment_money" => ["amount" => "3.33", "currency_code" => "USD"]], "discount_application_index" => 0]]], ["id" => 703073504, "admin_graphql_api_id" => "gid://shopify/LineItem/703073504", "fulfillable_quantity" => 0, "fulfillment_service" => "manual", "fulfillment_status" => null, "gift_card" => false, "grams" => 200, "name" => "IPod Nano - 8gb - black", "price" => "199.00", "price_set" => ["shop_money" => ["amount" => "199.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "199.00", "currency_code" => "USD"]], "product_exists" => true, "product_id" => 632910392, "properties" => [], "quantity" => 1, "requires_shipping" => true, "sku" => "IPOD2008BLACK", "taxable" => true, "title" => "IPod Nano - 8gb", "total_discount" => "0.00", "total_discount_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "variant_id" => 457924702, "variant_inventory_management" => "shopify", "variant_title" => "black", "vendor" => null, "tax_lines" => [["channel_liable" => null, "price" => "3.98", "price_set" => ["shop_money" => ["amount" => "3.98", "currency_code" => "USD"], "presentment_money" => ["amount" => "3.98", "currency_code" => "USD"]], "rate" => 0.06, "title" => "State Tax"]], "duties" => [], "discount_allocations" => [["amount" => "3.33", "amount_set" => ["shop_money" => ["amount" => "3.33", "currency_code" => "USD"], "presentment_money" => ["amount" => "3.33", "currency_code" => "USD"]], "discount_application_index" => 0]]]], "payment_details" => ["credit_card_bin" => null, "avs_result_code" => null, "cvv_result_code" => null, "credit_card_number" => "\u2022\u2022\u2022\u2022 \u2022\u2022\u2022\u2022 \u2022\u2022\u2022\u2022 4242", "credit_card_company" => "Visa", "credit_card_name" => null, "credit_card_wallet" => null, "credit_card_expiration_month" => null, "credit_card_expiration_year" => null], "refunds" => [["id" => 509562969, "admin_graphql_api_id" => "gid://shopify/Refund/509562969", "created_at" => "2022-03-08T11:20:44-05:00", "note" => "it broke during shipping", "order_id" => 450789469, "processed_at" => "2022-03-08T11:20:44-05:00", "restock" => true, "total_additional_fees_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "total_duties_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "user_id" => 548380009, "order_adjustments" => [], "transactions" => [["id" => 179259969, "admin_graphql_api_id" => "gid://shopify/OrderTransaction/179259969", "amount" => "209.00", "authorization" => "authorization-key", "created_at" => "2005-08-05T12:59:12-04:00", "currency" => "USD", "device_id" => null, "error_code" => null, "gateway" => "bogus", "kind" => "refund", "location_id" => null, "message" => null, "order_id" => 450789469, "parent_id" => 801038806, "processed_at" => "2005-08-05T12:59:12-04:00", "receipt" => [], "source_name" => "web", "status" => "success", "test" => false, "user_id" => null]], "refund_line_items" => [["id" => 104689539, "line_item_id" => 703073504, "location_id" => 487838322, "quantity" => 1, "restock_type" => "legacy_restock", "subtotal" => 195.66, "subtotal_set" => ["shop_money" => ["amount" => "195.66", "currency_code" => "USD"], "presentment_money" => ["amount" => "195.66", "currency_code" => "USD"]], "total_tax" => 3.98, "total_tax_set" => ["shop_money" => ["amount" => "3.98", "currency_code" => "USD"], "presentment_money" => ["amount" => "3.98", "currency_code" => "USD"]], "line_item" => ["id" => 703073504, "admin_graphql_api_id" => "gid://shopify/LineItem/703073504", "fulfillable_quantity" => 0, "fulfillment_service" => "manual", "fulfillment_status" => null, "gift_card" => false, "grams" => 200, "name" => "IPod Nano - 8gb - black", "price" => "199.00", "price_set" => ["shop_money" => ["amount" => "199.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "199.00", "currency_code" => "USD"]], "product_exists" => true, "product_id" => 632910392, "properties" => [], "quantity" => 1, "requires_shipping" => true, "sku" => "IPOD2008BLACK", "taxable" => true, "title" => "IPod Nano - 8gb", "total_discount" => "0.00", "total_discount_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "variant_id" => 457924702, "variant_inventory_management" => "shopify", "variant_title" => "black", "vendor" => null, "tax_lines" => [["channel_liable" => null, "price" => "3.98", "price_set" => ["shop_money" => ["amount" => "3.98", "currency_code" => "USD"], "presentment_money" => ["amount" => "3.98", "currency_code" => "USD"]], "rate" => 0.06, "title" => "State Tax"]], "duties" => [], "discount_allocations" => [["amount" => "3.33", "amount_set" => ["shop_money" => ["amount" => "3.33", "currency_code" => "USD"], "presentment_money" => ["amount" => "3.33", "currency_code" => "USD"]], "discount_application_index" => 0]]]], ["id" => 709875399, "line_item_id" => 466157049, "location_id" => 487838322, "quantity" => 1, "restock_type" => "legacy_restock", "subtotal" => 195.67, "subtotal_set" => ["shop_money" => ["amount" => "195.67", "currency_code" => "USD"], "presentment_money" => ["amount" => "195.67", "currency_code" => "USD"]], "total_tax" => 3.98, "total_tax_set" => ["shop_money" => ["amount" => "3.98", "currency_code" => "USD"], "presentment_money" => ["amount" => "3.98", "currency_code" => "USD"]], "line_item" => ["id" => 466157049, "admin_graphql_api_id" => "gid://shopify/LineItem/466157049", "fulfillable_quantity" => 0, "fulfillment_service" => "manual", "fulfillment_status" => null, "gift_card" => false, "grams" => 200, "name" => "IPod Nano - 8gb - green", "price" => "199.00", "price_set" => ["shop_money" => ["amount" => "199.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "199.00", "currency_code" => "USD"]], "product_exists" => true, "product_id" => 632910392, "properties" => [["name" => "Custom Engraving Front", "value" => "Happy Birthday"], ["name" => "Custom Engraving Back", "value" => "Merry Christmas"]], "quantity" => 1, "requires_shipping" => true, "sku" => "IPOD2008GREEN", "taxable" => true, "title" => "IPod Nano - 8gb", "total_discount" => "0.00", "total_discount_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "variant_id" => 39072856, "variant_inventory_management" => "shopify", "variant_title" => "green", "vendor" => null, "tax_lines" => [["channel_liable" => null, "price" => "3.98", "price_set" => ["shop_money" => ["amount" => "3.98", "currency_code" => "USD"], "presentment_money" => ["amount" => "3.98", "currency_code" => "USD"]], "rate" => 0.06, "title" => "State Tax"]], "duties" => [], "discount_allocations" => [["amount" => "3.34", "amount_set" => ["shop_money" => ["amount" => "3.34", "currency_code" => "USD"], "presentment_money" => ["amount" => "3.34", "currency_code" => "USD"]], "discount_application_index" => 0]]]]], "duties" => [], "additional_fees" => []]], "shipping_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "shipping_lines" => [["id" => 369256396, "carrier_identifier" => null, "code" => "Free Shipping", "delivery_category" => null, "discounted_price" => "0.00", "discounted_price_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "phone" => null, "price" => "0.00", "price_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "requested_fulfillment_service_id" => null, "source" => "shopify", "title" => "Free Shipping", "tax_lines" => [], "discount_allocations" => []]]]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/customers/207119551/orders.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        Customer::orders(
            $this->test_session,
            207119551,
            [],
            [],
        );
    }

}
