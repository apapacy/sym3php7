<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Category;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        $dm = $this->getDoctrine()->getManager();
        for ($i = 0; $i < 100000; $i++) {
          $product = new Category();
          $product->setName("A Foo Bar - $i");
          $dm->persist($product);
        }
        $dm->flush();
        return $this->render('BlankAdminBundle:Default:index.html.twig');

        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
