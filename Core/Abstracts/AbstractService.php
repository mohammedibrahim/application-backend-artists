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

use App\Service\AlbumService;
use App\Utils\TokenGenerator;
use Core\Contracts\RepositoryContract;
use Core\Contracts\RequestContract;
use Core\Contracts\ResponseContract;
use Core\Contracts\ServiceContract;
use Core\Factories\ResponseFactory;

/**
 * Main Abstract Service which implements the Service contract
 *
 * Class AbstractService
 * @package Core\Services
 */
abstract class AbstractService implements ServiceContract
{
    /**
     * Repository.
     *
     * @var RepositoryContract
     */
    protected $repository;

    /**
     * albumService.
     *
     * @var AlbumService
     */
    protected $albumService;

    /**
     * AbstractService constructor.
     *
     * @param AlbumService $albumService
     * @param RepositoryContract $repository
     */
    public function __construct(RepositoryContract $repository, AlbumService $albumService)
    {
        $this->repository = $repository;
        $this->albumService = $albumService;
    }

    /**
     * List all resource items.
     *
     * @param RequestContract $request
     * @return ResponseContract
     */
    public function index(RequestContract $request): ResponseContract
    {
        $response = $this->repository->index($request->get());

        return (new ResponseFactory())->create($response);
    }

    /**
     * Show Resource item by token.
     *
     * @param RequestContract $request
     * @return ResponseContract
     */
    public function show(RequestContract $request): ResponseContract
    {
        $token = $request->get()['token'];

        $response = $this->repository->showByToken($token);

        return (new ResponseFactory())->create([$response]);
    }

    /**
     * Store resource data.
     *
     * @param RequestContract $request
     * @return ResponseContract
     */
    public function store(RequestContract $request): ResponseContract
    {
        $response = $this->repository->store($request->get());

        return (new ResponseFactory())->create([$response]);
    }

    /**
     * generateToken.
     *
     * @return string
     */
    public function generateToken(): string
    {
        $tokenExists = true;

        $newToken = '';

        while ($tokenExists) {

            $newToken = TokenGenerator::generate(6);

            $tokenExists = $this->repository->tokenExists($newToken);
        }

        return $newToken;
    }
}