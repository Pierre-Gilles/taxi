<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Validator\Constraints as Assert;

$app->match('/login', function (Request $request) use ($app) {

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
            return $app->redirect('/fr');
        }else{

        }
        //return $app->redirect('...');
    }

    return $app['twig']->render('login.html', array('form' => $form->createView()));

    /* $username = "test";
    if(!empty($request->get('username')))
        $username = $request->get('username');
    else
    //$password = $app['request']->server->get('PHP_AUTH_PW');
    return $username;

    if ('igor' === $username && 'password' === $password) {
        $app['session']->set('user', array('username' => $username));
        return $app->redirect('/account');
    }

    /*$response = new Response();
    $response->headers->set('WWW-Authenticate', sprintf('Basic realm="%s"', 'site_login'));
    $response->setStatusCode(401, 'Please sign in.');
    return $response;*/
})->bind('login');

/*$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html',
        'errors/'.substr($code, 0, 2).'x.html',
        'errors/'.substr($code, 0, 1).'xx.html',
        'errors/default.html',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
*/

