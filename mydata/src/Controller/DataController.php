<?php

namespace Drupal\mydata\Controller;

use Drupal;
use Drupal\Core\Controller\ControllerBase;

class DataController extends ControllerBase
{
    /**
     * Display data.
     *
     * @return array
     */
    public function content()
    {
        $findAllData = Drupal::service('mydata.findalldata')
                           ->execute();

        $data = [];
        if ( !empty($findAllData) ) {
            foreach ($findAllData as $v) {
                array_push($data, [
                    'id'           => $v->id,
                    'name'         => $v->name,
                    'email'        => $v->email
                ]);
            }
        }

        return [
            '#theme' => 'data',
            '#title' => $this->t('All data'),
            '#data' => $data
        ];
    }
}