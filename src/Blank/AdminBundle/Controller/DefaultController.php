<?php

namespace Blank\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('BlankAdminBundle:Default:index.html.twig');
    }

    /**
     * @Route("/test")
     */
    public function testAction()
    {
        return $this->render('BlankAdminBundle:Default:index.html.twig');
    }
}
