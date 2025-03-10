<?php

declare(strict_types=1);

namespace ShopifyTest\Rest;

use Shopify\Auth\Session;
use Shopify\Context;
use Shopify\Rest\AbandonedCheckout;
use ShopifyTest\BaseTestCase;
use ShopifyTest\Clients\MockRequest;

final class AbandonedCheckout202107Test extends BaseTestCase
{
    /** @var Session */
    private $test_session;

    public function setUp(): void
    {
        parent::setUp();

        Context::$API_VERSION = "2021-07";

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
                  ["checkouts" => [["id" => 450789469, "token" => "2a1ace52255252df566af0faaedfbfa7", "cart_token" => "68778783ad298f1c80c3bafcddeea02f", "email" => "bob.norman@hostmail.com", "gateway" => null, "buyer_accepts_marketing" => false, "created_at" => "2012-10-12T07:05:27-04:00", "updated_at" => "2012-10-12T07:05:27-04:00", "landing_site" => null, "note" => null, "note_attributes" => [["name" => "custom engraving", "value" => "Happy Birthday"], ["name" => "colour", "value" => "green"]], "referring_site" => null, "shipping_lines" => [["title" => "Free Shipping", "price" => "0.00", "code" => "Free Shipping", "source" => "shopify", "applied_discounts" => [], "id" => "5da41c1738454765"]], "taxes_included" => false, "total_weight" => 400, "currency" => "USD", "completed_at" => null, "closed_at" => null, "user_id" => null, "location_id" => null, "source_identifier" => null, "source_url" => null, "device_id" => null, "phone" => null, "customer_locale" => "en", "line_items" => [["applied_discounts" => [], "discount_allocations" => [["id" => null, "amount" => "19.90", "description" => null, "created_at" => null, "application_type" => "discount_code"]], "key" => "87e58d37f62987dc", "destination_location_id" => null, "fulfillment_service" => "manual", "gift_card" => false, "grams" => 200, "origin_location_id" => null, "presentment_title" => "IPod Nano - 8GB", "presentment_variant_title" => "Red", "product_id" => 632910392, "properties" => null, "quantity" => 1, "requires_shipping" => true, "sku" => "IPOD2008RED", "tax_lines" => [], "taxable" => true, "title" => "IPod Nano - 8GB", "variant_id" => 49148385, "variant_title" => "Red", "variant_price" => null, "vendor" => "Apple", "user_id" => null, "unit_price_measurement" => null, "rank" => null, "compare_at_price" => null, "line_price" => "199.00", "price" => "199.00"], ["applied_discounts" => [], "discount_allocations" => [["id" => null, "amount" => "19.90", "description" => null, "created_at" => null, "application_type" => "discount_code"]], "key" => "c63c8a6c99119edf", "destination_location_id" => null, "fulfillment_service" => "manual", "gift_card" => false, "grams" => 200, "origin_location_id" => null, "presentment_title" => "IPod Nano - 8GB", "presentment_variant_title" => "Pink", "product_id" => 632910392, "properties" => null, "quantity" => 1, "requires_shipping" => true, "sku" => "IPOD2008PINK", "tax_lines" => [], "taxable" => true, "title" => "IPod Nano - 8GB", "variant_id" => 808950810, "variant_title" => "Pink", "variant_price" => null, "vendor" => "Apple", "user_id" => null, "unit_price_measurement" => null, "rank" => null, "compare_at_price" => null, "line_price" => "199.00", "price" => "199.00"]], "name" => "#450789469", "source" => null, "abandoned_checkout_url" => "https://checkout.local/548380009/checkouts/2a1ace52255252df566af0faaedfbfa7/recover", "discount_codes" => [["code" => "TENOFF", "amount" => "39.80", "type" => "percentage"]], "tax_lines" => [["price" => "21.49", "rate" => 0.06, "title" => "State Tax", "channel_liable" => null]], "source_name" => "web", "presentment_currency" => "USD", "buyer_accepts_sms_marketing" => false, "sms_marketing_phone" => null, "total_discounts" => "39.80", "total_line_items_price" => "398.00", "total_price" => "379.69", "total_tax" => "21.49", "subtotal_price" => "358.20", "total_duties" => null, "billing_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "shipping_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "customer" => ["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-02-03T16:53:36-05:00", "updated_at" => "2022-02-03T16:53:36-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "sms_marketing_consent" => null, "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-07/checkouts.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        AbandonedCheckout::checkouts(
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
                  ["checkouts" => [["id" => 450789469, "token" => "2a1ace52255252df566af0faaedfbfa7", "cart_token" => "68778783ad298f1c80c3bafcddeea02f", "email" => "bob.norman@hostmail.com", "gateway" => null, "buyer_accepts_marketing" => false, "created_at" => "2012-10-12T07:05:27-04:00", "updated_at" => "2012-10-12T07:05:27-04:00", "landing_site" => null, "note" => null, "note_attributes" => [["name" => "custom engraving", "value" => "Happy Birthday"], ["name" => "colour", "value" => "green"]], "referring_site" => null, "shipping_lines" => [["title" => "Free Shipping", "price" => "0.00", "code" => "Free Shipping", "source" => "shopify", "applied_discounts" => [], "id" => "5da41c1738454765"]], "taxes_included" => false, "total_weight" => 400, "currency" => "USD", "completed_at" => null, "closed_at" => null, "user_id" => null, "location_id" => null, "source_identifier" => null, "source_url" => null, "device_id" => null, "phone" => null, "customer_locale" => "en", "line_items" => [["applied_discounts" => [], "discount_allocations" => [["id" => null, "amount" => "19.90", "description" => null, "created_at" => null, "application_type" => "discount_code"]], "key" => "87e58d37f62987dc", "destination_location_id" => null, "fulfillment_service" => "manual", "gift_card" => false, "grams" => 200, "origin_location_id" => null, "presentment_title" => "IPod Nano - 8GB", "presentment_variant_title" => "Red", "product_id" => 632910392, "properties" => null, "quantity" => 1, "requires_shipping" => true, "sku" => "IPOD2008RED", "tax_lines" => [], "taxable" => true, "title" => "IPod Nano - 8GB", "variant_id" => 49148385, "variant_title" => "Red", "variant_price" => null, "vendor" => "Apple", "user_id" => null, "unit_price_measurement" => null, "rank" => null, "compare_at_price" => null, "line_price" => "199.00", "price" => "199.00"], ["applied_discounts" => [], "discount_allocations" => [["id" => null, "amount" => "19.90", "description" => null, "created_at" => null, "application_type" => "discount_code"]], "key" => "c63c8a6c99119edf", "destination_location_id" => null, "fulfillment_service" => "manual", "gift_card" => false, "grams" => 200, "origin_location_id" => null, "presentment_title" => "IPod Nano - 8GB", "presentment_variant_title" => "Pink", "product_id" => 632910392, "properties" => null, "quantity" => 1, "requires_shipping" => true, "sku" => "IPOD2008PINK", "tax_lines" => [], "taxable" => true, "title" => "IPod Nano - 8GB", "variant_id" => 808950810, "variant_title" => "Pink", "variant_price" => null, "vendor" => "Apple", "user_id" => null, "unit_price_measurement" => null, "rank" => null, "compare_at_price" => null, "line_price" => "199.00", "price" => "199.00"]], "name" => "#450789469", "source" => null, "abandoned_checkout_url" => "https://checkout.local/548380009/checkouts/2a1ace52255252df566af0faaedfbfa7/recover", "discount_codes" => [["code" => "TENOFF", "amount" => "39.80", "type" => "percentage"]], "tax_lines" => [["price" => "21.49", "rate" => 0.06, "title" => "State Tax", "channel_liable" => null]], "source_name" => "web", "presentment_currency" => "USD", "buyer_accepts_sms_marketing" => false, "sms_marketing_phone" => null, "total_discounts" => "39.80", "total_line_items_price" => "398.00", "total_price" => "379.69", "total_tax" => "21.49", "subtotal_price" => "358.20", "total_duties" => null, "billing_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "shipping_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "customer" => ["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-02-03T16:53:36-05:00", "updated_at" => "2022-02-03T16:53:36-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "sms_marketing_consent" => null, "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-07/checkouts.json?status=closed",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        AbandonedCheckout::checkouts(
            $this->test_session,
            [],
            ["status" => "closed"],
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
                  ["checkouts" => [["id" => 450789469, "token" => "2a1ace52255252df566af0faaedfbfa7", "cart_token" => "68778783ad298f1c80c3bafcddeea02f", "email" => "bob.norman@hostmail.com", "gateway" => null, "buyer_accepts_marketing" => false, "created_at" => "2012-10-12T07:05:27-04:00", "updated_at" => "2012-10-12T07:05:27-04:00", "landing_site" => null, "note" => null, "note_attributes" => [["name" => "custom engraving", "value" => "Happy Birthday"], ["name" => "colour", "value" => "green"]], "referring_site" => null, "shipping_lines" => [["title" => "Free Shipping", "price" => "0.00", "code" => "Free Shipping", "source" => "shopify", "applied_discounts" => [], "id" => "5da41c1738454765"]], "taxes_included" => false, "total_weight" => 400, "currency" => "USD", "completed_at" => null, "closed_at" => null, "user_id" => null, "location_id" => null, "source_identifier" => null, "source_url" => null, "device_id" => null, "phone" => null, "customer_locale" => "en", "line_items" => [["applied_discounts" => [], "discount_allocations" => [["id" => null, "amount" => "19.90", "description" => null, "created_at" => null, "application_type" => "discount_code"]], "key" => "87e58d37f62987dc", "destination_location_id" => null, "fulfillment_service" => "manual", "gift_card" => false, "grams" => 200, "origin_location_id" => null, "presentment_title" => "IPod Nano - 8GB", "presentment_variant_title" => "Red", "product_id" => 632910392, "properties" => null, "quantity" => 1, "requires_shipping" => true, "sku" => "IPOD2008RED", "tax_lines" => [], "taxable" => true, "title" => "IPod Nano - 8GB", "variant_id" => 49148385, "variant_title" => "Red", "variant_price" => null, "vendor" => "Apple", "user_id" => null, "unit_price_measurement" => null, "rank" => null, "compare_at_price" => null, "line_price" => "199.00", "price" => "199.00"], ["applied_discounts" => [], "discount_allocations" => [["id" => null, "amount" => "19.90", "description" => null, "created_at" => null, "application_type" => "discount_code"]], "key" => "c63c8a6c99119edf", "destination_location_id" => null, "fulfillment_service" => "manual", "gift_card" => false, "grams" => 200, "origin_location_id" => null, "presentment_title" => "IPod Nano - 8GB", "presentment_variant_title" => "Pink", "product_id" => 632910392, "properties" => null, "quantity" => 1, "requires_shipping" => true, "sku" => "IPOD2008PINK", "tax_lines" => [], "taxable" => true, "title" => "IPod Nano - 8GB", "variant_id" => 808950810, "variant_title" => "Pink", "variant_price" => null, "vendor" => "Apple", "user_id" => null, "unit_price_measurement" => null, "rank" => null, "compare_at_price" => null, "line_price" => "199.00", "price" => "199.00"]], "name" => "#450789469", "source" => null, "abandoned_checkout_url" => "https://checkout.local/548380009/checkouts/2a1ace52255252df566af0faaedfbfa7/recover", "discount_codes" => [["code" => "TENOFF", "amount" => "39.80", "type" => "percentage"]], "tax_lines" => [["price" => "21.49", "rate" => 0.06, "title" => "State Tax", "channel_liable" => null]], "source_name" => "web", "presentment_currency" => "USD", "buyer_accepts_sms_marketing" => false, "sms_marketing_phone" => null, "total_discounts" => "39.80", "total_line_items_price" => "398.00", "total_price" => "379.69", "total_tax" => "21.49", "subtotal_price" => "358.20", "total_duties" => null, "billing_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "shipping_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "customer" => ["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-02-03T16:53:36-05:00", "updated_at" => "2022-02-03T16:53:36-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "sms_marketing_consent" => null, "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-07/checkouts.json?created_at_max=2013-10-12T07%3A05%3A27-02%3A00",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        AbandonedCheckout::checkouts(
            $this->test_session,
            [],
            ["created_at_max" => "2013-10-12T07:05:27-02:00"],
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
                  ["checkouts" => [["id" => 450789469, "token" => "2a1ace52255252df566af0faaedfbfa7", "cart_token" => "68778783ad298f1c80c3bafcddeea02f", "email" => "bob.norman@hostmail.com", "gateway" => null, "buyer_accepts_marketing" => false, "created_at" => "2012-10-12T07:05:27-04:00", "updated_at" => "2012-10-12T07:05:27-04:00", "landing_site" => null, "note" => null, "note_attributes" => [["name" => "custom engraving", "value" => "Happy Birthday"], ["name" => "colour", "value" => "green"]], "referring_site" => null, "shipping_lines" => [["title" => "Free Shipping", "price" => "0.00", "code" => "Free Shipping", "source" => "shopify", "applied_discounts" => [], "id" => "5da41c1738454765"]], "taxes_included" => false, "total_weight" => 400, "currency" => "USD", "completed_at" => null, "closed_at" => null, "user_id" => null, "location_id" => null, "source_identifier" => null, "source_url" => null, "device_id" => null, "phone" => null, "customer_locale" => "en", "line_items" => [["applied_discounts" => [], "discount_allocations" => [["id" => null, "amount" => "19.90", "description" => null, "created_at" => null, "application_type" => "discount_code"]], "key" => "87e58d37f62987dc", "destination_location_id" => null, "fulfillment_service" => "manual", "gift_card" => false, "grams" => 200, "origin_location_id" => null, "presentment_title" => "IPod Nano - 8GB", "presentment_variant_title" => "Red", "product_id" => 632910392, "properties" => null, "quantity" => 1, "requires_shipping" => true, "sku" => "IPOD2008RED", "tax_lines" => [], "taxable" => true, "title" => "IPod Nano - 8GB", "variant_id" => 49148385, "variant_title" => "Red", "variant_price" => null, "vendor" => "Apple", "user_id" => null, "unit_price_measurement" => null, "rank" => null, "compare_at_price" => null, "line_price" => "199.00", "price" => "199.00"], ["applied_discounts" => [], "discount_allocations" => [["id" => null, "amount" => "19.90", "description" => null, "created_at" => null, "application_type" => "discount_code"]], "key" => "c63c8a6c99119edf", "destination_location_id" => null, "fulfillment_service" => "manual", "gift_card" => false, "grams" => 200, "origin_location_id" => null, "presentment_title" => "IPod Nano - 8GB", "presentment_variant_title" => "Pink", "product_id" => 632910392, "properties" => null, "quantity" => 1, "requires_shipping" => true, "sku" => "IPOD2008PINK", "tax_lines" => [], "taxable" => true, "title" => "IPod Nano - 8GB", "variant_id" => 808950810, "variant_title" => "Pink", "variant_price" => null, "vendor" => "Apple", "user_id" => null, "unit_price_measurement" => null, "rank" => null, "compare_at_price" => null, "line_price" => "199.00", "price" => "199.00"]], "name" => "#450789469", "source" => null, "abandoned_checkout_url" => "https://checkout.local/548380009/checkouts/2a1ace52255252df566af0faaedfbfa7/recover", "discount_codes" => [["code" => "TENOFF", "amount" => "39.80", "type" => "percentage"]], "tax_lines" => [["price" => "21.49", "rate" => 0.06, "title" => "State Tax", "channel_liable" => null]], "source_name" => "web", "presentment_currency" => "USD", "buyer_accepts_sms_marketing" => false, "sms_marketing_phone" => null, "total_discounts" => "39.80", "total_line_items_price" => "398.00", "total_price" => "379.69", "total_tax" => "21.49", "subtotal_price" => "358.20", "total_duties" => null, "billing_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "shipping_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "customer" => ["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-02-03T16:53:36-05:00", "updated_at" => "2022-02-03T16:53:36-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "sms_marketing_consent" => null, "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-07/checkouts.json?limit=1",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        AbandonedCheckout::checkouts(
            $this->test_session,
            [],
            ["limit" => "1"],
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
                  ["checkouts" => [["id" => 450789469, "token" => "2a1ace52255252df566af0faaedfbfa7", "cart_token" => "68778783ad298f1c80c3bafcddeea02f", "email" => "bob.norman@hostmail.com", "gateway" => null, "buyer_accepts_marketing" => false, "created_at" => "2012-10-12T07:05:27-04:00", "updated_at" => "2012-10-12T07:05:27-04:00", "landing_site" => null, "note" => null, "note_attributes" => [["name" => "custom engraving", "value" => "Happy Birthday"], ["name" => "colour", "value" => "green"]], "referring_site" => null, "shipping_lines" => [["title" => "Free Shipping", "price" => "0.00", "code" => "Free Shipping", "source" => "shopify", "applied_discounts" => [], "id" => "5da41c1738454765"]], "taxes_included" => false, "total_weight" => 400, "currency" => "USD", "completed_at" => null, "closed_at" => null, "user_id" => null, "location_id" => null, "source_identifier" => null, "source_url" => null, "device_id" => null, "phone" => null, "customer_locale" => "en", "line_items" => [["applied_discounts" => [], "discount_allocations" => [["id" => null, "amount" => "19.90", "description" => null, "created_at" => null, "application_type" => "discount_code"]], "key" => "87e58d37f62987dc", "destination_location_id" => null, "fulfillment_service" => "manual", "gift_card" => false, "grams" => 200, "origin_location_id" => null, "presentment_title" => "IPod Nano - 8GB", "presentment_variant_title" => "Red", "product_id" => 632910392, "properties" => null, "quantity" => 1, "requires_shipping" => true, "sku" => "IPOD2008RED", "tax_lines" => [], "taxable" => true, "title" => "IPod Nano - 8GB", "variant_id" => 49148385, "variant_title" => "Red", "variant_price" => null, "vendor" => "Apple", "user_id" => null, "unit_price_measurement" => null, "rank" => null, "compare_at_price" => null, "line_price" => "199.00", "price" => "199.00"], ["applied_discounts" => [], "discount_allocations" => [["id" => null, "amount" => "19.90", "description" => null, "created_at" => null, "application_type" => "discount_code"]], "key" => "c63c8a6c99119edf", "destination_location_id" => null, "fulfillment_service" => "manual", "gift_card" => false, "grams" => 200, "origin_location_id" => null, "presentment_title" => "IPod Nano - 8GB", "presentment_variant_title" => "Pink", "product_id" => 632910392, "properties" => null, "quantity" => 1, "requires_shipping" => true, "sku" => "IPOD2008PINK", "tax_lines" => [], "taxable" => true, "title" => "IPod Nano - 8GB", "variant_id" => 808950810, "variant_title" => "Pink", "variant_price" => null, "vendor" => "Apple", "user_id" => null, "unit_price_measurement" => null, "rank" => null, "compare_at_price" => null, "line_price" => "199.00", "price" => "199.00"]], "name" => "#450789469", "source" => null, "abandoned_checkout_url" => "https://checkout.local/548380009/checkouts/2a1ace52255252df566af0faaedfbfa7/recover", "discount_codes" => [["code" => "TENOFF", "amount" => "39.80", "type" => "percentage"]], "tax_lines" => [["price" => "21.49", "rate" => 0.06, "title" => "State Tax", "channel_liable" => null]], "source_name" => "web", "presentment_currency" => "USD", "buyer_accepts_sms_marketing" => false, "sms_marketing_phone" => null, "total_discounts" => "39.80", "total_line_items_price" => "398.00", "total_price" => "379.69", "total_tax" => "21.49", "subtotal_price" => "358.20", "total_duties" => null, "billing_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "shipping_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "customer" => ["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-02-03T16:53:36-05:00", "updated_at" => "2022-02-03T16:53:36-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "sms_marketing_consent" => null, "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-07/checkouts.json?status=closed",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        AbandonedCheckout::checkouts(
            $this->test_session,
            [],
            ["status" => "closed"],
        );
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
                  ["checkouts" => [["id" => 450789469, "token" => "2a1ace52255252df566af0faaedfbfa7", "cart_token" => "68778783ad298f1c80c3bafcddeea02f", "email" => "bob.norman@hostmail.com", "gateway" => null, "buyer_accepts_marketing" => false, "created_at" => "2012-10-12T07:05:27-04:00", "updated_at" => "2012-10-12T07:05:27-04:00", "landing_site" => null, "note" => null, "note_attributes" => [["name" => "custom engraving", "value" => "Happy Birthday"], ["name" => "colour", "value" => "green"]], "referring_site" => null, "shipping_lines" => [["title" => "Free Shipping", "price" => "0.00", "code" => "Free Shipping", "source" => "shopify", "applied_discounts" => [], "id" => "5da41c1738454765"]], "taxes_included" => false, "total_weight" => 400, "currency" => "USD", "completed_at" => null, "closed_at" => null, "user_id" => null, "location_id" => null, "source_identifier" => null, "source_url" => null, "device_id" => null, "phone" => null, "customer_locale" => "en", "line_items" => [["applied_discounts" => [], "discount_allocations" => [["id" => null, "amount" => "19.90", "description" => null, "created_at" => null, "application_type" => "discount_code"]], "key" => "87e58d37f62987dc", "destination_location_id" => null, "fulfillment_service" => "manual", "gift_card" => false, "grams" => 200, "origin_location_id" => null, "presentment_title" => "IPod Nano - 8GB", "presentment_variant_title" => "Red", "product_id" => 632910392, "properties" => null, "quantity" => 1, "requires_shipping" => true, "sku" => "IPOD2008RED", "tax_lines" => [], "taxable" => true, "title" => "IPod Nano - 8GB", "variant_id" => 49148385, "variant_title" => "Red", "variant_price" => null, "vendor" => "Apple", "user_id" => null, "unit_price_measurement" => null, "rank" => null, "compare_at_price" => null, "line_price" => "199.00", "price" => "199.00"], ["applied_discounts" => [], "discount_allocations" => [["id" => null, "amount" => "19.90", "description" => null, "created_at" => null, "application_type" => "discount_code"]], "key" => "c63c8a6c99119edf", "destination_location_id" => null, "fulfillment_service" => "manual", "gift_card" => false, "grams" => 200, "origin_location_id" => null, "presentment_title" => "IPod Nano - 8GB", "presentment_variant_title" => "Pink", "product_id" => 632910392, "properties" => null, "quantity" => 1, "requires_shipping" => true, "sku" => "IPOD2008PINK", "tax_lines" => [], "taxable" => true, "title" => "IPod Nano - 8GB", "variant_id" => 808950810, "variant_title" => "Pink", "variant_price" => null, "vendor" => "Apple", "user_id" => null, "unit_price_measurement" => null, "rank" => null, "compare_at_price" => null, "line_price" => "199.00", "price" => "199.00"]], "name" => "#450789469", "source" => null, "abandoned_checkout_url" => "https://checkout.local/548380009/checkouts/2a1ace52255252df566af0faaedfbfa7/recover", "discount_codes" => [["code" => "TENOFF", "amount" => "39.80", "type" => "percentage"]], "tax_lines" => [["price" => "21.49", "rate" => 0.06, "title" => "State Tax", "channel_liable" => null]], "source_name" => "web", "presentment_currency" => "USD", "buyer_accepts_sms_marketing" => false, "sms_marketing_phone" => null, "total_discounts" => "39.80", "total_line_items_price" => "398.00", "total_price" => "379.69", "total_tax" => "21.49", "subtotal_price" => "358.20", "total_duties" => null, "billing_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "shipping_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "customer" => ["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-02-03T16:53:36-05:00", "updated_at" => "2022-02-03T16:53:36-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "sms_marketing_consent" => null, "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-07/checkouts.json?created_at_max=2013-10-12T07%3A05%3A27-02%3A00",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        AbandonedCheckout::checkouts(
            $this->test_session,
            [],
            ["created_at_max" => "2013-10-12T07:05:27-02:00"],
        );
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
                  ["checkouts" => [["id" => 450789469, "token" => "2a1ace52255252df566af0faaedfbfa7", "cart_token" => "68778783ad298f1c80c3bafcddeea02f", "email" => "bob.norman@hostmail.com", "gateway" => null, "buyer_accepts_marketing" => false, "created_at" => "2012-10-12T07:05:27-04:00", "updated_at" => "2012-10-12T07:05:27-04:00", "landing_site" => null, "note" => null, "note_attributes" => [["name" => "custom engraving", "value" => "Happy Birthday"], ["name" => "colour", "value" => "green"]], "referring_site" => null, "shipping_lines" => [["title" => "Free Shipping", "price" => "0.00", "code" => "Free Shipping", "source" => "shopify", "applied_discounts" => [], "id" => "5da41c1738454765"]], "taxes_included" => false, "total_weight" => 400, "currency" => "USD", "completed_at" => null, "closed_at" => null, "user_id" => null, "location_id" => null, "source_identifier" => null, "source_url" => null, "device_id" => null, "phone" => null, "customer_locale" => "en", "line_items" => [["applied_discounts" => [], "discount_allocations" => [["id" => null, "amount" => "19.90", "description" => null, "created_at" => null, "application_type" => "discount_code"]], "key" => "87e58d37f62987dc", "destination_location_id" => null, "fulfillment_service" => "manual", "gift_card" => false, "grams" => 200, "origin_location_id" => null, "presentment_title" => "IPod Nano - 8GB", "presentment_variant_title" => "Red", "product_id" => 632910392, "properties" => null, "quantity" => 1, "requires_shipping" => true, "sku" => "IPOD2008RED", "tax_lines" => [], "taxable" => true, "title" => "IPod Nano - 8GB", "variant_id" => 49148385, "variant_title" => "Red", "variant_price" => null, "vendor" => "Apple", "user_id" => null, "unit_price_measurement" => null, "rank" => null, "compare_at_price" => null, "line_price" => "199.00", "price" => "199.00"], ["applied_discounts" => [], "discount_allocations" => [["id" => null, "amount" => "19.90", "description" => null, "created_at" => null, "application_type" => "discount_code"]], "key" => "c63c8a6c99119edf", "destination_location_id" => null, "fulfillment_service" => "manual", "gift_card" => false, "grams" => 200, "origin_location_id" => null, "presentment_title" => "IPod Nano - 8GB", "presentment_variant_title" => "Pink", "product_id" => 632910392, "properties" => null, "quantity" => 1, "requires_shipping" => true, "sku" => "IPOD2008PINK", "tax_lines" => [], "taxable" => true, "title" => "IPod Nano - 8GB", "variant_id" => 808950810, "variant_title" => "Pink", "variant_price" => null, "vendor" => "Apple", "user_id" => null, "unit_price_measurement" => null, "rank" => null, "compare_at_price" => null, "line_price" => "199.00", "price" => "199.00"]], "name" => "#450789469", "source" => null, "abandoned_checkout_url" => "https://checkout.local/548380009/checkouts/2a1ace52255252df566af0faaedfbfa7/recover", "discount_codes" => [["code" => "TENOFF", "amount" => "39.80", "type" => "percentage"]], "tax_lines" => [["price" => "21.49", "rate" => 0.06, "title" => "State Tax", "channel_liable" => null]], "source_name" => "web", "presentment_currency" => "USD", "buyer_accepts_sms_marketing" => false, "sms_marketing_phone" => null, "total_discounts" => "39.80", "total_line_items_price" => "398.00", "total_price" => "379.69", "total_tax" => "21.49", "subtotal_price" => "358.20", "total_duties" => null, "billing_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "shipping_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "customer" => ["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-02-03T16:53:36-05:00", "updated_at" => "2022-02-03T16:53:36-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "sms_marketing_consent" => null, "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-07/checkouts.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        AbandonedCheckout::checkouts(
            $this->test_session,
            [],
            [],
        );
    }

}
