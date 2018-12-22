<?php

/**
 * GimmeMore.
 *
 * @package     GimmeMore.
 * @author      Mohamed Ibrahim <m@mibrah.im>
 * @version     v.1.0 (21/12/2018)
 * @copyright   Copyright (c) 2018
 */

namespace App\Repository;

use App\Entity\Album;
use Core\Abstracts\AbstractRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Service Contract
 *
 * Class ServiceContract
 * @package App\Contracts
 */
class AlbumRepository extends AbstractRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct(new Album(), $registry);
    }
}
