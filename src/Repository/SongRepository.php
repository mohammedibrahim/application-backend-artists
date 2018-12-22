<?php

namespace App\Repository;

use App\Entity\Song;
use Core\Abstracts\AbstractRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class ArtistRepository
 *
 * @package App\Repository
 */
class SongRepository extends AbstractRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct(new Song(), $registry);
    }
}

