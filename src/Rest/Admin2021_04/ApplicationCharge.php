<?php

declare(strict_types=1);

namespace Shopify\Rest;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $confirmation_url
 * @property string|null $created_at
 * @property int|null $id
 * @property string|null $name
 * @property string|float|null $price
 * @property string|null $return_url
 * @property string|null $status
 * @property bool|null $test
 * @property string|null $updated_at
 */
class ApplicationCharge extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "application_charges.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "application_charges/<id>.json"],
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "application_charges.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $urlIds
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return ApplicationCharge|null
     */
    public static function find(
        Session $session,
        $id,
        array $urlIds = [],
        array $params = []
    ): ?ApplicationCharge {
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
     *     since_id,
     *     fields
     *
     * @return ApplicationCharge[]
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

}
