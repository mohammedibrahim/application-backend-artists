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
interface RepositoryContract
{
    /**
     * List all resource items.
     *
     * @return array
     */
    public function index(): array;

    /**
     * Show Resource item by token.
     *
     * @param string $token
     * @return array
     */
    public function showByToken(string $token): EntityContract;

    /**
     * Save resource data.
     *
     * @param array $data
     * @return EntityContract
     */
    public function store(array $data): EntityContract;
}