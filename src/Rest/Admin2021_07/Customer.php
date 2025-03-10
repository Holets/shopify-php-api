<?php

declare(strict_types=1);

namespace Shopify\Rest;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property bool|null $accepts_marketing
 * @property string|null $accepts_marketing_updated_at
 * @property array[]|null $addresses
 * @property string|null $created_at
 * @property string|null $currency
 * @property array|null $default_address
 * @property string|null $email
 * @property string|null $first_name
 * @property int|null $id
 * @property string|null $last_name
 * @property int|null $last_order_id
 * @property string|null $last_order_name
 * @property string|null $marketing_opt_in_level
 * @property Metafield|null $metafield
 * @property string|null $multipass_identifier
 * @property string|null $note
 * @property int|null $orders_count
 * @property string|null $phone
 * @property string|null $state
 * @property string|null $tags
 * @property bool|null $tax_exempt
 * @property string[]|null $tax_exemptions
 * @property string|null $total_spent
 * @property string|null $updated_at
 * @property bool|null $verified_email
 */
class Customer extends Base
{
    protected static array $HAS_ONE = [
        "metafield" => Metafield::class
    ];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "customers.json"],
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "customers.json"],
        ["http_method" => "get", "operation" => "search", "ids" => [], "path" => "customers/search.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "customers/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["id"], "path" => "customers/<id>.json"],
        ["http_method" => "post", "operation" => "account_activation_url", "ids" => ["id"], "path" => "customers/<id>/account_activation_url.json"],
        ["http_method" => "post", "operation" => "send_invite", "ids" => ["id"], "path" => "customers/<id>/send_invite.json"],
        ["http_method" => "get", "operation" => "count", "ids" => [], "path" => "customers/count.json"],
        ["http_method" => "get", "operation" => "orders", "ids" => ["id"], "path" => "customers/<id>/orders.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $urlIds
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return Customer|null
     */
    public static function find(
        Session $session,
        $id,
        array $urlIds = [],
        array $params = []
    ): ?Customer {
        $result = parent::baseFind(
            $session,
            array_merge(["id" => $id], $urlIds),
            $params,
        );
        return !empty($result) ? $result[0] : null;
    }

    /**
     * @param Session $session
     * @param array $urlIds
     * @param mixed[] $params Allowed indexes:
     *     ids,
     *     since_id,
     *     created_at_min,
     *     created_at_max,
     *     updated_at_min,
     *     updated_at_max,
     *     limit,
     *     fields
     *
     * @return Customer[]
     */
    public static function all(
        Session $session,
        array $urlIds = [],
        array $params = []
    ): array {
        return parent::baseFind(
            $session,
            [],
            $params,
        );
    }

    /**
     * @param Session $session
     * @param array $urlIds
     * @param mixed[] $params Allowed indexes:
     *     order,
     *     query,
     *     limit,
     *     fields
     *
     * @return array|null
     */
    public static function search(
        Session $session,
        array $urlIds = [],
        array $params = []
    ): ?array {
        $response = parent::request(
            "get",
            "search",
            $session,
            [],
            $params,
            [],
        );

        return $response->getDecodedBody();
    }

    /**
     * @param Session $session
     * @param array $urlIds
     * @param mixed[] $params
     *
     * @return array|null
     */
    public static function count(
        Session $session,
        array $urlIds = [],
        array $params = []
    ): ?array {
        $response = parent::request(
            "get",
            "count",
            $session,
            [],
            $params,
            [],
        );

        return $response->getDecodedBody();
    }

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $urlIds
     * @param mixed[] $params
     *
     * @return array|null
     */
    public static function orders(
        Session $session,
        $id,
        array $urlIds = [],
        array $params = []
    ): ?array {
        $response = parent::request(
            "get",
            "orders",
            $session,
            array_merge(["id" => $id], $urlIds),
            $params,
            [],
        );

        return $response->getDecodedBody();
    }

    /**
     * @param mixed[] $params
     * @param array|string $body
     *
     * @return array|null
     */
    public function account_activation_url(
        array $params = [],
        $body = []
    ): ?array {
        $response = parent::request(
            "post",
            "account_activation_url",
            $this->session,
            ["id" => $this->id],
            $params,
            $body,
            $this,
        );

        return $response->getDecodedBody();
    }

    /**
     * @param mixed[] $params
     * @param array|string $body
     *
     * @return array|null
     */
    public function send_invite(
        array $params = [],
        $body = []
    ): ?array {
        $response = parent::request(
            "post",
            "send_invite",
            $this->session,
            ["id" => $this->id],
            $params,
            $body,
            $this,
        );

        return $response->getDecodedBody();
    }

}
