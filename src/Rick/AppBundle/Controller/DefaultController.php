<?php

namespace Rick\AppBundle\Controller;

use Rick\AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function loginAction(Request $request)
    {
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $request->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('RickAppBundle:Default:index.html.twig', array(
            'error' => $error,
        ));
    }

    public function securedAction()
    {
        return $this->render('RickAppBundle:Default:secured.html.twig', array(
            'username' => $this->getUser()->getUsername()
        ));
    }
}
