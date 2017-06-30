<?php

namespace Drupal\mydata\Form;

use Drupal;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class CreateData extends FormBase
{
    /**
     * {@inheritdoc}
     */
    public function getFormId()
    {
        return 'create_data_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['name'] = [
            '#type' => 'textfield',
            '#title' => t('Name'),
            '#required' => TRUE
        ];
        $form['email'] = [
            '#type' => 'email',
            '#title' => t('Email'),
            '#required' => TRUE
        ];
        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Save')
        ];

        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
        if (empty($form_state->getValue('name'))) {
            $form_state->setErrorByName('name', $this->t('The field Name is necessary.'));
        }

        if (!valid_email_address($form_state->getValue('email'))) {
            $form_state->setErrorByName('email', $this->t('The field Email is incorrect.'));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $data = [
            'name'  => $form_state->getValue('name'),
            'email' => $form_state->getValue('email')
        ];

        Drupal::service('mydata.savedata')
              ->execute($data);

        drupal_set_message('Data saved correctly.');
        $form_state->setRedirect('mydata.content');

        return;
    }
}