<?php
/**
 * GimmeMore.
 *
 * @package     GimmeMore.
 * @author      Mohamed Ibrahim <m@mibrah.im>
 * @version     v.1.0 (21/12/2018)
 * @copyright   Copyright (c) 2018
 */

namespace Core\Contracts;

/**
 * Service Contract
 *
 * Class ServiceContract
 * @package App\Contracts
 */
interface ServiceContract
{
    /**
     * List all resource items.
     *
     * @param RequestContract $request
     * @return ResponseContract
     */
    public function index(RequestContract $request): ResponseContract;

    /**
     * Show Resource item by token.
     *
     * @param RequestContract $request
     * @return ResponseContract
     */
    public function show(RequestContract $request): ResponseContract;

    /**
     * Store resource data.
     *
     * @param RequestContract $request
     * @return ResponseContract
     */
    public function store(RequestContract $request): ResponseContract;
}