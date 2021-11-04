<?php

namespace Drupal\zadatak2\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class Zadatak2Form extends ConfigFormBase
{
  public function getFormId()
  {
    return 'Zadatak2_form';
  }

  public function getEditableConfigNames()
  {
    return [
      'zadatak2.settings'
    ];
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $config = $this->config('zadatak2.settings');

    $form['Unos'] = [
      '#title' => 'Upišite ono što treba da upišete po zadataku:',
      '#type' => 'textfield',
    ];

    return parent::buildForm($form, $form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $this->configFactory->getEditable('zadatak2.settings')
      ->set('Unos', $form_state->getValue('Unos'))
      ->save();

    $form_state->setRedirect('<front>');

    parent::submitForm($form, $form_state); // TODO: Change the autogenerated stub
  }
}
