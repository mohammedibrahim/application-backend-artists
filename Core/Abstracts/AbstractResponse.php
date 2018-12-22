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
use Core\Contracts\SerializerContract;

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

    protected $response;

    protected $serializer;

    public function __construct(SerializerContract $serializer)
    {
        $this->serializer = $serializer->get();
    }

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
        $response = [];

        foreach ($this->data as $row) {
            $response[] = $this->serializer->normalize($row, null, $context);
        }

        return $response;
    }

}