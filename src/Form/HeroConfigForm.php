<?php

namespace Drupal\module_hero\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Our config form.
 */
class HeroConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return "module_hero_confighero";
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('module_hero.settings');

    $form['hero_list_title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Hero list title'),
      '#default_value' => $config->get('hero_list_title'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'module_hero.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->configFactory->getEditable('module_hero.settings');

    $config
      ->set('hero_list_title', $form_state->getValue('hero_list_title'))
      ->save();

    parent::submitForm($form, $form_state);
  }
}
