<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Validator\Constraints as Assert;

$app->match('/{_locale}/orders', function (Request $request) use ($app) {
   // $orders = $app['reservation_repository']->getAllReservation($app['session']->get('user'));
    $orders = $app['reservation_repository']->getAllReservation(new Utilisateur( "Jean", "Jacq", "dsf", "sfs", "fdf", 11));
    //$lieux = $app['lieu_repository']->getLieuClient(11);


    $data = array(
        'address' => '',
        'city' => '',
        'postcode' => '',
        'adress_destination' => '',
        'city_destination' => '',
        'postcode_destination' => ''
    );

    /**
     * Creating form
     */
    $form = $app['form.factory']->createBuilder('form', $data)
        ->add('address', 'text', array(
            'attr' => array('placeholder' => 'Address'),
            'constraints' => array(new Assert\NotBlank())
        ))
        ->add('city', 'text', array(
            'attr' => array('placeholder' => 'City'),
            'constraints' => array(new Assert\NotBlank())
        ))
        ->add('postcode', 'text', array(
            'attr' => array('placeholder' => 'Postcode'),
            'constraints' => array(new Assert\NotBlank())
        ))
        ->add('address_destination', 'text', array(
            'attr' => array('placeholder' => 'Address'),
            'constraints' => array(new Assert\NotBlank())
        ))
        ->add('city_destination', 'text', array(
            'attr' => array('placeholder' => 'City'),
            'constraints' => array(new Assert\NotBlank())
        ))
        ->add('postcode_destination', 'text', array(
            'attr' => array('placeholder' => 'Postcode'),
            'constraints' => array(new Assert\NotBlank())
        ))
        ->add('date', 'date', array(
            'attr' => array('placeholder' => 'When'),
            'constraints' => array(new Assert\NotBlank())
        ))
        ->getForm();

    $form->handleRequest($request);

    if ($form->isValid()) {
        $formData = $form->getData();

       // $newUser = $app['utilisateur_repository']->createUser($formData['name'],$formData['surname'],$formData['email'], $formData['password'], $formData['phone']);
        //$app['utilisateur_repository']->saveUser($newUser);
        //return $app->redirect('...');
    }

    return $app['twig']->render('orders.html', array('orders' => $orders, 'form' => $form->createView()));
})->bind('orders');