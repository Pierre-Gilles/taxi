<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Validator\Constraints as Assert;


$app->match('/{_locale}/contact', function (Request $request) use ($app) {

    $data = array(
        'name' => '',
        'email' => '',
        'Your message' => '',
    );

    /**
     * Creating form
     */

    $form = $app['form.factory']->createBuilder('form', $data)
        ->add('name', 'text', array(
            'attr' => array('placeholder' => 'Name'),
            'constraints' => array(new Assert\NotBlank())
        ))
        ->add('email', 'email', array(
            'attr' => array('placeholder' => 'Email'),
            'constraints' => new Assert\Email()
        ))
        ->add('message', 'textarea', array(
            'attr' => array('placeholder' => 'Your Message','cols' => '5', 'rows' => '5'),
        ))
        ->getForm();

    $form->handleRequest($request);
    $messagesent = false;

    if ($form->isValid()) {
        $form->getData();
        $messagesent = true;

    }

    return $app['twig']->render('contact.html', array('messagesent' => $messagesent,'form' => $form->createView()));
})->bind('contact');


