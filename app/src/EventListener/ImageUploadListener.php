<?php
/**
 * Created by PhpStorm.
 * User: ciryk
 * Date: 9/12/18
 * Time: 21:28
 */

namespace App\EventListener;
use App\Entity\Image;
use App\Service\FileUploader;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageUploadListener
{
    private $uploader;
    /**
     * ImageUploadListener constructor.
     * @param $uploader
     */
    public function __construct(FileUploader $uploader)
    {
        $this->uploader = $uploader;
    }
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $this->uploadFile($entity);
    }
    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();
        $this->uploadFile($entity);
    }
    private function uploadFile($entity)
    {
        if (!$entity instanceof Image) {
            return;
        }
        $file = $entity->getFile();
        if ($file instanceof UploadedFile) {
            $filename = $this->uploader->upload($file);
            $entity->setFile($filename);
        }
    }
}