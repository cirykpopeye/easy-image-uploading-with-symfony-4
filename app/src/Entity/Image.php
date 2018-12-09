<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 */
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string $file
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload an image first.")
     * @Assert\File(mimeTypes={ "image/png", "image/jpeg", "image/jpg" })
     */
    private $file;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $alt;
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }
    /**
     * @param string $file
     */
    public function setFile($file)
    {
        if ($file) {
            $this->file = $file;
        }
    }
    /**
     * @return mixed
     */
    public function getAlt()
    {
        return $this->alt;
    }
    /**
     * @param mixed $alt
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;
    }
}
