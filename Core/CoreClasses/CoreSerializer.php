<?php
/**
 * GimmeMore.
 *
 * @package     GimmeMore.
 * @author      Mohamed Ibrahim <m.ibrahim@intdv.com>
 * @version     v.1.0 (22/12/2018)
 * @copyright   Copyright (c) 2018
 */

namespace Core\CoreClasses;

use Core\Contracts\SerializerContract;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Core Serializer
 *
 * Class CoreSerializer
 * @package Core\CoreClasses
 */
class CoreSerializer implements SerializerContract
{
    protected $serializer;

    public function __construct()
    {
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = new ObjectNormalizer();
        $normalizers->setCircularReferenceHandler(function ($object, string $format = null, array $context = array()) {
            return $object->getId();
        });

        $this->serializer = new Serializer([$normalizers], $encoders);
    }

    /**
     * get.
     * @return mixed
     */
    public function get()
    {
        return $this->serializer;
    }
}