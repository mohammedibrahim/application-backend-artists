<?php
/**
 * GimmeMore.
 *
 * @package     GimmeMore.
 * @author      Mohamed Ibrahim <m@mibrah.im>
 * @version     v.1.0 (21/12/2018)
 * @copyright   Copyright (c) 2018
 */

namespace Core\Factories;

use Core\Contracts\RequestContract;
use Core\CoreClasses\CoreRequest;

/**
 * Generate a new instance from Request class
 *
 * Class RequestFactory
 * @package Core\Factories
 */
class RequestFactory
{
    /**
     * create new instance from the Core request class.
     *
     * @param array $data
     * @return RequestContract
     */
    public function create(array $data):RequestContract
    {
        return new CoreRequest($data);
    }
}