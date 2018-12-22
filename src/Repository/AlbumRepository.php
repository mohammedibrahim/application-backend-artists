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
use Core\Contracts\EntityContract;
use Core\Exceptions\NotFoundException;
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

    /**
     * Show Resource item by token.
     *
     * @param string $token
     * @return array
     */
    public function showByToken(string $token): array
    {
        $data = parent::showByToken($token)[0];

        if (!$data) {
            throw new NotFoundException('Album not found!');
        }

        return $this->getAlbum($data);
    }

    /**
     * Get Artist.
     *
     * @param EntityContract $album
     * @return array
     */
    protected function getAlbum(EntityContract $album): array
    {
        $songs = [];

        foreach ($album->getSongs() as $song) {
            $songs[] = [
                'title' => $song->getTitle(),
                'length' => $song->getLength(),
            ];
        }

        return [
            'title' => $album->getTitle(),
            'artist' => [
                'name' => $album->getArtistId()->getName(),
                'token' => $album->getArtistId()->getToken()
            ],
            'cover' => $album->getCover(),
            'token' => $album->getToken(),
            'description' => $album->getDescription(),
            'songs' => $songs,
        ];
    }
}
