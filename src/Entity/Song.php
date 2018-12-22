<?php

namespace App\Entity;

use Core\Abstracts\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SongRepository")
 */
class Song extends AbstractEntity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Album", inversedBy="songs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $album_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $length;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlbumId(): ?Album
    {
        return $this->album_id;
    }

    public function setAlbumId(?Album $album_id): self
    {
        $this->album_id = $album_id;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getLength(): string
    {
        return gmdate("i:s", $this->length);
    }

    public function setLength(string $length): self
    {
        $this->length = (strtotime($length) - strtotime('00:00:00')) / 60;

        return $this;
    }
}
