<?php

namespace Drupal\mydata\Infrastructure\Database;

use Drupal\Core\Database\Connection;
use Drupal\mydata\Domain\Repository\DataRepository;

class DrupalDataRepository implements DataRepository
{
    private $database;

    public function __construct(Connection $database)
    {
        $this->database = $database;
    }

    public function save(array $data)
    {
        $this
            ->database
            ->insert('data')
            ->fields([
                'name',
                'email'
            ])
            ->values([
                $data['name'],
                $data['email']
            ])
            ->execute();
    }

    public function all()
    {
        return $this
            ->database
            ->select('data', 'm')
            ->fields('m',  ['id', 'name', 'email'])
            ->execute()
            ->fetchAll();
    }
}