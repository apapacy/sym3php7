<?php

namespace Blank\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Blank\AdminBundle\Document\Product;

class DefaultController extends Controller
{
    /**
     * @Route("/hello")
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
        $dm = $this->get('doctrine_mongodb')->getManager();
        for ($i = 0; $i < 100000; $i++) {
          $product = new Product();
          $product->setName("A Foo Bar - $i");
          $product->setPrice('19.99');
          $dm->persist($product);
        }
        $dm->flush();
        return $this->render('BlankAdminBundle:Default:index.html.twig');
    }
}
