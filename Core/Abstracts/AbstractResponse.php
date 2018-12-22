<?php
/**
 * GimmeMore.
 *
 * @package     GimmeMore.
 * @author      Mohamed Ibrahim <m@mibrah.im>
 * @version     v.1.0 (21/12/2018)
 * @copyright   Copyright (c) 2018
 */

namespace Core\Abstracts;

use Core\Contracts\ResponseContract;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Abstract class of response
 *
 * Class AbstractResponse
 * @package Core\Abstracts
 */
abstract class AbstractResponse implements ResponseContract
{
    /**
     * data.
     *
     * @var array
     */
    protected $data;

    /**
     * Get response data.
     *
     * @return mixed
     */
    public function get(): array
    {
        return $this->data;
    }

    /**
     * Convert response to array.
     *
     * @param array $context
     * @return array
     */
    public function toArray($context = []): array
    {
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = new ObjectNormalizer();
        $normalizers->setCircularReferenceHandler(function ($object, string $format = null, array $context = array()) {
            return $object->getId();
        });

        $response = [];

        foreach ($this->data as $row) {
            $response[] = (new Serializer([$normalizers], $encoders))->normalize($row, null, $context);
        }

        return $response;
    }

}