<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Validator\Constraints as Assert;

$app->get('/signup', function (Request $request) use ($app) {

    $data = array(
        'name' => 'Votre nom',
        'surname' => 'Votre prénom',
        'email' => 'Votre email',
        'phone' => 'Votre numéro'
    );

    $form = $app['form.factory']->createBuilder('form', $data)
        ->add('name', 'text', array(
            'constraints' => array(new Assert\NotBlank(), new Assert\Length(array('min' => 5)))
        ))
        ->add('email', 'text', array(
            'constraints' => new Assert\Email()
        ))
        ->add('gender', 'choice', array(
            'choices' => array(1 => 'male', 2 => 'female'),
            'expanded' => true,
            'constraints' => new Assert\Choice(array(1, 2)),
        ))
        ->getForm();

    $form->handleRequest($request);

    return $app['twig']->render('signup.html', array('form' => $form->createView()));
})->bind('signup');


