<?php

namespace App\Repository;

use App\Entity\Artist;
use Core\Abstracts\AbstractRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class ArtistRepository
 *
 * @package App\Repository
 */
class ArtistRepository extends AbstractRepository
{
    /**
     * ArtistRepository constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct(new Artist(), $registry);
    }
}
