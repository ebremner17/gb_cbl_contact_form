<?php

namespace Drupal\gb_cbl_contact_form\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;

/**
 * Provides a 'article' block.
 *
 * @Block(
 *   id = "gb_cbl_contact_form_block",
 *   admin_label = @Translation("Contact form block"),
 *   category = @Translation("Contact form block")
 * )
 */
class ContactFormBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $form = \Drupal::formBuilder()->getForm('Drupal\gb_cbl_contact_form\Form\ContactForm');

    return $form;
  }
}