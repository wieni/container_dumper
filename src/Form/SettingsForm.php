<?php

namespace Drupal\container_dumper\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class SettingsForm extends FormBase
{
    public function getFormId(): string
    {
        return 'container_dumper_settings';
    }

    public function buildForm(array $form, FormStateInterface $form_state): array
    {
        $config = $this->config('container_dumper.settings');

        $form['path'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Path'),
            '#description' => $this->t('The path to the file in which the container should be dumped, including
                the filename. The path should be relative to the Drupal root.'),
            '#default_value' => $config->get('path'),
        ];

        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Save'),
        ];

        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state): void
    {
        $config = $this->configFactory->getEditable('container_dumper.settings');
        $config->set('path', $form_state->getValue('path'));
        $config->save();

        $this->messenger()->addStatus('Settings successfully updated');
    }
}
