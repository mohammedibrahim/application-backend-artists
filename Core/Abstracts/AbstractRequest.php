<?php
/**
 * GimmeMore.
 *
 * @package     GimmeMore.
 * @author      Mohamed Ibrahim <m@mibrah.im>
 * @version     v.1.0 (21/12/2018)
 * @copyright   Copyright (c) 2018
 */

namespace Core\Abstracts;

use Core\Contracts\RequestContract;

/**
 * Abstract class for Request
 *
 * Class AbstractRequest
 * @package Core\Abstracts
 */
abstract class AbstractRequest implements RequestContract
{
    /**
     * data.
     *
     * @var array
     */
    protected $data;

    /**
     * Get response data.
     *
     * @return mixed
     */
    public function get(): array
    {
        return $this->data;
    }

}