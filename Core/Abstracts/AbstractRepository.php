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

use Core\Contracts\EntityContract;
use Core\Contracts\RepositoryContract;
use Core\Factories\EntityFactory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Contains genrice methods in different resources
 *
 * Class AbstractRepository
 * @package Core\Abstracts
 */
abstract class AbstractRepository extends ServiceEntityRepository implements RepositoryContract
{
    /**
     * Entity of resource.
     *
     * @var EntityContract
     */
    protected $entityInstance;

    /**
     * AbstractRepository constructor.
     *
     * @param EntityContract $entityInstance
     * @param RegistryInterface $registry
     */
    public function __construct(EntityContract $entityInstance, RegistryInterface $registry)
    {
        $this->entityInstance = $entityInstance;

        parent::__construct($registry, get_class($this->entityInstance));
    }

    /**
     * List all resource items.
     *
     * @return array
     */
    public function index(): array
    {
        return $this->findAll();
    }

    /**
     * Show Resource item by token.
     *
     * @param string $token
     * @return array
     */
    public function showByToken(string $token): array
    {
        return [$this->findOneBy(['token' => $token])];
    }

    /**
     * Save resource data.
     *
     * @param array $data
     * @return EntityContract
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function store(array $data): EntityContract
    {
        $entity = (new EntityFactory())->create(clone $this->entityInstance, $data);

        $this->_em->persist($entity);
        $this->_em->flush();

        return $entity;
    }

    /**
     * Check if token exists in database or not.
     *
     * @param string $token
     * @return bool
     */
    public function tokenExists(string $token): bool
    {
        return $this->count(['token' => $token]) ? true : false;
    }

}