<?php

namespace Drupal\mydata\Domain\Services;

use Drupal\mydata\Domain\Repository\DataRepository;

class FindAllData
{
    private $dataRepository;

    public function __construct(DataRepository $dataRepository)
    {
        $this->dataRepository = $dataRepository;
    }

    public function execute()
    {
        return $this->dataRepository->all();
    }
}