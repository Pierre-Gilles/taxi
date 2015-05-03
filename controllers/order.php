<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Validator\Constraints as Assert;

$app->match('/{_locale}/order', function (Request $request) use ($app) {
    // $orders = $app['reservation_repository']->getAllReservation($app['session']->get('user'));

    //$lieux = $app['lieu_repository']->getLieuClient(11);


    echo count($app['serviceCP_repository']->getAllServiceCP());

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

        $lieu = $app['lieu_repository']->saveLieu(new Lieu($formData['address'], $formData['city'], $formData['postcode']));
        $lieuDestination = $app['lieu_repository']->saveLieu(new Lieu($formData['address_destination'], $formData['city_destination'], $formData['postcode_destination']));

        $reservation = $app['reservation_repository']->createReservation($formData['date'],$app['session']->get('user'),$lieu,$lieuDestination);
        $reservation = $app['reservation_repository']->saveReservation($reservation);

        return $app->redirect('/');
    }

    return $app['twig']->render('orders.html', array('orders' => $orders, 'form' => $form->createView()));
})->bind('order');