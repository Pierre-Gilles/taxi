<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Validator\Constraints as Assert;

$app->match('/{_locale}/admin', function (Request $request) use ($app) {
    $orders = $app['reservation_repository']->getAllReservationChauffeur($app['session']->get('chauffeur'));

    return $app['twig']->render('admin.html', array('orders' => $orders));
})->bind('admin');

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

        }
        //return $app->redirect('...');
    }

    return $app['twig']->render('admin.login.html', array('form' => $form->createView()));
})->bind('adminlogin');