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

use Core\Contracts\ResponseContract;
use Core\CoreClasses\CoreResponse;
use Core\CoreClasses\CoreSerializer;

/**
 * Create new instance from the response class
 *
 * Class ResponseFactory
 * @package Core\Factories
 */
class ResponseFactory
{
    /**
     * Create new instance from the CoreResponse class.
     *
     * @param array $data
     * @return ResponseContract
     */
    public function create(array $data): ResponseContract
    {
        return new CoreResponse($data, new CoreSerializer());
    }
}