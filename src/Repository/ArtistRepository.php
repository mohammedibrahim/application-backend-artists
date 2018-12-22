<?php

namespace App\Repository;

use App\Entity\Artist;
use Core\Abstracts\AbstractRepository;
use Core\Contracts\EntityContract;
use Core\Exceptions\NotFoundException;
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

    /**
     * List all resource items.
     *
     * @return array
     */
    public function index(): array
    {
        $data = parent::index();

        $response = [];

        foreach ($data as $row) {
            $response[] = $this->getArtist($row);
        }

        return $response;
    }

    /**
     * Get Artist.
     *
     * @param EntityContract $artist
     * @return array
     */
    protected function getArtist(EntityContract $artist): array
    {
        $albums = [];

        foreach ($artist->getAlbums() as $album) {
            $albums[] = [
                'title' => $album->getTitle(),
                'cover' => $album->getCover(),
                'token' => $album->getToken(),
            ];
        }

        return [
            'id' => $artist->getId(),
            'name' => $artist->getName(),
            'token' => $artist->getToken(),
            'albums' => $albums,
        ];
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
            throw new NotFoundException('Artist not found!');
        }

        return $this->getArtist($data);
    }
}
