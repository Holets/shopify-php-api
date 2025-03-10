<?php

declare(strict_types=1);

namespace ShopifyTest\Rest;

use Shopify\Auth\Session;
use Shopify\Context;
use Shopify\Rest\DraftOrder;
use ShopifyTest\BaseTestCase;
use ShopifyTest\Clients\MockRequest;

final class DraftOrder202110Test extends BaseTestCase
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
                  ["draft_order" => ["id" => 1069920475, "note" => null, "email" => null, "taxes_included" => false, "currency" => "USD", "invoice_sent_at" => null, "created_at" => "2022-03-02T19:41:03-05:00", "updated_at" => "2022-03-02T19:41:03-05:00", "tax_exempt" => false, "completed_at" => null, "name" => "#D5", "status" => "open", "line_items" => [["id" => 1066630380, "variant_id" => 447654529, "product_id" => 921728736, "title" => "IPod Touch 8GB", "variant_title" => "Black", "sku" => "IPOD2009BLACK", "vendor" => "Apple", "quantity" => 1, "requires_shipping" => true, "taxable" => true, "gift_card" => false, "fulfillment_service" => "shipwire-app", "grams" => 567, "tax_lines" => [["rate" => 0.05, "title" => "GST", "price" => "9.95"], ["rate" => 0.08, "title" => "Tax", "price" => "15.92"]], "applied_discount" => null, "name" => "IPod Touch 8GB - Black", "properties" => [], "custom" => false, "price" => "199.00", "admin_graphql_api_id" => "gid://shopify/DraftOrderLineItem/1066630380"]], "shipping_address" => null, "billing_address" => null, "invoice_url" => "https://jsmith.myshopify.com/548380009/invoices/2c7d22ec929d303232a0447a43c6c237", "applied_discount" => null, "order_id" => null, "shipping_line" => null, "tax_lines" => [["rate" => 0.05, "title" => "GST", "price" => "9.95"], ["rate" => 0.08, "title" => "Tax", "price" => "15.92"]], "tags" => "", "note_attributes" => [], "total_price" => "224.87", "subtotal_price" => "199.00", "total_tax" => "25.87", "presentment_currency" => "USD", "total_line_items_price_set" => ["shop_money" => ["amount" => "199.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "199.00", "currency_code" => "USD"]], "total_price_set" => ["shop_money" => ["amount" => "224.87", "currency_code" => "USD"], "presentment_money" => ["amount" => "224.87", "currency_code" => "USD"]], "subtotal_price_set" => ["shop_money" => ["amount" => "199.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "199.00", "currency_code" => "USD"]], "total_tax_set" => ["shop_money" => ["amount" => "25.87", "currency_code" => "USD"], "presentment_money" => ["amount" => "25.87", "currency_code" => "USD"]], "total_discounts_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "total_shipping_price_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "payment_terms" => null, "admin_graphql_api_id" => "gid://shopify/DraftOrder/1069920475", "customer" => null]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/draft_orders.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["draft_order" => ["line_items" => [["variant_id" => 447654529, "quantity" => 1]]]]),
            ),
        ]);

        $draft_order = new DraftOrder($this->test_session);
        $draft_order->line_items = [
            [
                "variant_id" => 447654529,
                "quantity" => 1
            ]
        ];
        $draft_order->save();
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
                  ["draft_order" => ["id" => 1069920476, "note" => null, "email" => "bob.norman@hostmail.com", "taxes_included" => false, "currency" => "USD", "invoice_sent_at" => null, "created_at" => "2022-03-02T19:41:05-05:00", "updated_at" => "2022-03-02T19:41:05-05:00", "tax_exempt" => false, "completed_at" => null, "name" => "#D5", "status" => "open", "line_items" => [["id" => 1066630381, "variant_id" => null, "product_id" => null, "title" => "Custom Tee", "variant_title" => null, "sku" => null, "vendor" => null, "quantity" => 2, "requires_shipping" => false, "taxable" => true, "gift_card" => false, "fulfillment_service" => "manual", "grams" => 0, "tax_lines" => [], "applied_discount" => null, "name" => "Custom Tee", "properties" => [], "custom" => true, "price" => "20.00", "admin_graphql_api_id" => "gid://shopify/DraftOrderLineItem/1066630381"]], "shipping_address" => ["first_name" => null, "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => null, "address2" => "", "company" => null, "latitude" => null, "longitude" => null, "name" => "", "country_code" => "US", "province_code" => "KY"], "billing_address" => ["first_name" => null, "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => null, "address2" => "", "company" => null, "latitude" => null, "longitude" => null, "name" => "", "country_code" => "US", "province_code" => "KY"], "invoice_url" => "https://jsmith.myshopify.com/548380009/invoices/7eea3edc0f0f45b77061821f09c8d2dd", "applied_discount" => ["description" => "Custom discount", "value" => "10.0", "title" => "Custom", "amount" => "10.00", "value_type" => "fixed_amount"], "order_id" => null, "shipping_line" => null, "tax_lines" => [], "tags" => "", "note_attributes" => [], "total_price" => "30.00", "subtotal_price" => "30.00", "total_tax" => "0.00", "presentment_currency" => "USD", "total_line_items_price_set" => ["shop_money" => ["amount" => "40.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "40.00", "currency_code" => "USD"]], "total_price_set" => ["shop_money" => ["amount" => "30.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "30.00", "currency_code" => "USD"]], "subtotal_price_set" => ["shop_money" => ["amount" => "30.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "30.00", "currency_code" => "USD"]], "total_tax_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "total_discounts_set" => ["shop_money" => ["amount" => "10.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "10.00", "currency_code" => "USD"]], "total_shipping_price_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "payment_terms" => null, "admin_graphql_api_id" => "gid://shopify/DraftOrder/1069920476", "customer" => ["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-03-02T19:40:00-05:00", "updated_at" => "2022-03-02T19:40:00-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "sms_marketing_consent" => null, "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/draft_orders.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["draft_order" => ["line_items" => [["title" => "Custom Tee", "price" => "20.00", "quantity" => 2]], "applied_discount" => ["description" => "Custom discount", "value_type" => "fixed_amount", "value" => "10.0", "amount" => "10.00", "title" => "Custom"], "customer" => ["id" => 207119551], "use_customer_default_address" => true]]),
            ),
        ]);

        $draft_order = new DraftOrder($this->test_session);
        $draft_order->line_items = [
            [
                "title" => "Custom Tee",
                "price" => "20.00",
                "quantity" => 2
            ]
        ];
        $draft_order->applied_discount = [
            "description" => "Custom discount",
            "value_type" => "fixed_amount",
            "value" => "10.0",
            "amount" => "10.00",
            "title" => "Custom"
        ];
        $draft_order->customer = [
            "id" => 207119551
        ];
        $draft_order->use_customer_default_address = true;
        $draft_order->save();
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
                  ["draft_order" => ["id" => 1069920477, "note" => null, "email" => null, "taxes_included" => false, "currency" => "USD", "invoice_sent_at" => null, "created_at" => "2022-03-02T19:41:08-05:00", "updated_at" => "2022-03-02T19:41:08-05:00", "tax_exempt" => false, "completed_at" => null, "name" => "#D5", "status" => "open", "line_items" => [["id" => 1066630382, "variant_id" => null, "product_id" => null, "title" => "Custom Tee", "variant_title" => null, "sku" => null, "vendor" => null, "quantity" => 1, "requires_shipping" => false, "taxable" => true, "gift_card" => false, "fulfillment_service" => "manual", "grams" => 0, "tax_lines" => [["rate" => 0.05, "title" => "GST", "price" => "0.50"], ["rate" => 0.08, "title" => "Tax", "price" => "0.80"]], "applied_discount" => ["description" => "Custom discount", "value" => "10.0", "title" => "Custom", "amount" => "10.00", "value_type" => "fixed_amount"], "name" => "Custom Tee", "properties" => [], "custom" => true, "price" => "20.00", "admin_graphql_api_id" => "gid://shopify/DraftOrderLineItem/1066630382"]], "shipping_address" => null, "billing_address" => null, "invoice_url" => "https://jsmith.myshopify.com/548380009/invoices/7d44f40f56980d190ad82b87f7f973d4", "applied_discount" => null, "order_id" => null, "shipping_line" => null, "tax_lines" => [["rate" => 0.05, "title" => "GST", "price" => "0.50"], ["rate" => 0.08, "title" => "Tax", "price" => "0.80"]], "tags" => "", "note_attributes" => [], "total_price" => "11.30", "subtotal_price" => "10.00", "total_tax" => "1.30", "presentment_currency" => "USD", "total_line_items_price_set" => ["shop_money" => ["amount" => "20.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "20.00", "currency_code" => "USD"]], "total_price_set" => ["shop_money" => ["amount" => "11.30", "currency_code" => "USD"], "presentment_money" => ["amount" => "11.30", "currency_code" => "USD"]], "subtotal_price_set" => ["shop_money" => ["amount" => "10.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "10.00", "currency_code" => "USD"]], "total_tax_set" => ["shop_money" => ["amount" => "1.30", "currency_code" => "USD"], "presentment_money" => ["amount" => "1.30", "currency_code" => "USD"]], "total_discounts_set" => ["shop_money" => ["amount" => "10.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "10.00", "currency_code" => "USD"]], "total_shipping_price_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "payment_terms" => null, "admin_graphql_api_id" => "gid://shopify/DraftOrder/1069920477", "customer" => null]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/draft_orders.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["draft_order" => ["line_items" => [["title" => "Custom Tee", "price" => "20.00", "quantity" => 1, "applied_discount" => ["description" => "Custom discount", "value_type" => "fixed_amount", "value" => "10.0", "amount" => "10.0", "title" => "Custom"]]]]]),
            ),
        ]);

        $draft_order = new DraftOrder($this->test_session);
        $draft_order->line_items = [
            [
                "title" => "Custom Tee",
                "price" => "20.00",
                "quantity" => 1,
                "applied_discount" => [
                    "description" => "Custom discount",
                    "value_type" => "fixed_amount",
                    "value" => "10.0",
                    "amount" => "10.0",
                    "title" => "Custom"
                ]
            ]
        ];
        $draft_order->save();
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
                  ["draft_order" => ["id" => 1069920478, "note" => null, "email" => null, "taxes_included" => false, "currency" => "USD", "invoice_sent_at" => null, "created_at" => "2022-03-02T19:41:09-05:00", "updated_at" => "2022-03-02T19:41:09-05:00", "tax_exempt" => false, "completed_at" => null, "name" => "#D5", "status" => "open", "line_items" => [["id" => 1066630383, "variant_id" => null, "product_id" => null, "title" => "Custom Tee", "variant_title" => null, "sku" => null, "vendor" => null, "quantity" => 1, "requires_shipping" => false, "taxable" => true, "gift_card" => false, "fulfillment_service" => "manual", "grams" => 0, "tax_lines" => [["rate" => 0.05, "title" => "GST", "price" => "0.90"], ["rate" => 0.08, "title" => "Tax", "price" => "1.44"]], "applied_discount" => ["description" => "Custom discount", "value" => "10.0", "title" => "Custom", "amount" => "2.00", "value_type" => "percentage"], "name" => "Custom Tee", "properties" => [], "custom" => true, "price" => "20.00", "admin_graphql_api_id" => "gid://shopify/DraftOrderLineItem/1066630383"]], "shipping_address" => null, "billing_address" => null, "invoice_url" => "https://jsmith.myshopify.com/548380009/invoices/69ce053ce28121dc00b1b2e447c394e4", "applied_discount" => null, "order_id" => null, "shipping_line" => null, "tax_lines" => [["rate" => 0.05, "title" => "GST", "price" => "0.90"], ["rate" => 0.08, "title" => "Tax", "price" => "1.44"]], "tags" => "", "note_attributes" => [], "total_price" => "20.34", "subtotal_price" => "18.00", "total_tax" => "2.34", "presentment_currency" => "USD", "total_line_items_price_set" => ["shop_money" => ["amount" => "20.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "20.00", "currency_code" => "USD"]], "total_price_set" => ["shop_money" => ["amount" => "20.34", "currency_code" => "USD"], "presentment_money" => ["amount" => "20.34", "currency_code" => "USD"]], "subtotal_price_set" => ["shop_money" => ["amount" => "18.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "18.00", "currency_code" => "USD"]], "total_tax_set" => ["shop_money" => ["amount" => "2.34", "currency_code" => "USD"], "presentment_money" => ["amount" => "2.34", "currency_code" => "USD"]], "total_discounts_set" => ["shop_money" => ["amount" => "2.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "2.00", "currency_code" => "USD"]], "total_shipping_price_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "payment_terms" => null, "admin_graphql_api_id" => "gid://shopify/DraftOrder/1069920478", "customer" => null]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/draft_orders.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["draft_order" => ["line_items" => [["title" => "Custom Tee", "price" => "20.00", "quantity" => 1, "applied_discount" => ["description" => "Custom discount", "value_type" => "percentage", "value" => "10.0", "amount" => "2.0", "title" => "Custom"]]]]]),
            ),
        ]);

        $draft_order = new DraftOrder($this->test_session);
        $draft_order->line_items = [
            [
                "title" => "Custom Tee",
                "price" => "20.00",
                "quantity" => 1,
                "applied_discount" => [
                    "description" => "Custom discount",
                    "value_type" => "percentage",
                    "value" => "10.0",
                    "amount" => "2.0",
                    "title" => "Custom"
                ]
            ]
        ];
        $draft_order->save();
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
                  ["draft_order" => ["id" => 1069920479, "note" => null, "email" => "bob.norman@hostmail.com", "taxes_included" => false, "currency" => "USD", "invoice_sent_at" => null, "created_at" => "2022-03-02T19:41:11-05:00", "updated_at" => "2022-03-02T19:41:11-05:00", "tax_exempt" => false, "completed_at" => null, "name" => "#D5", "status" => "open", "line_items" => [["id" => 1066630384, "variant_id" => null, "product_id" => null, "title" => "Custom Tee", "variant_title" => null, "sku" => null, "vendor" => null, "quantity" => 2, "requires_shipping" => false, "taxable" => true, "gift_card" => false, "fulfillment_service" => "manual", "grams" => 0, "tax_lines" => [], "applied_discount" => null, "name" => "Custom Tee", "properties" => [], "custom" => true, "price" => "20.00", "admin_graphql_api_id" => "gid://shopify/DraftOrderLineItem/1066630384"]], "shipping_address" => ["first_name" => null, "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => null, "address2" => "", "company" => null, "latitude" => null, "longitude" => null, "name" => "", "country_code" => "US", "province_code" => "KY"], "billing_address" => ["first_name" => null, "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => null, "address2" => "", "company" => null, "latitude" => null, "longitude" => null, "name" => "", "country_code" => "US", "province_code" => "KY"], "invoice_url" => "https://jsmith.myshopify.com/548380009/invoices/7cfb676b67981f2c7370e593945e1fcd", "applied_discount" => null, "order_id" => null, "shipping_line" => null, "tax_lines" => [], "tags" => "", "note_attributes" => [], "total_price" => "40.00", "subtotal_price" => "40.00", "total_tax" => "0.00", "presentment_currency" => "USD", "total_line_items_price_set" => ["shop_money" => ["amount" => "40.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "40.00", "currency_code" => "USD"]], "total_price_set" => ["shop_money" => ["amount" => "40.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "40.00", "currency_code" => "USD"]], "subtotal_price_set" => ["shop_money" => ["amount" => "40.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "40.00", "currency_code" => "USD"]], "total_tax_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "total_discounts_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "total_shipping_price_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "payment_terms" => null, "admin_graphql_api_id" => "gid://shopify/DraftOrder/1069920479", "customer" => ["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-03-02T19:40:00-05:00", "updated_at" => "2022-03-02T19:40:00-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "sms_marketing_consent" => null, "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/draft_orders.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["draft_order" => ["line_items" => [["title" => "Custom Tee", "price" => "20.00", "quantity" => 2]], "customer" => ["id" => 207119551], "use_customer_default_address" => true]]),
            ),
        ]);

        $draft_order = new DraftOrder($this->test_session);
        $draft_order->line_items = [
            [
                "title" => "Custom Tee",
                "price" => "20.00",
                "quantity" => 2
            ]
        ];
        $draft_order->customer = [
            "id" => 207119551
        ];
        $draft_order->use_customer_default_address = true;
        $draft_order->save();
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
                  ["draft_orders" => [["id" => 72885271, "note" => "rush order", "email" => "bob.norman@hostmail.com", "taxes_included" => true, "currency" => "USD", "invoice_sent_at" => null, "created_at" => "2022-03-02T19:40:00-05:00", "updated_at" => "2022-03-02T19:40:00-05:00", "tax_exempt" => false, "completed_at" => null, "name" => "#D4", "status" => "completed", "line_items" => [["id" => 498266019, "variant_id" => 39072856, "product_id" => 632910392, "title" => "IPod Nano - 8gb", "variant_title" => "green", "sku" => "IPOD2008GREEN", "vendor" => null, "quantity" => 2, "requires_shipping" => true, "taxable" => true, "gift_card" => false, "fulfillment_service" => "manual", "grams" => 567, "tax_lines" => [], "applied_discount" => null, "name" => "IPod Nano - 8gb - green", "properties" => [], "custom" => false, "price" => "199.00", "admin_graphql_api_id" => "gid://shopify/DraftOrderLineItem/498266019"]], "shipping_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "billing_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "invoice_url" => "https://jsmith.myshopify.com/548380009/invoices/f945c7e2b158dbb69fa642cb8d79171f", "applied_discount" => null, "order_id" => 450789469, "shipping_line" => null, "tax_lines" => [], "tags" => "", "note_attributes" => [], "total_price" => "409.94", "subtotal_price" => "398.00", "total_tax" => "11.94", "admin_graphql_api_id" => "gid://shopify/DraftOrder/72885271", "customer" => ["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-03-02T19:40:00-05:00", "updated_at" => "2022-03-02T19:40:00-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]], ["id" => 622762746, "note" => "rush order", "email" => "bob.norman@hostmail.com", "taxes_included" => false, "currency" => "USD", "invoice_sent_at" => null, "created_at" => "2022-03-02T19:40:00-05:00", "updated_at" => "2022-03-02T19:40:00-05:00", "tax_exempt" => false, "completed_at" => null, "name" => "#D1", "status" => "open", "line_items" => [["id" => 466157049, "variant_id" => 39072856, "product_id" => 632910392, "title" => "IPod Nano - 8gb", "variant_title" => "green", "sku" => "IPOD2008GREEN", "vendor" => null, "quantity" => 1, "requires_shipping" => true, "taxable" => true, "gift_card" => false, "fulfillment_service" => "manual", "grams" => 567, "tax_lines" => [], "applied_discount" => null, "name" => "IPod Nano - 8gb - green", "properties" => [], "custom" => false, "price" => "199.00", "admin_graphql_api_id" => "gid://shopify/DraftOrderLineItem/466157049"], ["id" => 605833968, "variant_id" => null, "product_id" => null, "title" => "IPod Nano Engraving", "variant_title" => null, "sku" => "IPODENGRAVING", "vendor" => null, "quantity" => 1, "requires_shipping" => false, "taxable" => true, "gift_card" => false, "fulfillment_service" => "manual", "grams" => 0, "tax_lines" => [], "applied_discount" => null, "name" => "IPod Nano Engraving", "properties" => [], "custom" => true, "price" => "30.00", "admin_graphql_api_id" => "gid://shopify/DraftOrderLineItem/605833968"], ["id" => 783764327, "variant_id" => 457924702, "product_id" => 632910392, "title" => "IPod Nano - 8gb", "variant_title" => "black", "sku" => "IPOD2008BLACK", "vendor" => null, "quantity" => 3, "requires_shipping" => true, "taxable" => true, "gift_card" => false, "fulfillment_service" => "manual", "grams" => 567, "tax_lines" => [], "applied_discount" => null, "name" => "IPod Nano - 8gb - black", "properties" => [], "custom" => false, "price" => "199.00", "admin_graphql_api_id" => "gid://shopify/DraftOrderLineItem/783764327"]], "shipping_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "billing_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "invoice_url" => "https://jsmith.myshopify.com/548380009/invoices/f1df1a91d10a6d7704cf2f0315461api", "applied_discount" => null, "order_id" => null, "shipping_line" => ["title" => "custom shipping", "custom" => true, "handle" => null, "price" => "10.00"], "tax_lines" => [], "tags" => "", "note_attributes" => [], "total_price" => "836.00", "subtotal_price" => "826.00", "total_tax" => "0.00", "admin_graphql_api_id" => "gid://shopify/DraftOrder/622762746", "customer" => ["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-03-02T19:40:00-05:00", "updated_at" => "2022-03-02T19:40:00-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]], ["id" => 691042898, "note" => "rush order", "email" => "bob.norman@hostmail.com", "taxes_included" => true, "currency" => "USD", "invoice_sent_at" => "2016-12-31T19:00:00-05:00", "created_at" => "2022-03-02T19:40:00-05:00", "updated_at" => "2022-03-02T19:40:00-05:00", "tax_exempt" => false, "completed_at" => "2016-12-31T19:00:00-05:00", "name" => "#D4", "status" => "completed", "line_items" => [["id" => 158115779, "variant_id" => 39072856, "product_id" => 632910392, "title" => "IPod Nano - 8gb", "variant_title" => "green", "sku" => "IPOD2008GREEN", "vendor" => null, "quantity" => 1, "requires_shipping" => true, "taxable" => true, "gift_card" => false, "fulfillment_service" => "manual", "grams" => 567, "tax_lines" => [], "applied_discount" => null, "name" => "IPod Nano - 8gb - green", "properties" => [], "custom" => false, "price" => "199.00", "admin_graphql_api_id" => "gid://shopify/DraftOrderLineItem/158115779"]], "shipping_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "billing_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "invoice_url" => "https://jsmith.myshopify.com/548380009/invoices/56dd92fb7adc1a2c38402b1aab15b2f4", "applied_discount" => null, "order_id" => 450789469, "shipping_line" => ["title" => "UPS Ground", "custom" => false, "handle" => "ups-3-12.25", "price" => "12.25"], "tax_lines" => [], "tags" => "", "note_attributes" => [], "total_price" => "409.94", "subtotal_price" => "398.00", "total_tax" => "11.94", "admin_graphql_api_id" => "gid://shopify/DraftOrder/691042898", "customer" => ["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-03-02T19:40:00-05:00", "updated_at" => "2022-03-02T19:40:00-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]], ["id" => 994118539, "note" => "rush order", "email" => "bob.norman@hostmail.com", "taxes_included" => false, "currency" => "USD", "invoice_sent_at" => null, "created_at" => "2022-03-02T19:40:00-05:00", "updated_at" => "2022-03-02T19:40:00-05:00", "tax_exempt" => false, "completed_at" => null, "name" => "#D2", "status" => "open", "line_items" => [["id" => 994118539, "variant_id" => 39072856, "product_id" => 632910392, "title" => "IPod Nano - 8gb", "variant_title" => "green", "sku" => "IPOD2008GREEN", "vendor" => null, "quantity" => 1, "requires_shipping" => false, "taxable" => true, "gift_card" => false, "fulfillment_service" => "manual", "grams" => 567, "tax_lines" => [], "applied_discount" => null, "name" => "IPod Nano - 8gb - green", "properties" => [], "custom" => false, "price" => "199.00", "admin_graphql_api_id" => "gid://shopify/DraftOrderLineItem/994118539"]], "shipping_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "billing_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "invoice_url" => "https://jsmith.myshopify.com/548380009/invoices/ba8dcf6c022ccad3d47e3909e378e33f", "applied_discount" => ["description" => "\$5promo", "value" => "5.0", "title" => null, "amount" => "5.00", "value_type" => "fixed_amount"], "order_id" => null, "shipping_line" => ["title" => "UPS Ground", "custom" => false, "handle" => "ups-3-12.25", "price" => "12.25"], "tax_lines" => [], "tags" => "Wholesale", "note_attributes" => [], "total_price" => "206.25", "subtotal_price" => "194.00", "total_tax" => "0.00", "admin_graphql_api_id" => "gid://shopify/DraftOrder/994118539", "customer" => ["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-03-02T19:40:00-05:00", "updated_at" => "2022-03-02T19:40:00-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]], ["id" => 1012750869, "note" => "rush order", "email" => "bob.norman@hostmail.com", "taxes_included" => false, "currency" => "USD", "invoice_sent_at" => null, "created_at" => "2022-03-02T19:40:00-05:00", "updated_at" => "2022-03-02T19:40:00-05:00", "tax_exempt" => false, "completed_at" => null, "name" => "#D2", "status" => "open", "line_items" => [["id" => 294997122, "variant_id" => 39072856, "product_id" => 632910392, "title" => "IPod Nano - 8gb", "variant_title" => "green", "sku" => "IPOD2008GREEN", "vendor" => null, "quantity" => 1, "requires_shipping" => true, "taxable" => true, "gift_card" => false, "fulfillment_service" => "manual", "grams" => 567, "tax_lines" => [], "applied_discount" => null, "name" => "IPod Nano - 8gb - green", "properties" => [], "custom" => false, "price" => "199.00", "admin_graphql_api_id" => "gid://shopify/DraftOrderLineItem/294997122"]], "shipping_address" => null, "billing_address" => null, "invoice_url" => "https://jsmith.myshopify.com/548380009/invoices/f1df1a91d10a6d7704cf2f0315461noaddressapi", "applied_discount" => null, "order_id" => null, "shipping_line" => null, "tax_lines" => [], "tags" => "", "note_attributes" => [], "total_price" => "836.00", "subtotal_price" => "826.00", "total_tax" => "0.00", "admin_graphql_api_id" => "gid://shopify/DraftOrder/1012750869", "customer" => null]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/draft_orders.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        DraftOrder::all(
            $this->test_session,
            [],
            [],
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
                  ["draft_order" => ["id" => 994118539, "note" => "Customer contacted us about a custom engraving on this iPod", "email" => "bob.norman@hostmail.com", "taxes_included" => false, "currency" => "USD", "invoice_sent_at" => null, "created_at" => "2022-03-02T19:40:00-05:00", "updated_at" => "2022-03-02T19:41:12-05:00", "tax_exempt" => false, "completed_at" => null, "name" => "#D2", "status" => "open", "line_items" => [["id" => 994118539, "variant_id" => 39072856, "product_id" => 632910392, "title" => "IPod Nano - 8gb", "variant_title" => "green", "sku" => "IPOD2008GREEN", "vendor" => null, "quantity" => 1, "requires_shipping" => false, "taxable" => true, "gift_card" => false, "fulfillment_service" => "manual", "grams" => 567, "tax_lines" => [], "applied_discount" => null, "name" => "IPod Nano - 8gb - green", "properties" => [], "custom" => false, "price" => "199.00", "admin_graphql_api_id" => "gid://shopify/DraftOrderLineItem/994118539"]], "shipping_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "billing_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "invoice_url" => "https://jsmith.myshopify.com/548380009/invoices/ba8dcf6c022ccad3d47e3909e378e33f", "applied_discount" => ["description" => "\$5promo", "value" => "5.0", "title" => null, "amount" => "5.00", "value_type" => "fixed_amount"], "order_id" => null, "shipping_line" => ["title" => "UPS Ground", "custom" => false, "handle" => "ups-3-12.25", "price" => "12.25"], "tax_lines" => [], "tags" => "Wholesale", "note_attributes" => [], "total_price" => "206.25", "subtotal_price" => "194.00", "total_tax" => "0.00", "presentment_currency" => "USD", "total_line_items_price_set" => ["shop_money" => ["amount" => "199.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "199.00", "currency_code" => "USD"]], "total_price_set" => ["shop_money" => ["amount" => "206.25", "currency_code" => "USD"], "presentment_money" => ["amount" => "206.25", "currency_code" => "USD"]], "subtotal_price_set" => ["shop_money" => ["amount" => "194.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "194.00", "currency_code" => "USD"]], "total_tax_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "total_discounts_set" => ["shop_money" => ["amount" => "5.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "5.00", "currency_code" => "USD"]], "total_shipping_price_set" => ["shop_money" => ["amount" => "12.25", "currency_code" => "USD"], "presentment_money" => ["amount" => "12.25", "currency_code" => "USD"]], "payment_terms" => null, "admin_graphql_api_id" => "gid://shopify/DraftOrder/994118539", "customer" => ["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-03-02T19:40:00-05:00", "updated_at" => "2022-03-02T19:40:00-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "sms_marketing_consent" => null, "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/draft_orders/994118539.json",
                "PUT",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["draft_order" => ["id" => 994118539, "note" => "Customer contacted us about a custom engraving on this iPod"]]),
            ),
        ]);

        $draft_order = new DraftOrder($this->test_session);
        $draft_order->id = 994118539;
        $draft_order->note = "Customer contacted us about a custom engraving on this iPod";
        $draft_order->save();
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
                  ["draft_order" => ["id" => 994118539, "note" => "rush order", "email" => "bob.norman@hostmail.com", "taxes_included" => false, "currency" => "USD", "invoice_sent_at" => null, "created_at" => "2022-03-02T19:40:00-05:00", "updated_at" => "2022-03-02T19:41:16-05:00", "tax_exempt" => false, "completed_at" => null, "name" => "#D2", "status" => "open", "line_items" => [["id" => 994118539, "variant_id" => 39072856, "product_id" => 632910392, "title" => "IPod Nano - 8gb", "variant_title" => "green", "sku" => "IPOD2008GREEN", "vendor" => null, "quantity" => 1, "requires_shipping" => false, "taxable" => true, "gift_card" => false, "fulfillment_service" => "manual", "grams" => 567, "tax_lines" => [], "applied_discount" => null, "name" => "IPod Nano - 8gb - green", "properties" => [], "custom" => false, "price" => "199.00", "admin_graphql_api_id" => "gid://shopify/DraftOrderLineItem/994118539"]], "shipping_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "billing_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "invoice_url" => "https://jsmith.myshopify.com/548380009/invoices/ba8dcf6c022ccad3d47e3909e378e33f", "applied_discount" => ["description" => "Custom discount", "value" => "10.0", "title" => "Custom", "amount" => "19.90", "value_type" => "percentage"], "order_id" => null, "shipping_line" => ["title" => "UPS Ground", "custom" => false, "handle" => "ups-3-12.25", "price" => "12.25"], "tax_lines" => [], "tags" => "Wholesale", "note_attributes" => [], "total_price" => "191.35", "subtotal_price" => "179.10", "total_tax" => "0.00", "presentment_currency" => "USD", "total_line_items_price_set" => ["shop_money" => ["amount" => "199.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "199.00", "currency_code" => "USD"]], "total_price_set" => ["shop_money" => ["amount" => "191.35", "currency_code" => "USD"], "presentment_money" => ["amount" => "191.35", "currency_code" => "USD"]], "subtotal_price_set" => ["shop_money" => ["amount" => "179.10", "currency_code" => "USD"], "presentment_money" => ["amount" => "179.10", "currency_code" => "USD"]], "total_tax_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "total_discounts_set" => ["shop_money" => ["amount" => "19.90", "currency_code" => "USD"], "presentment_money" => ["amount" => "19.90", "currency_code" => "USD"]], "total_shipping_price_set" => ["shop_money" => ["amount" => "12.25", "currency_code" => "USD"], "presentment_money" => ["amount" => "12.25", "currency_code" => "USD"]], "payment_terms" => null, "admin_graphql_api_id" => "gid://shopify/DraftOrder/994118539", "customer" => ["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-03-02T19:40:00-05:00", "updated_at" => "2022-03-02T19:40:00-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "sms_marketing_consent" => null, "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/draft_orders/994118539.json",
                "PUT",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["draft_order" => ["id" => 994118539, "applied_discount" => ["description" => "Custom discount", "value_type" => "percentage", "value" => "10.0", "amount" => "19.90", "title" => "Custom"]]]),
            ),
        ]);

        $draft_order = new DraftOrder($this->test_session);
        $draft_order->id = 994118539;
        $draft_order->applied_discount = [
            "description" => "Custom discount",
            "value_type" => "percentage",
            "value" => "10.0",
            "amount" => "19.90",
            "title" => "Custom"
        ];
        $draft_order->save();
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
                  ["draft_order" => ["id" => 994118539, "note" => "rush order", "email" => "bob.norman@hostmail.com", "taxes_included" => false, "currency" => "USD", "invoice_sent_at" => null, "created_at" => "2022-03-02T19:40:00-05:00", "updated_at" => "2022-03-02T19:40:00-05:00", "tax_exempt" => false, "completed_at" => null, "name" => "#D2", "status" => "open", "line_items" => [["id" => 994118539, "variant_id" => 39072856, "product_id" => 632910392, "title" => "IPod Nano - 8gb", "variant_title" => "green", "sku" => "IPOD2008GREEN", "vendor" => null, "quantity" => 1, "requires_shipping" => false, "taxable" => true, "gift_card" => false, "fulfillment_service" => "manual", "grams" => 567, "tax_lines" => [], "applied_discount" => null, "name" => "IPod Nano - 8gb - green", "properties" => [], "custom" => false, "price" => "199.00", "admin_graphql_api_id" => "gid://shopify/DraftOrderLineItem/994118539"]], "shipping_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "billing_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "invoice_url" => "https://jsmith.myshopify.com/548380009/invoices/ba8dcf6c022ccad3d47e3909e378e33f", "applied_discount" => ["description" => "\$5promo", "value" => "5.0", "title" => null, "amount" => "5.00", "value_type" => "fixed_amount"], "order_id" => null, "shipping_line" => ["title" => "UPS Ground", "custom" => false, "handle" => "ups-3-12.25", "price" => "12.25"], "tax_lines" => [], "tags" => "Wholesale", "note_attributes" => [], "total_price" => "206.25", "subtotal_price" => "194.00", "total_tax" => "0.00", "payment_terms" => null, "admin_graphql_api_id" => "gid://shopify/DraftOrder/994118539", "customer" => ["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-03-02T19:40:00-05:00", "updated_at" => "2022-03-02T19:40:00-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "sms_marketing_consent" => null, "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => true]]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/draft_orders/994118539.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        DraftOrder::find(
            $this->test_session,
            994118539,
            [],
            [],
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
                  []
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/draft_orders/994118539.json",
                "DELETE",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        DraftOrder::delete(
            $this->test_session,
            994118539,
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
                  ["count" => 5]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/draft_orders/count.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        DraftOrder::count(
            $this->test_session,
            [],
            [],
        );
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
                  ["draft_order_invoice" => ["to" => "first@example.com", "from" => "j.smith@example.com", "subject" => "Apple Computer Invoice", "custom_message" => "Thank you for ordering!", "bcc" => ["j.smith@example.com"]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/draft_orders/994118539/send_invoice.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["draft_order_invoice" => ["to" => "first@example.com", "from" => "j.smith@example.com", "bcc" => ["j.smith@example.com"], "subject" => "Apple Computer Invoice", "custom_message" => "Thank you for ordering!"]]),
            ),
        ]);

        $draft_order = new DraftOrder($this->test_session);
        $draft_order->id = 994118539;
        $draft_order->send_invoice(
            [],
            ["draft_order_invoice" => ["to" => "first@example.com", "from" => "j.smith@example.com", "bcc" => ["j.smith@example.com"], "subject" => "Apple Computer Invoice", "custom_message" => "Thank you for ordering!"]],
        );
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
                  ["draft_order_invoice" => ["to" => "bob.norman@hostmail.com", "from" => "j.smith@example.com", "subject" => "Draft Order #D2", "custom_message" => "", "bcc" => []]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/draft_orders/994118539/send_invoice.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["draft_order_invoice" => []]),
            ),
        ]);

        $draft_order = new DraftOrder($this->test_session);
        $draft_order->id = 994118539;
        $draft_order->send_invoice(
            [],
            ["draft_order_invoice" => []],
        );
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
                  ["draft_order" => ["id" => 994118539, "note" => "rush order", "email" => "bob.norman@hostmail.com", "taxes_included" => false, "currency" => "USD", "invoice_sent_at" => null, "created_at" => "2022-03-02T19:40:00-05:00", "updated_at" => "2022-03-02T19:41:34-05:00", "tax_exempt" => false, "completed_at" => "2022-03-02T19:41:34-05:00", "name" => "#D2", "status" => "completed", "line_items" => [["id" => 994118539, "variant_id" => 39072856, "product_id" => 632910392, "title" => "IPod Nano - 8gb", "variant_title" => "green", "sku" => "IPOD2008GREEN", "vendor" => null, "quantity" => 1, "requires_shipping" => false, "taxable" => true, "gift_card" => false, "fulfillment_service" => "manual", "grams" => 567, "tax_lines" => [], "applied_discount" => null, "name" => "IPod Nano - 8gb - green", "properties" => [], "custom" => false, "price" => "199.00", "admin_graphql_api_id" => "gid://shopify/DraftOrderLineItem/994118539"]], "shipping_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "billing_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "invoice_url" => "https://jsmith.myshopify.com/548380009/invoices/ba8dcf6c022ccad3d47e3909e378e33f", "applied_discount" => ["description" => "\$5promo", "value" => "5.0", "title" => null, "amount" => "5.00", "value_type" => "fixed_amount"], "order_id" => 1073459962, "shipping_line" => ["title" => "UPS Ground", "custom" => false, "handle" => "ups-3-12.25", "price" => "12.25"], "tax_lines" => [], "tags" => "Wholesale", "note_attributes" => [], "total_price" => "206.25", "subtotal_price" => "194.00", "total_tax" => "0.00", "presentment_currency" => "USD", "total_line_items_price_set" => ["shop_money" => ["amount" => "826.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "826.00", "currency_code" => "USD"]], "total_price_set" => ["shop_money" => ["amount" => "206.25", "currency_code" => "USD"], "presentment_money" => ["amount" => "206.25", "currency_code" => "USD"]], "subtotal_price_set" => ["shop_money" => ["amount" => "194.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "194.00", "currency_code" => "USD"]], "total_tax_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "total_discounts_set" => ["shop_money" => ["amount" => "5.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "5.00", "currency_code" => "USD"]], "total_shipping_price_set" => ["shop_money" => ["amount" => "12.25", "currency_code" => "USD"], "presentment_money" => ["amount" => "12.25", "currency_code" => "USD"]], "payment_terms" => null, "admin_graphql_api_id" => "gid://shopify/DraftOrder/994118539", "customer" => ["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-03-02T19:40:00-05:00", "updated_at" => "2022-03-02T19:40:00-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "sms_marketing_consent" => ["state" => "not_subscribed", "opt_in_level" => "single_opt_in", "consent_updated_at" => null, "consent_collected_from" => "OTHER"], "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => false]]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/draft_orders/994118539/complete.json",
                "PUT",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        $draft_order = new DraftOrder($this->test_session);
        $draft_order->id = 994118539;
        $draft_order->complete(
            [],
        );
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
                  ["draft_order" => ["id" => 994118539, "note" => "rush order", "email" => "bob.norman@hostmail.com", "taxes_included" => false, "currency" => "USD", "invoice_sent_at" => null, "created_at" => "2022-03-02T19:40:00-05:00", "updated_at" => "2022-03-02T19:41:38-05:00", "tax_exempt" => false, "completed_at" => "2022-03-02T19:41:38-05:00", "name" => "#D2", "status" => "completed", "line_items" => [["id" => 994118539, "variant_id" => 39072856, "product_id" => 632910392, "title" => "IPod Nano - 8gb", "variant_title" => "green", "sku" => "IPOD2008GREEN", "vendor" => null, "quantity" => 1, "requires_shipping" => false, "taxable" => true, "gift_card" => false, "fulfillment_service" => "manual", "grams" => 567, "tax_lines" => [], "applied_discount" => null, "name" => "IPod Nano - 8gb - green", "properties" => [], "custom" => false, "price" => "199.00", "admin_graphql_api_id" => "gid://shopify/DraftOrderLineItem/994118539"]], "shipping_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "billing_address" => ["first_name" => "Bob", "address1" => "Chestnut Street 92", "phone" => "555-625-1199", "city" => "Louisville", "zip" => "40202", "province" => "Kentucky", "country" => "United States", "last_name" => "Norman", "address2" => "", "company" => null, "latitude" => 45.41634, "longitude" => -75.6868, "name" => "Bob Norman", "country_code" => "US", "province_code" => "KY"], "invoice_url" => "https://jsmith.myshopify.com/548380009/invoices/ba8dcf6c022ccad3d47e3909e378e33f", "applied_discount" => ["description" => "\$5promo", "value" => "5.0", "title" => null, "amount" => "5.00", "value_type" => "fixed_amount"], "order_id" => 1073459963, "shipping_line" => ["title" => "UPS Ground", "custom" => false, "handle" => "ups-3-12.25", "price" => "12.25"], "tax_lines" => [], "tags" => "Wholesale", "note_attributes" => [], "total_price" => "206.25", "subtotal_price" => "194.00", "total_tax" => "0.00", "presentment_currency" => "USD", "total_line_items_price_set" => ["shop_money" => ["amount" => "826.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "826.00", "currency_code" => "USD"]], "total_price_set" => ["shop_money" => ["amount" => "206.25", "currency_code" => "USD"], "presentment_money" => ["amount" => "206.25", "currency_code" => "USD"]], "subtotal_price_set" => ["shop_money" => ["amount" => "194.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "194.00", "currency_code" => "USD"]], "total_tax_set" => ["shop_money" => ["amount" => "0.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "0.00", "currency_code" => "USD"]], "total_discounts_set" => ["shop_money" => ["amount" => "5.00", "currency_code" => "USD"], "presentment_money" => ["amount" => "5.00", "currency_code" => "USD"]], "total_shipping_price_set" => ["shop_money" => ["amount" => "12.25", "currency_code" => "USD"], "presentment_money" => ["amount" => "12.25", "currency_code" => "USD"]], "payment_terms" => null, "admin_graphql_api_id" => "gid://shopify/DraftOrder/994118539", "customer" => ["id" => 207119551, "email" => "bob.norman@hostmail.com", "accepts_marketing" => false, "created_at" => "2022-03-02T19:40:00-05:00", "updated_at" => "2022-03-02T19:40:00-05:00", "first_name" => "Bob", "last_name" => "Norman", "orders_count" => 1, "state" => "disabled", "total_spent" => "199.65", "last_order_id" => 450789469, "note" => null, "verified_email" => true, "multipass_identifier" => null, "tax_exempt" => false, "phone" => " 16136120707", "tags" => "", "last_order_name" => "#1001", "currency" => "USD", "accepts_marketing_updated_at" => "2005-06-12T11:57:11-04:00", "marketing_opt_in_level" => null, "tax_exemptions" => [], "sms_marketing_consent" => ["state" => "not_subscribed", "opt_in_level" => "single_opt_in", "consent_updated_at" => null, "consent_collected_from" => "OTHER"], "admin_graphql_api_id" => "gid://shopify/Customer/207119551", "default_address" => ["id" => 207119551, "customer_id" => 207119551, "first_name" => null, "last_name" => null, "company" => null, "address1" => "Chestnut Street 92", "address2" => "", "city" => "Louisville", "province" => "Kentucky", "country" => "United States", "zip" => "40202", "phone" => "555-625-1199", "name" => "", "province_code" => "KY", "country_code" => "US", "country_name" => "United States", "default" => false]]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/draft_orders/994118539/complete.json?payment_pending=true",
                "PUT",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        $draft_order = new DraftOrder($this->test_session);
        $draft_order->id = 994118539;
        $draft_order->complete(
            ["payment_pending" => "true"],
        );
    }

}
