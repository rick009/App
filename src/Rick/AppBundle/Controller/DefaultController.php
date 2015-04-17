<?php

namespace Rick\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('RickAppBundle:Default:index.html.twig', array(
            'error' => $error,
            'lastUsername' => $lastUsername
        ));
    }

    public function securedAction()
    {
        return $this->render('RickAppBundle:Default:secured.html.twig', array(
            'username' => $this->getUser()->getUsername()
        ));
    }

    public function apiAction()
    {
        return new JsonResponse('Api area');
    }
}
