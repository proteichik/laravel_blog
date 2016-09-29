<?php

namespace App\Services;

use App\Model\BaseServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use LaravelDoctrine\ORM\Pagination\Paginatable;

class BaseService implements BaseServiceInterface
{
    use Paginatable;

    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @var string
     */
    protected $entityName;

    /**
     * BaseService constructor.
     * @param EntityManagerInterface $em
     * @param string $entityName
     */
    public function __construct(EntityManagerInterface $em, $entityName)
    {
        $this->em = $em;
        $this->entityName = $entityName;
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    public function getRepository()
    {
        return $this->em->getRepository($this->entityName);
    }

    /**
     * @param mixed $id
     * @return object
     */
    public function find($id)
    {
        return $this->getRepository()->find($id);
    }

    /**
     * @return array
     */
    public function findAll()
    {
        return $this->findBy(array());
    }

    /**
     * @param array $criteria
     * @param array|null $orderBy
     * @param null $limit
     * @param null $offset
     * @return array
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->getRepository()->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * @param array $criteria
     * @return object
     */
    public function findOneBy(array $criteria)
    {
        return $this->getRepository()->findOneBy($criteria);
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return $this->getRepository()->getClassName();
    }

    /**
     * @return void
     */
    protected function flush()
    {
        $this->em->flush();
    }

    /**
     * @param object $object
     * @param bool $isFlush
     */
    public function save($object, $isFlush = true)
    {
        $this->em->persist($object);

        if ($isFlush) {
            $this->flush();
        }
    }

    /**
     * @param object $object
     * @param bool $isFlush
     */
    public function remove($object, $isFlush = true)
    {
        $this->em->remove($object);

        if ($isFlush) {
            $this->flush();
        }
    }

    /**
     * @return EntityManagerInterface
     */
    public function getEntityManager()
    {
        return $this->em;
    }

    /**
     * @param $alias
     * @param null $indexBy
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function createQueryBuilder($alias, $indexBy = null)
    {
        return $this->em->createQueryBuilder()
            ->select($alias)
            ->from($this->entityName, $alias, $indexBy);
    }

    /**
     * @param $valueField
     * @param string $keyField
     * @param array $options
     * @return array
     */
    public function getArrayList($valueField, $keyField = 'id', array $options = array())
    {
        $list = $this->createQueryBuilder('q')->getQuery()->getArrayResult();
        
        $result = array();
        foreach ($list as $item) {
            $result[$item[$keyField]] = $item[$valueField];
        }
        
        return $result;
    }


}