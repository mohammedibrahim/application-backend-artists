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

use Core\Contracts\ResponseContract;

/**
 * Abstract class of response
 *
 * Class AbstractResponse
 * @package Core\Abstracts
 */
abstract class AbstractResponse implements ResponseContract
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