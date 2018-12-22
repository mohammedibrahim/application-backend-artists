<?php
/**
 * GimmeMore.
 *
 * @package     GimmeMore.
 * @author      Mohamed Ibrahim <m@mibrah.im>
 * @version     v.1.0 (21/12/2018)
 * @copyright   Copyright (c) 2018
 */

namespace Core\Contracts;

/**
 * Request Contract
 *
 * Class ServiceContract
 * @package App\Contracts
 */
interface RequestContract
{
    /**
     * Get response data.
     *
     * @return mixed
     */
    public function get():array;
}