<?php
/**
 * Created by PhpStorm.
 * User: denis
 * Date: 9/24/16
 * Time: 12:17 PM
 */
namespace App\Model;

interface ObjectManipulatorInterface
{
    /**
     * @param object $object
     * @param bool $isFlush
     */
    public function save($object, $isFlush = true);

    /**
     * @param object $object
     * @param bool $isFlush
     */
    public function remove($object, $isFlush = true);
}