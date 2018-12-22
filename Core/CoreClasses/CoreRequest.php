<?php
/**
 * GimmeMore.
 *
 * @package     GimmeMore.
 * @author      Mohamed Ibrahim <m@mibrah.im>
 * @version     v.1.0 (21/12/2018)
 * @copyright   Copyright (c) 2018
 */

namespace Core\CoreClasses;

use Core\Abstracts\AbstractRequest;

/**
 * A generic request class that can be used as a default class for any new resource
 *
 * Class CoreRequest
 * @package Core\CoreClasses
 */
class CoreRequest extends AbstractRequest
{
    /**
     * Request data.
     *
     * @var array
     */
    protected $data;

    /**
     * CoreRequest constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}