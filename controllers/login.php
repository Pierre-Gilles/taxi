<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\FormError;
use Symfony\Component\Validator\Constraints as Assert;
use Silex\Application\TranslationTrait;

$app->match('/{_locale}/login', function (Request $request) use ($app) {

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

        $user = $app['utilisateur_repository']->login($formData['email'],$formData['password']);
        if(!is_null($user)){
            $app['session']->set('connected', true);
            $app['session']->set('user', $user);
            return $app->redirect('/');
        }else{
            $form->addError(new FormError($app['translator']->trans('Password and email does not match')));
        }
    }

    return $app['twig']->render('login.html', array('form' => $form->createView()));
})->bind('login');



