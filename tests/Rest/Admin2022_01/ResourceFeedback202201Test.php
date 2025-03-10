<?php

declare(strict_types=1);

namespace ShopifyTest\Rest;

use Shopify\Auth\Session;
use Shopify\Context;
use Shopify\Rest\ResourceFeedback;
use ShopifyTest\BaseTestCase;
use ShopifyTest\Clients\MockRequest;

final class ResourceFeedback202201Test extends BaseTestCase
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
                  ["resource_feedback" => ["created_at" => "2022-02-03T17:00:24-05:00", "updated_at" => "2022-02-03T17:00:24-05:00", "resource_id" => 548380009, "resource_type" => "Shop", "resource_updated_at" => null, "messages" => ["is not connected. Connect your account to use this sales channel."], "feedback_generated_at" => "2022-02-03T17:00:23-05:00", "state" => "requires_action"]]
                )),
                "https://test-shop.myshopify.io/admin/api/2022-01/resource_feedback.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["resource_feedback" => ["state" => "requires_action", "messages" => ["is not connected. Connect your account to use this sales channel."], "feedback_generated_at" => "2022-02-03T22:00:23.179942Z"]]),
            ),
        ]);

        $resource_feedback = new ResourceFeedback($this->test_session);
        $resource_feedback->state = "requires_action";
        $resource_feedback->messages = [
            "is not connected. Connect your account to use this sales channel."
        ];
        $resource_feedback->feedback_generated_at = "2022-02-03T22:00:23.179942Z";
        $resource_feedback->save();
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
                  ["resource_feedback" => ["created_at" => "2022-02-03T17:00:25-05:00", "updated_at" => "2022-02-03T17:00:25-05:00", "resource_id" => 548380009, "resource_type" => "Shop", "resource_updated_at" => null, "messages" => [], "feedback_generated_at" => "2022-02-03T17:00:24-05:00", "state" => "success"]]
                )),
                "https://test-shop.myshopify.io/admin/api/2022-01/resource_feedback.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["resource_feedback" => ["state" => "success", "feedback_generated_at" => "2022-02-03T22:00:24.490026Z"]]),
            ),
        ]);

        $resource_feedback = new ResourceFeedback($this->test_session);
        $resource_feedback->state = "success";
        $resource_feedback->feedback_generated_at = "2022-02-03T22:00:24.490026Z";
        $resource_feedback->save();
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
                  ["resource_feedback" => [["created_at" => "2022-02-03T17:00:28-05:00", "updated_at" => "2022-02-03T17:00:28-05:00", "resource_id" => 548380009, "resource_type" => "Shop", "resource_updated_at" => null, "messages" => ["is not connected. Connect your account to use this sales channel."], "feedback_generated_at" => "2022-02-03T16:00:28-05:00", "state" => "requires_action"]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2022-01/resource_feedback.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        ResourceFeedback::all(
            $this->test_session,
            [],
            [],
        );
    }

}
