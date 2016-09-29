<?php
/**
 * Created by PhpStorm.
 * User: denis
 * Date: 9/24/16
 * Time: 12:18 PM
 */
namespace App\Model;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use LaravelDoctrine\ORM\Pagination\Paginatable;

interface BaseServiceInterface extends ObjectManipulatorInterface,
    ObjectRepository, PaginateInterface
{
    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    public function getRepository();

    /**
     * @return EntityManagerInterface
     */
    public function getEntityManager();

    /**
     * Creates a new QueryBuilder instance that is prepopulated for this entity name.
     *
     * @param string $alias
     * @param string $indexBy The index for the from.
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function createQueryBuilder($alias, $indexBy = null);

    /**
     * return [$key => $value] for list
     * 
     * @param $keyField
     * @param $valueField
     * @param array $options
     * @return array
     */
    public function getArrayList($valueField, $keyField = 'id', array $options = array());
}