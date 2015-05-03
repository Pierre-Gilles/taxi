<?php

use Symfony\Component\HttpFoundation\Request;

class MailService
{
    public function __construct()
    {

    }

    public function sendMailAdmin($object, $message, $mailTo){
        $mail = \Swift_Message::newInstance()
            ->setSubject($object)
            ->setFrom(array('noreply@yoursite.com'))
            ->setTo(array($mailTo))
            ->setBody($message);

        $app['mailer']->send($mail);
    }
}
