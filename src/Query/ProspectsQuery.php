<?php

namespace CyberDuck\PardotApi\Query;

/**Prospects object representation
 *
 * @category   PardotApi
 * @package    PardotApi
 * @author     Andrew Mc Cormack <andy@cyber-duck.co.uk>
 * @copyright  Copyright (c) 2018, Andrew Mc Cormack
 * @license    https://github.com/cyber-duck/pardot-api/license
 * @version    1.0.0
 * @link       https://github.com/cyber-duck/pardot-api
 * @since      1.0.0
 */
class ProspectsQuery extends Query
{
    /**
     * Object name
     *
     * @var string
     */
    protected $object = 'prospect';

    /**
     * Sends the request to retrieve the user object by email and returns it from the API
     *
     * /api/user/version/{version}/do/read/email/<email>?...
     *
     * required: user_key, api_key, email
     *
     * @param int $id
     * @return stdClass|null
     */
    public function readByEmail(string $email):? \stdClass
    {
        return $this->setOperator(sprintf('read/email/%s', $email))->request($this->object);
    }

    /**
     * Returns the prospects matching the specified criteria parameters. See Using Prospects for complete descriptions of prospect XML Response Formats. Also see Prospect in Object Field References.
     *
     * /api/prospect/version/{version}/do/query?...
     *
     * required: user_key, api_key
     *
     * @param int $id
     * @return stdClass|null
     */
    public function query()
    {
        return $this->setOperator('query')->request($this->object);
    }


    /**
     * Updating Email List Subscriptions
     *
     * /api/prospect/version/{version}/do/update/id/{id}?list_{list_id}=1<email>?...
     *
     * required: user_key, api_key, email
     *
     * @param int $id
     * @return stdClass|null
     */
    public function updateListSubscription(string $id, array $lists):? \stdClass
    {
        $params = [];
        foreach ($lists as $list_id => $list_subscription) {
            $params["list_{$list_id}"] = (int)$list_subscription;
        }

        return $this->setOperator(sprintf('update/id/%s?%s', $id, http_build_query($params)))->request($this->object);
    }

}