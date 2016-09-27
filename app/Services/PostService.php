<?php

namespace App\Services;

class PostService extends BaseService
{
    public function createQueryBuilder($alias, $indexBy = null)
    {
        return $this->em->createQueryBuilder()
            ->select(array($alias, 'c'))
            ->from($this->entityName, $alias, $indexBy)
            ->join($alias . '.category', 'c');
    }

}