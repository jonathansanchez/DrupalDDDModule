<?php

namespace Drupal\mydata\Domain\Services;

use Drupal\mydata\Domain\Repository\DataRepository;

class SaveData
{
    private $dataRepository;

    public function __construct(DataRepository $dataRepository)
    {
        $this->dataRepository = $dataRepository;
    }

    public function execute(array $data)
    {
        $this->dataRepository->save($data);

        return true;
    }
}