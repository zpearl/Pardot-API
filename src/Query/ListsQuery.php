<?php

namespace CyberDuck\PardotApi\Query;

/**
 * List Query object representation
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
class ListsQuery extends Query
{
	/**
	 * Object name
	 *
	 * @var string
	 */
	protected $object = 'list';

    /**
     * Returns the lists matching the specified criteria parameters. See the Using Lists section for a complete description of the list XML Response Format. Also see List in Object Field References
     *
     * /api/list/version/{version}/do/query?...
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
}