<?php

namespace Drupal\hello_user\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Clase de formulario.
 */
class HelloUserForm extends FormBase {

    /**
     * ID de formulario.
     *
     * @inheritdoc
     */
    public function getFormId() {
        return 'hello_user_form';
    }

    /**
     * Método en el que definimos los elementos del formulario.
     *
     * @inheritdoc
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $form['name'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Name'),
            '#size' => 60,
            '#maxlength' => 10,
            '#required' => TRUE,
        ];

        $form['actions']['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Como te llamas'),
        ];

        return $form;
    }

    /**
     * Método encargado de implementar la lógica en el envío.
     *
     * @inheritdoc
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {

        $node = $this->t('/hello/@name', ['@name' => $form_state->getValue('name')]);

        $response = new RedirectResponse($node);
        $response->send();

        return;
    }


}