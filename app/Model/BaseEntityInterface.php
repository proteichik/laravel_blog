<?php
/**
 * Created by PhpStorm.
 * User: denis
 * Date: 10/4/16
 * Time: 9:25 PM
 */
namespace App\Model;

interface BaseEntityInterface
{
    /**
     * @param array $data
     */
    public function hydrate(array $data = array());
}