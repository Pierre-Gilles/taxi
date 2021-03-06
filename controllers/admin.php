<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\FormError;
use Symfony\Component\Validator\Constraints as Assert;

$app->match('/{_locale}/admin', function (Request $request) use ($app) {
    $orders = $app['reservation_repository']->getAllReservationChauffeur($app['session']->get('chauffeur'));

    return $app['twig']->render('admin.html', array('orders' => $orders));
})->bind('admin');


$app->match('/{_locale}/admin/assign', function (Request $request) use ($app) {
    $orders = $app['reservation_repository']->getAllReservationsAvailable();

    $chauffeurs = $app['chauffeur_repository']->getAllChauffeurs();

    for($i=0;$i<sizeof($chauffeurs);$i++){
        $listChauffeurs[$chauffeurs[$i]["codeChauffeur"]] = $chauffeurs[$i]["nomChauffeur"]." ".$chauffeurs[$i]["prénomChauffeur"];
    }


    $i = 0;
    while($i < sizeof($orders)){
        $form[$i] = $app['form.factory']->createBuilder('form')
            ->add('chauffeur', 'choice', array(
                'choices' => $listChauffeurs
            ))
            ->add('reservation', 'hidden', array(
                'data' => $orders[$i]["codeReservation"]
            ))
            ->getForm();

        $formView[$i] = $form[$i]->createView();

        $form[$i]->handleRequest($request);

        if($form[$i]->isValid()) {
            $formData = $form[$i]->getData();

            $app['reservation_repository']->assignReservation($formData['reservation'], $formData['chauffeur']);
            return $app->redirect($app['url_generator']->generate('adminassign'));
        }else{
            $i++;
        }
    }




    return $app['twig']->render('admin.assign.html', array('orders' => $orders, 'formView' => $formView));
})->bind('adminassign');

$app->match('/{_locale}/admin/login', function (Request $request) use ($app) {

    $data = array(
        'email' => '',
        'password' => '',
    );

    /**
     * Creating form
     */
    $form = $app['form.factory']->createBuilder('form', $data)
        ->add('email', 'text', array(
            'attr' => array('placeholder' => 'Email'),
            'constraints' => new Assert\Email()
        ))
        ->add('password', 'password', array(
            'attr' => array('placeholder' => 'Password'),
            'constraints' => array(new Assert\NotBlank(), new Assert\Length(array('min' => 5)))
        ))
        ->getForm();

    $form->handleRequest($request);

    if ($form->isValid()) {
        $formData = $form->getData();

        $chauffeur = $app['chauffeur_repository']->login($formData['email'],$formData['password']);
        if(!is_null($chauffeur)){
            $app['session']->set('admin', true);
            $app['session']->set('chauffeur', $chauffeur);
            return $app->redirect($app['url_generator']->generate('admin'));
        }else{
            $form->addError(new FormError($app['translator']->trans('Password and email does not match')));
        }
    }

    return $app['twig']->render('admin.login.html', array('form' => $form->createView()));
})->bind('adminlogin');


$app->match('/{_locale}/admin/signup', function (Request $request) use ($app) {

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
            'first_options'  => array('label' => 'Mot de passe', 'attr' => array('placeholder' => 'Password')),
            'second_options' => array( 'label' => 'Mot de passe (validation)', 'attr' => array('placeholder' => 'Password')),
            'constraints' => array(new Assert\NotBlank(), new Assert\Length(array('min' => 5)))
        ))
        ->getForm();

    $form->handleRequest($request);

    $signup_ok = false;

    if ($form->isValid()) {
        $formData = $form->getData();

        $chauffeur = $app['chauffeur_repository']->createChauffeur($formData['name'],$formData['surname'],$formData['email'], $formData['password'], $formData['phone']);
        $app['chauffeur_repository']->saveChauffeur($chauffeur);
        $signup_ok = true;

    }

    return $app['twig']->render('admin.signup.html', array('signup_ok' => $signup_ok,'form' => $form->createView()));
})->bind('adminsignup');


