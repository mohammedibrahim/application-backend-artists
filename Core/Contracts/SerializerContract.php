<?php
/**
 * GimmeMore.
 *
 * @package     GimmeMore.
 * @author      Mohamed Ibrahim <m.ibrahim@intdv.com>
 * @version     v.1.0 (22/12/2018)
 * @copyright   Copyright (c) 2018
 */

namespace Core\Contracts;

/**
 * Serialize entities
 *
 * Class SerializerContract
 * @package Core\Contracts
 */
interface SerializerContract
{
    /**
     * Get.
     *
     * @return mixed
     */
    public function get();
}