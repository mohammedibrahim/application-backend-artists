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

use Core\Abstracts\AbstractResponse;

/**
 * A generic class for that can be used as an implementation for the Response contract
 *
 * Class CoreResponse
 * @package Core\CoreClasses
 */
class CoreResponse extends AbstractResponse
{
    /**
     * CoreResponse constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}