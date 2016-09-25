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
}