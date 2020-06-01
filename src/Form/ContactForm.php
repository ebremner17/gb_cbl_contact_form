<?php

namespace Drupal\gb_cbl_contact_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ContactForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'gb_contact_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['text'] = [
      '#type' => 'markup',
      '#markup' => 'Please complete the form below to get in contact with Griffin Brothers or to book us for a gig.'
    ];

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => t('Name'),
      '#required' => TRUE,
    ];

    $form['email'] = [
      '#type' => 'email',
      '#title' => t('Email'),
      '#required' => TRUE,
    ];

    $form['message'] = [
      '#type' => 'textarea',
      '#title' => $this
        ->t('Message'),
    ];

    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#button_type' => 'primary',
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    $mailManager = \Drupal::service('plugin.manager.mail');
    $module = 'gb_cbl_contact_form';
    $key = 'contact_form';
    $to = 'eric_bremner@bell.net';
     $params['message'] = 'test';
     $langcode = \Drupal::currentUser()->getPreferredLangcode();
     $send = true;

     $result = $mailManager->mail($module, $key, $to, $langcode, $params, NULL, $send);

  }
}
