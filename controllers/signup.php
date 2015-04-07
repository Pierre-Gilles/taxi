<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Validator\Constraints as Assert;

$app->match('/signup', function (Request $request) use ($app) {

    $data = array(
        'name' => '',
        'surname' => '',
        'email' => '',
        'phone' => ''
    );

    /**
     * Creating form
     */
    $form = $app['form.factory']->createBuilder('form', $data)
        ->add('name', 'text', array(
            'attr' => array('placeholder' => 'Name'),
            'constraints' => array(new Assert\NotBlank())
        ))
         ->add('surname', 'text', array(
             'attr' => array('placeholder' => 'Surname'),
             'constraints' => array(new Assert\NotBlank())
        ))
        ->add('email', 'text', array(
            'attr' => array('placeholder' => 'Email'),
            'constraints' => new Assert\Email()
        ))
        ->add('phone', 'text', array(
            'attr' => array('placeholder' => 'Phone'),
            'constraints' => array(new Assert\NotBlank(), new Assert\Length(array('min' => 5)))
        ))
        ->add('password', 'repeated', array(
            'type' => 'password',
            'attr' => array('placeholder' => 'Password'),
            'constraints' => array(new Assert\NotBlank(), new Assert\Length(array('min' => 5)))
        ))
        ->getForm();

    $form->handleRequest($request);

    if ($form->isValid()) {
        $formData = $form->getData();

        $newUser = $app['utilisateur_repository']->createUser($formData['name'],$formData['surname'],$formData['email'], $formData['password'], $formData['phone']);
        $app['utilisateur_repository']->saveUser($newUser);
        //return $app->redirect('...');
    }

    return $app['twig']->render('signup.html', array('form' => $form->createView()));
})->bind('signup');


