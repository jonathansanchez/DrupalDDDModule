<?php

namespace Drupal\mydata\Domain\Repository;

/**
 * Interface My Data
 * @package Domain\Repository
 *
 * This file must be implemented by infrastructure
 * ORM to persist database.
 */
interface DataRepository
{
    /**
     * Return all data
     *
     * @param none
     *
     * @return array data|null
     */
    public function all();
}