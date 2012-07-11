<?php

namespace Pam\AccountBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PamAccountBundle:Default:index.html.twig', array('name' => $name));
    }
}
