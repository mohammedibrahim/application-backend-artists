<?php
/**
 * GimmeMore.
 *
 * @package     GimmeMore.
 * @author      Mohamed Ibrahim <m.ibrahim@intdv.com>
 * @version     v.1.0 (21/12/2018)
 * @copyright   Copyright (c) 2018
 */

namespace App\Service;

use App\Repository\SongRepository;
use Core\Abstracts\AbstractService;

/**
 * Artist Service
 *
 * Class ArtistService
 * @package App\Service
 */
class SongService extends AbstractService
{
    /**
     * ArtistService constructor.
     * @param SongRepository $repository
     */
    public function __construct(SongRepository $repository)
    {
        $this->repository = $repository;
    }
}