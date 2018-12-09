<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 */
class Post
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Image
     * @ORM\ManyToOne(targetEntity="Image", cascade={"persist"})
     * @ORM\JoinColumn(name="cover_id", referencedColumnName="id")
     **/
    private $cover;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Image
     */
    public function getCover(): ?Image
    {
        return $this->cover;
    }

    /**
     * @param Image $cover
     */
    public function setCover(Image $cover): void
    {
        $this->cover = $cover;
    }
}
