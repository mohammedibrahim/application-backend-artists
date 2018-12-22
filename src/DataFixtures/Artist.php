<?php

namespace App\DataFixtures;

use App\Service\AlbumService;
use App\Service\ArtistService;
use App\Service\SongService;
use Core\Contracts\ResponseContract;
use Core\Factories\RequestFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Artist extends Fixture
{
    /**
     * artist.
     *
     * @var ArtistService
     */
    protected $artist;

    /**
     * album.
     *
     * @var AlbumService
     */
    protected $album;

    /**
     * song.
     *
     * @var SongService
     */
    protected $song;

    /**
     * Artist constructor.
     *
     * @param ArtistService $artist
     * @param AlbumService $album
     * @param SongService $song
     */
    public function __construct(ArtistService $artist, AlbumService $album, SongService $song)
    {
        $this->artist = $artist;
        $this->album = $album;
        $this->song = $song;
    }

    public function load(ObjectManager $manager)
    {
        $data = file_get_contents('https://gist.githubusercontent.com/fightbulc/9b8df4e22c2da963cf8ccf96422437fe/raw/8d61579f7d0b32ba128ffbf1481e03f4f6722e17/artist-albums.json');

        $data = json_decode($data, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return false;
        }

        $this->createArtist($data);

        $manager->flush();
    }

    /**
     * Create Artist.
     *
     * @param array $data
     */
    public function createArtist(array $data)
    {
        foreach ($data as $artist) {

            $entityData = (new RequestFactory())->create([
                'name' => $artist['name'],
                'token' => $this->artist->generateToken()
            ]);

            $entityInstance = $this->artist->store($entityData);

            $this->createAlbum($artist['albums'], $entityInstance);
        }
    }

    /**
     * Create Album.
     *
     * @param array $data
     * @param ResponseContract $artist
     */
    public function createAlbum(array $data, ResponseContract $artist)
    {
        foreach ($data as $album) {
            $entityData = (new RequestFactory())->create([
                'title' => $album['title'],
                'cover' => $album['cover'],
                'description' => $album['description'],
                'artist_id' => $artist->get()[0],
                'token' => $this->album->generateToken(),
            ]);

            $entityInstance = $this->album->store($entityData);

            $this->createSong($album['songs'], $entityInstance);
        }
    }

    /**
     * Create Song.
     *
     * @param array $data
     * @param ResponseContract $album
     */
    public function createSong(array $data, ResponseContract $album)
    {
        foreach ($data as $song) {

            $entityData = (new RequestFactory())->create([
                'title' => $song['title'],
                'length' => $song['length'],
                'album_id' => $album->get()[0],
            ]);

            $this->song->store($entityData);
        }
    }
}
