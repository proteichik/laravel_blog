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

interface BaseServiceInterface extends ObjectManipulatorInterface, ObjectRepository
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