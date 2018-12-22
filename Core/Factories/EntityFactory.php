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

use Core\Contracts\EntityContract;

/**
 * Generate a new entityObject
 *
 * Class EntityFactory
 * @package Core\Factories
 */
class EntityFactory
{
    /**
     * Create New Instance of Entity.
     *
     * @param EntityContract $entity
     * @param array $data
     * @return EntityContract
     */
    public function create(EntityContract $entity, array $data): EntityContract
    {
        foreach ($data as $key => $value) {

            $key = str_replace('_', '', ucwords($key, '_'));

            $setterMethod = 'set' . $key;

            $entity->{$setterMethod}($value);
        }

        return $entity;
    }
}